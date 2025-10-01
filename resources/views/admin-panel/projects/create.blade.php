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
                    <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
                        @csrf
                        @if(isset($project))
                            @method('PUT')
                        @endif
                        
                        <!-- Progress Bar -->
                        <div class="mb-3" id="uploadProgressContainer" style="display: none;">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                     role="progressbar" 
                                     style="width: 0%" 
                                     aria-valuenow="0" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    <span class="progress-text">0%</span>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <small class="text-muted" id="uploadStatus">Uploading...</small>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category_id', $project->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="architect" class="form-label">Architect</label>
                                    <input type="text" class="form-control @error('architect') is-invalid @enderror" id="architect" name="architect" value="{{ old('architect', $project->architect ?? '') }}">
                                    @error('architect')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" value="{{ old('client', $project->client ?? '') }}">
                                    @error('client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="terms" class="form-label">Terms</label>
                                    <input type="text" class="form-control @error('terms') is-invalid @enderror" id="terms" name="terms" value="{{ old('terms', $project->terms ?? '') }}">
                                    @error('terms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="project_type" class="form-label">Project Type</label>
                                    <input type="text" class="form-control @error('project_type') is-invalid @enderror" id="project_type" name="project_type" value="{{ old('project_type', $project->project_type ?? '') }}">
                                    @error('project_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="project_date" class="form-label">Project Date</label>
                                    <input type="date" class="form-control @error('project_date') is-invalid @enderror" id="project_date" name="project_date" value="{{ old('project_date', $project->project_date ?? '') }}">
                                    @error('project_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                                    <div class="form-text">
                                        Maximum file size: 2MB. Supported formats: JPEG, PNG, JPG, GIF
                                    </div>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    
                                    <!-- Thumbnail Preview -->
                                    <div id="thumbnailPreview" class="mt-2">
                                        @if(isset($project) && $project->thumbnail)
                                            <div>
                                                <img src="{{ asset($project->thumbnail) }}" alt="Current thumbnail" width="150" class="img-thumbnail">
                                                <p class="text-muted mt-1">Current thumbnail</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Width Fields -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="strategy" class="form-label">Strategy</label>
                                    <textarea class="form-control @error('strategy') is-invalid @enderror" id="strategy" name="strategy" rows="4" placeholder="Enter project strategy...">{{ old('strategy', $project->strategy ?? '') }}</textarea>
                                    @error('strategy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="details" class="form-label">Project Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="10" required>{{ old('details', $project->details ?? '') }}</textarea>
                                    @error('details')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <span id="submitText">
                                    <i class="fas fa-save me-1"></i>
                                    {{ isset($project) ? 'Update Project' : 'Create Project' }}
                                </span>
                                <div id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
.progress {
    height: 25px;
    border-radius: 6px;
}
.progress-bar {
    transition: width 0.3s ease;
    border-radius: 6px;
}
.progress-text {
    font-weight: bold;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
    font-size: 12px;
}
.uploading {
    opacity: 0.7;
    pointer-events: none;
}
.form-label {
    font-weight: 600;
    margin-bottom: 8px;
}
.img-thumbnail {
    border: 2px solid #dee2e6;
    border-radius: 8px;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Summernote (without image upload)
    $('#details').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // Image preview for thumbnail with better validation
    $('#thumbnail').change(function() {
        const file = this.files[0];
        const maxSize = 2 * 1024 * 1024; // 2MB
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        
        if (file) {
            // Check file size
            if (file.size > maxSize) {
                alert('File size must be less than 2MB. Your file is ' + formatFileSize(file.size));
                $(this).val('');
                return;
            }
            
            // Check file type
            if (!validTypes.includes(file.type)) {
                alert('Please select a valid image file (JPEG, PNG, JPG, GIF)');
                $(this).val('');
                return;
            }
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#thumbnailPreview').html(
                    '<div class="mt-2">' +
                    '<img src="' + e.target.result + '" alt="Preview" width="150" class="img-thumbnail">' +
                    '<p class="text-muted mt-1">New thumbnail preview - ' + formatFileSize(file.size) + '</p>' +
                    '</div>'
                );
            }
            reader.readAsDataURL(file);
        }
    });

    // Form submission with enhanced progress
    $('#projectForm').on('submit', function(e) {
        const form = this;
        const submitBtn = $('#submitBtn');
        const submitText = $('#submitText');
        const submitSpinner = $('#submitSpinner');
        const progressContainer = $('#uploadProgressContainer');
        const progressBar = $('.progress-bar');
        const progressText = $('.progress-text');
        const uploadStatus = $('#uploadStatus');

        // Validate required fields
        const name = $('#name').val().trim();
        const categoryId = $('#category_id').val();
        const details = $('#details').val().trim();

        if (!name || !categoryId || !details) {
            alert('Please fill in all required fields (marked with *)');
            return false;
        }

        // Show loading state
        submitText.html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');
        submitSpinner.removeClass('d-none');
        submitBtn.prop('disabled', true);
        progressContainer.show();
        $(form).addClass('uploading');

        // Create FormData for AJAX upload
        const formData = new FormData(form);
        
        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                const xhr = new window.XMLHttpRequest();
                
                // Upload progress
                xhr.upload.addEventListener('progress', function(evt) {
                    if (evt.lengthComputable) {
                        const percentComplete = (evt.loaded / evt.total) * 100;
                        const percentRounded = Math.round(percentComplete);
                        
                        progressBar.css('width', percentComplete + '%');
                        progressBar.attr('aria-valuenow', percentRounded);
                        progressText.text(percentRounded + '%');
                        
                        if (percentComplete < 100) {
                            uploadStatus.text('Uploading: ' + percentRounded + '% - ' + 
                                formatFileSize(evt.loaded) + ' / ' + formatFileSize(evt.total));
                        } else {
                            uploadStatus.text('Processing...');
                        }
                    }
                }, false);
                
                return xhr;
            },
            success: function(response) {
                if (response.success) {
                    // Show success message and redirect
                    if (typeof toastr !== 'undefined') {
                        toastr.success(response.message);
                    } else {
                        alert('Project saved successfully!');
                    }
                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 1000);
                } else {
                    // Direct form submission fallback
                    window.location.href = "{{ route('projects.index') }}";
                }
            },
            error: function(xhr) {
                // Reset form state
                resetFormState();
                
                // Show error message
                let errorMessage = 'An error occurred while saving the project.';
                
                if (xhr.status === 413) {
                    errorMessage = 'File size too large. Please upload an image smaller than 2MB.';
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    errorMessage = Object.values(errors)[0][0];
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.status === 500) {
                    errorMessage = 'Server error. Please try again.';
                }
                
                if (typeof toastr !== 'undefined') {
                    toastr.error(errorMessage);
                } else {
                    alert(errorMessage);
                }
            }
        });
        
        e.preventDefault();
    });

    // Helper functions
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function resetFormState() {
        const submitText = $('#submitText');
        const submitSpinner = $('#submitSpinner');
        const submitBtn = $('#submitBtn');
        const progressContainer = $('#uploadProgressContainer');
        const form = $('#projectForm');

        submitText.html('<i class="fas fa-save me-1"></i> ' + 
            ("{{ isset($project) }}" ? 'Update Project' : 'Create Project'));
        submitSpinner.addClass('d-none');
        submitBtn.prop('disabled', false);
        progressContainer.hide();
        form.removeClass('uploading');
        
        // Reset progress bar
        $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);
        $('.progress-text').text('0%');
    }
});

// Fallback for toastr if not available
if (typeof toastr === 'undefined') {
    window.toastr = {
        success: function(msg) { alert('Success: ' + msg); },
        error: function(msg) { alert('Error: ' + msg); }
    };
} else {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 5000
    };
}
</script>
@endpush