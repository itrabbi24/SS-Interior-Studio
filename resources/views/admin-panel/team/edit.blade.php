@extends('admin-panel.shared.layout')

@section('title', 'Edit Team Member - SS Interior')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Team Member
                    </h4>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back to Team
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data" id="teamForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $team->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                                           value="{{ old('designation', $team->designation) }}" required>
                                    @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Position Level <span class="text-danger">*</span></label>
                                    <select name="position_level" class="form-select @error('position_level') is-invalid @enderror" required>
                                        <option value="">Select Position Level</option>
                                        @foreach($positionLevels as $key => $level)
                                            <option value="{{ $key }}" {{ old('position_level', $team->position_level) == $key ? 'selected' : '' }}>
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
                                           value="{{ old('order', $team->order) }}" min="1" max="100" required>
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
                                        Max: 5MB. Leave empty to keep current image.
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Image Preview -->
                                    <div id="imagePreview" class="mt-3 text-center">
                                        @if($team->image && Storage::disk('public')->exists($team->image))
                                            <div class="position-relative d-inline-block">
                                                <img src="{{ Storage::disk('public')->url($team->image) }}" 
                                                     alt="{{ $team->name }}" 
                                                     width="150" 
                                                     height="150"
                                                     class="img-thumbnail rounded-circle object-fit-cover"
                                                     id="currentImage">
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle"
                                                        style="width: 25px; height: 25px; padding: 0;"
                                                        onclick="removeImage({{ $team->id }})"
                                                        title="Remove Image">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Current Image</p>
                                        @else
                                            <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
                                                 style="width: 150px; height: 150px;">
                                                <i class="fas fa-user text-muted fa-3x"></i>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">No Image</p>
                                        @endif
                                    </div>
                                </div>

<!-- Add this hidden field to ensure is_active is always submitted -->
<input type="hidden" name="is_active" value="0">

<div class="mb-3 form-check form-switch">
    <input type="checkbox" name="is_active" 
           class="form-check-input" id="is_active"
           value="1"
           {{ old('is_active', $team->is_active) ? 'checked' : '' }}>
    <label class="form-check-label fw-semibold" for="is_active">
        Active Member
    </label>
</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Qualifications & Achievements</label>
                            @php
                                $qualifications = [];

                                if ($team->qualifications) {
                                    if (is_string($team->qualifications)) {
                                        $decoded = json_decode($team->qualifications, true);
                                        if (is_array($decoded)) {
                                            $qualifications = $decoded;
                                        }
                                    } elseif (is_array($team->qualifications)) {
                                        $qualifications = $team->qualifications;
                                    }
                                }
                            @endphp
                            <textarea name="qualifications" rows="4" 
                                      class="form-control @error('qualifications') is-invalid @enderror"
                                      placeholder="Enter qualifications, one per line">{{ old('qualifications', implode("\n", $qualifications)) }}</textarea>
                            @error('qualifications')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Update Team Member
                            </button>
                            <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <a href="{{ route('admin.team.create') }}" class="btn btn-outline-primary ms-auto">
                                <i class="fas fa-plus me-2"></i>Create New
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

        if (file.size > maxSize) {
            alert('File size must be less than 5MB. Your file is ' + formatFileSize(file.size));
            $(this).val('');
            return;
        }
        
        if (!validTypes.includes(file.type)) {
            alert('Please select a valid image file (JPEG, PNG, JPG, GIF, WebP)');
            $(this).val('');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').html(`
                <div class="text-center">
                    <img src="${e.target.result}" 
                         alt="Preview" 
                         width="150" 
                         height="150"
                         class="img-thumbnail rounded-circle object-fit-cover">
                    <p class="text-muted mt-2 mb-0">New Image Preview - ${formatFileSize(file.size)}</p>
                    <button type="button" class="btn btn-sm btn-outline-danger mt-1" onclick="clearImage()">
                        <i class="fas fa-times me-1"></i>Remove
                    </button>
                </div>
            `);
        }
        reader.readAsDataURL(file);
    });
});

function clearImage() {
    $('#imageInput').val('');
    location.reload();
}

function removeImage(teamId) {
    if (!confirm('Are you sure you want to remove this image?')) return;
    
    $.ajax({
        url: `/admin/team/${teamId}/remove-image`,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        headers: {
            'X-HTTP-Method-Override': 'DELETE'
        },
        success: function(response) {
            if (response.success) {
                $('#imagePreview').html(`
                    <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light"
                         style="width: 150px; height: 150px;">
                        <i class="fas fa-user text-muted fa-3x"></i>
                    </div>
                    <p class="text-muted mt-2 mb-0">No Image</p>
                `);
                if (typeof toastr !== 'undefined') {
                    toastr.success('Image removed successfully');
                } else {
                    alert('Image removed successfully');
                }
            }
        },
        error: function(xhr) {
            if (typeof toastr !== 'undefined') {
                toastr.error('Error removing image');
            } else {
                alert('Error removing image');
            }
        }
    });
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

if (typeof toastr !== 'undefined') {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 5000
    };
}
</script>
@endpush