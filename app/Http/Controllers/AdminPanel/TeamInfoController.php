<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeamInfoController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('order')->get();
        $positionLevels = Team::getPositionLevels();

        return view('admin-panel.team.index', compact('teams', 'positionLevels'));
    }

    public function create()
    {
        $positionLevels = Team::getPositionLevels();
        $defaultOrder = Team::max('order') + 1;

        return view('admin-panel.team.create', compact('positionLevels', 'defaultOrder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'position_level' => 'required|string|in:' . implode(',', array_keys(Team::getPositionLevels())),
            'qualifications' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean'
        ]);

        $data = $request->only(['name', 'designation', 'position_level', 'qualifications', 'order']);
        
        // Properly handle is_active field
        $data['is_active'] = $request->boolean('is_active');

        // Handle image upload with optimization
        if ($request->hasFile('image')) {
            $data['image'] = $this->optimizeAndStoreImage($request->file('image'));
        }

        // Handle qualifications
        if ($request->has('qualifications') && !empty($request->qualifications)) {
            $qualifications = array_filter(array_map('trim', explode("\n", $request->qualifications)));
            $data['qualifications'] = json_encode($qualifications);
        } else {
            $data['qualifications'] = null;
        }

        Team::create($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member created successfully.');
    }

    public function edit(Team $team)
    {
        $positionLevels = Team::getPositionLevels();
        return view('admin-panel.team.edit', compact('team', 'positionLevels'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'position_level' => 'required|string|in:' . implode(',', array_keys(Team::getPositionLevels())),
            'qualifications' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean'
        ]);

        $data = $request->only(['name', 'designation', 'position_level', 'qualifications', 'order']);
        
        // FIX: Properly handle is_active field - this is the key fix
        $data['is_active'] = $request->boolean('is_active');

        // Handle image upload with optimization
        if ($request->hasFile('image')) {
            // Delete old image
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $this->optimizeAndStoreImage($request->file('image'));
        }

        // Handle qualifications
        if ($request->has('qualifications') && !empty($request->qualifications)) {
            $qualifications = array_filter(array_map('trim', explode("\n", $request->qualifications)));
            $data['qualifications'] = json_encode($qualifications);
        } else {
            $data['qualifications'] = null;
        }

        $team->update($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $team)
    {
        // Delete image if exists
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        
        $team->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $order = $request->input('order');
        $viewType = $request->input('view_type', 'table');
        
        foreach ($order as $item) {
            $updateData = ['order' => $item['position']];
            
            // If hierarchy view, also update position level
            if ($viewType === 'hierarchy' && isset($item['position_level'])) {
                $updateData['position_level'] = $item['position_level'];
            }
            
            Team::where('id', $item['id'])->update($updateData);
        }

        return response()->json(['success' => true]);
    }

    public function toggleStatus(Team $team)
    {
        $team->update(['is_active' => !$team->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $team->is_active
        ]);
    }

    public function updateLevel(Request $request, Team $team)
    {
        $request->validate([
            'position_level' => 'required|string|in:' . implode(',', array_keys(Team::getPositionLevels()))
        ]);

        $team->update(['position_level' => $request->position_level]);

        return response()->json([
            'success' => true,
            'new_level_name' => Team::getPositionLevels()[$request->position_level]
        ]);
    }

    /**
     * Optimize and store image
     */
    private function optimizeAndStoreImage($image)
    {
        $filename = 'team_' . time() . '_' . uniqid() . '.webp';
        $path = 'team/' . $filename;

        // Create intervention image instance
        $img = Image::make($image->getRealPath());

        // Optimize image - resize if too large but maintain aspect ratio
        if ($img->width() > 800 || $img->height() > 800) {
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Optimize quality and convert to WebP for better performance
        $img->encode('webp', 80);

        // Store optimized image
        Storage::disk('public')->put($path, $img->stream());

        return $path;
    }

    /**
     * Remove image from team member
     */
    public function removeImage(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
            $team->update(['image' => null]);
            
            return response()->json([
                'success' => true,
                'message' => 'Image removed successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No image found'
        ], 404);
    }
}