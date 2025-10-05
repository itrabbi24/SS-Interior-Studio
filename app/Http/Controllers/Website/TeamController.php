<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $positionLevels = Team::getPositionLevels();

        // Fetch active team members ordered
        $allTeams = Team::where('is_active', 1)
                        ->orderBy('order')
                        ->get();

        // Group by position_level
        $teams = [];
        foreach ($allTeams as $team) {
            $level = $team->position_level;
            if (!isset($teams[$level])) {
                $teams[$level] = collect();
            }

            // Decode qualifications JSON
            if ($team->qualifications && is_string($team->qualifications)) {
                $team->qualifications = json_decode($team->qualifications, true);
            }

            $teams[$level]->push($team);
        }

        return view('website.team.index', compact('teams', 'positionLevels'));
    }
}
