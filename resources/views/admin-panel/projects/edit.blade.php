@extends('admin-panel.shared.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($project) ? 'Edit' : 'Create' }} Project</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($project))
                            @method('PUT')
                        @endif
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name ?? '') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $project->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="architect" class="form-label">Architect</label>
                            <input type="text" class="form-control" id="architect" name="architect" value="{{ old('architect', $project->architect ?? '') }}">
                            @error('architect')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control" id="client" name="client" value="{{ old('client', $project->client ?? '') }}">
                            @error('client')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="terms" class="form-label">Terms</label>
                            <input type="text" class="form-control" id="terms" name="terms" value="{{ old('terms', $project->terms ?? '') }}">
                            @error('terms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="project_type" class="form-label">Project Type</label>
                            <input type="text" class="form-control" id="project_type" name="project_type" value="{{ old('project_type', $project->project_type ?? '') }}">
                            @error('project_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="strategy" class="form-label">Strategy</label>
                            <textarea class="form-control" id="strategy" name="strategy" rows="3">{{ old('strategy', $project->strategy ?? '') }}</textarea>
                            @error('strategy')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="project_date" class="form-label">Project Date</label>
                            <input type="date" class="form-control" id="project_date" name="project_date" value="{{ old('project_date', $project->project_date ?? '') }}">
                            @error('project_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                            @if(isset($project) && $project->thumbnail)
                                <div class="mt-2">
                                    <img src="{{ asset('public/'.$project->thumbnail) }}" alt="Current thumbnail" width="150" class="img-thumbnail">
                                    <p class="text-muted mt-1">Current thumbnail</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" id="details" name="details" rows="10">{{ old('details', $project->details ?? '') }}</textarea>
                            @error('details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
    $('#details').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Image preview for thumbnail
    $('#thumbnail').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('.img-thumbnail').remove();
                $('#thumbnail').after('<div class="mt-2"><img src="' + e.target.result + '" alt="Preview" width="150" class="img-thumbnail"><p class="text-muted mt-1">New thumbnail preview</p></div>');
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush