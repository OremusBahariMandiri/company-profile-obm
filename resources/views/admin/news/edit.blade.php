@extends('layouts.admin.app')

@section('title', 'Edit News - Maritime Dashboard')

@push('styles')
<style>
    .dashboard-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(26, 75, 120, 0.1);
        border: none;
        overflow: hidden;
    }

    .card-header {
        font-weight: 600;
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        color: white;
        border: none;
        padding: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #1a4b78;
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid #e3f2fd;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1a4b78;
        box-shadow: 0 0 0 0.2rem rgba(26, 75, 120, 0.25);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        box-shadow: 0 4px 10px rgba(26, 75, 120, 0.3);
        transform: translateY(-2px);
        background: linear-gradient(135deg, #2c6ca5 0%, #1a4b78 100%);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .btn-light {
        background: #f8f9fa;
        border: 2px solid #e3f2fd;
        color: #1a4b78;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background: #e3f2fd;
        border-color: #1a4b78;
        color: #1a4b78;
    }

    .image-upload-container {
        border: 2px dashed #e3f2fd;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        transition: all 0.3s ease;
        background: #fafbfc;
    }

    .image-upload-container:hover {
        border-color: #1a4b78;
        background: #f8fbff;
    }

    .current-image {
        position: relative;
        margin-bottom: 15px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(26, 75, 120, 0.1);
    }

    .current-image img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e3f2fd;
    }

    .current-image-label {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(26, 75, 120, 0.9);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .image-preview {
        max-width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e3f2fd;
        margin-top: 10px;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-section {
        background: #f8fbff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border-left: 4px solid #1a4b78;
    }

    .section-title {
        color: #1a4b78;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .upload-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
    }

    .upload-icon i {
        color: #1a4b78;
        font-size: 1.2rem;
    }

    .upload-hint {
        color: #6c757d;
        font-size: 0.85rem;
        margin-top: 8px;
        text-align: center;
    }

    .image-section {
        background: white;
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #e3f2fd;
        transition: all 0.3s ease;
    }

    .image-section:hover {
        box-shadow: 0 2px 8px rgba(26, 75, 120, 0.1);
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card fade-in mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-edit me-2"></i> Edit News
                    </div>
                    <a href="{{ route('news.show', $news->id) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Back to Details
                    </a>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Basic Information Section -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fas fa-info-circle me-2"></i>Basic Information
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" value="{{ old('title', $news->title) }}"
                                               placeholder="Enter news title..." required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="topic" class="form-label">Topic <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('topic') is-invalid @enderror"
                                               id="topic" name="topic" value="{{ old('topic', $news->topic) }}"
                                               placeholder="e.g. Maritime Safety, Port News..." required>
                                        @error('topic')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="news" class="form-label">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('news') is-invalid @enderror"
                                          id="news" name="news" rows="8"
                                          placeholder="Write your news content here..." required>{{ old('news', $news->news) }}</textarea>
                                @error('news')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="form-section">
                            <div class="section-title">
                                <i class="fas fa-images me-2"></i>Images
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="image-section mb-3">
                                        <label for="image" class="form-label">Main Image</label>
                                        @if($news->image)
                                            <div class="current-image">
                                                <img src="{{ Storage::url($news->image) }}" alt="Current Main Image">
                                                <div class="current-image-label">Current</div>
                                            </div>
                                        @endif
                                        <div class="image-upload-container">
                                            <div class="upload-icon">
                                                <i class="fas fa-camera"></i>
                                            </div>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                   id="image" name="image" accept="image/*"
                                                   onchange="previewImage(this, 'preview1')">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img id="preview1" src="#" alt="Preview" class="image-preview" style="display: none;">
                                        <div class="upload-hint">Leave empty to keep current image</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="image-section mb-3">
                                        <label for="image2" class="form-label">Additional Image 2</label>
                                        @if($news->image2)
                                            <div class="current-image">
                                                <img src="{{ Storage::url($news->image2) }}" alt="Current Image 2">
                                                <div class="current-image-label">Current</div>
                                            </div>
                                        @endif
                                        <div class="image-upload-container">
                                            <div class="upload-icon">
                                                <i class="fas fa-image"></i>
                                            </div>
                                            <input type="file" class="form-control @error('image2') is-invalid @enderror"
                                                   id="image2" name="image2" accept="image/*"
                                                   onchange="previewImage(this, 'preview2')">
                                            @error('image2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img id="preview2" src="#" alt="Preview" class="image-preview" style="display: none;">
                                        <div class="upload-hint">Leave empty to keep current image</div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="image-section mb-3">
                                        <label for="image3" class="form-label">Additional Image 3</label>
                                        @if($news->image3)
                                            <div class="current-image">
                                                <img src="{{ Storage::url($news->image3) }}" alt="Current Image 3">
                                                <div class="current-image-label">Current</div>
                                            </div>
                                        @endif
                                        <div class="image-upload-container">
                                            <div class="upload-icon">
                                                <i class="fas fa-image"></i>
                                            </div>
                                            <input type="file" class="form-control @error('image3') is-invalid @enderror"
                                                   id="image3" name="image3" accept="image/*"
                                                   onchange="previewImage(this, 'preview3')">
                                            @error('image3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img id="preview3" src="#" alt="Preview" class="image-preview" style="display: none;">
                                        <div class="upload-hint">Leave empty to keep current image</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('news.show', $news->id) }}" class="btn btn-light">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Update News
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

// Add some interactive feedback
document.addEventListener('DOMContentLoaded', function() {
    // Add focus effects to form controls
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });

        control.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Add hover effects to image sections
    const imageSections = document.querySelectorAll('.image-section');
    imageSections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection