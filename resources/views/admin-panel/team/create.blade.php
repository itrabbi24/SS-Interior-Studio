@extends('admin-panel.shared.layout')

@section('title', 'Create Team Member - SS Interior')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-plus me-2"></i>Create New Team Member
                    </h4>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back to Team
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" id="teamForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" placeholder="Enter full name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                                           value="{{ old('designation') }}" placeholder="Enter designation/role" required>
                                    @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Position Level <span class="text-danger">*</span></label>
                                    <select name="position_level" class="form-select @error('position_level') is-invalid @enderror" required>
                                        <option value="">Select Position Level</option>
                                        @foreach($positionLevels as $key => $level)
                                            <option value="{{ $key }}" {{ old('position_level') == $key ? 'selected' : '' }}>
                                                {{ $level }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror"
                                           value="{{ old('order', $defaultOrder ?? 1) }}" min="1" max="100" required>
                                    <div class="form-text">Lower numbers appear first</div>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Profile Image</label>
                                    <input type="file" name="image" 
                                           class="form-control @error('image') is-invalid @enderror" 
                                           id="imageInput"
                                           accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                    <div class="form-text">
                                        Max: 5MB. Formats: JPG, PNG, GIF, WebP. Images are auto-optimized.
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Image Preview -->
                                    <div id="imagePreview" class="mt-3 text-center">
                                        <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
                                             style="width: 150px; height: 150px;">
                                            <i class="fas fa-user text-muted fa-3x"></i>
                                        </div>
                                        <p class="text-muted mt-2 mb-0">No Image Selected</p>
                                    </div>
                                </div>

                                <div class="mb-3 form-check form-switch">
                                    <input type="checkbox" name="is_active" 
                                           class="form-check-input" id="is_active" checked>
                                    <label class="form-check-label fw-semibold" for="is_active">
                                        Active Member
                                    </label>
                                    <div class="form-text">Inactive members won't be shown on website</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Qualifications & Achievements</label>
                            <textarea name="qualifications" rows="4" 
                                      class="form-control @error('qualifications') is-invalid @enderror"
                                      placeholder="Enter qualifications, one per line. Example:&#10;B.Arch (KMU)&#10;Member IAB: J-039">{{ old('qualifications') }}</textarea>
                            <div class="form-text">Enter each qualification on a new line</div>
                            @error('qualifications')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Create Team Member
                            </button>
                            <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Image preview with validation
    $('#imageInput').change(function() {
        const file = this.files[0];
        const maxSize = 5 * 1024 * 1024; // 5MB
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
        
        if (!file) return;

        // Validate file size
        if (file.size > maxSize) {
            alert('File size must be less than 5MB. Your file is ' + formatFileSize(file.size));
            $(this).val('');
            return;
        }
        
        // Validate file type
        if (!validTypes.includes(file.type)) {
            alert('Please select a valid image file (JPEG, PNG, JPG, GIF, WebP)');
            $(this).val('');
            return;
        }
        
        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').html(`
                <div class="text-center">
                    <img src="${e.target.result}" 
                         alt="Preview" 
                         width="150" 
                         height="150"
                         class="img-thumbnail rounded-circle object-fit-cover">
                    <p class="text-muted mt-2 mb-0">Preview - ${formatFileSize(file.size)}</p>
                    <button type="button" class="btn btn-sm btn-outline-danger mt-1" onclick="clearImage()">
                        <i class="fas fa-times me-1"></i>Remove
                    </button>
                </div>
            `);
        }
        reader.readAsDataURL(file);
    });

    // Form submission handler
    $('#teamForm').on('submit', function(e) {
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Creating...');
    });
});

function clearImage() {
    $('#imageInput').val('');
    $('#imagePreview').html(`
        <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
             style="width: 150px; height: 150px;">
            <i class="fas fa-user text-muted fa-3x"></i>
        </div>
        <p class="text-muted mt-2 mb-0">No Image Selected</p>
    `);
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>
@endpush