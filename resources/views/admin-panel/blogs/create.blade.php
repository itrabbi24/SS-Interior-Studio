@extends('admin-panel.shared.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($blog) ? 'Edit' : 'Create' }} Blog</h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blog))
                            @method('PUT')
                        @endif
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title ?? '') }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $blog->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Thumbnail Upload Field -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail Image</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                            @if(isset($blog) && $blog->thumbnail)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="Current thumbnail" width="150" class="img-thumbnail">
                                    <p class="text-muted mt-1">Current thumbnail</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="10">{{ old('description', $blog->description ?? '') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags (comma separated)</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags', $blog->tags ?? '') }}">
                            @error('tags')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="publish_date" class="form-label">Publish Date</label>
                            <input type="datetime-local" class="form-control" id="publish_date" name="publish_date" value="{{ old('publish_date', isset($blog) && $blog->publish_date ? $blog->publish_date->format('Y-m-d\TH:i') : '') }}">
                            @error('publish_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ (old('is_published', $blog->is_published ?? false)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Publish Immediately</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
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
    $('#description').summernote({
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