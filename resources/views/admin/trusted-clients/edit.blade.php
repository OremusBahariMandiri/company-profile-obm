@extends('layouts.admin.app')

@section('title', 'Edit Logo Klien')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Logo Klien
        </h2>
        <a href="{{ route('trusted-clients.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Logo Klien - ID: {{ $trustedClient->id }}
        </div>
        <div class="card-body">
            <form action="{{ route('trusted-clients.update', $trustedClient) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Current Logo Display -->
                @if($trustedClient->photo)
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Logo Saat Ini
                        </h5>
                    </div>
                    <div class="col-12">
                        <div class="current-logo-display">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="current-logo-container">
                                        {{-- BEFORE: Storage::url() --}}
                                        {{-- <img src="{{ Storage::url($trustedClient->photo) }}" alt="Current Logo" --}}

                                        {{-- AFTER: StorageHelper --}}
                                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($trustedClient->photo) }}" alt="Current Logo"
                                             class="current-logo-img">
                                        <div class="current-logo-info">
                                            <p class="mb-1"><strong>File:</strong> {{ basename($trustedClient->photo) }}</p>
                                            <p class="mb-1"><strong>Upload:</strong> {{ $trustedClient->created_at->format('d F Y, H:i') }}</p>
                                            <p class="mb-0"><strong>Update:</strong> {{ $trustedClient->updated_at->format('d F Y, H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="website-current-preview">
                                        <h6 class="fw-bold mb-3">Preview Website Saat Ini:</h6>
                                        <div class="client-current-preview">
                                            <div class="client-current-logo">
                                                {{-- BEFORE: Storage::url() --}}
                                                {{-- <img src="{{ Storage::url($trustedClient->photo) }}" alt="Current Website Preview"> --}}

                                                {{-- AFTER: StorageHelper --}}
                                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($trustedClient->photo) }}" alt="Current Website Preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                @endif

                <!-- Upload Instructions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle me-2"></i>{{ $trustedClient->photo ? 'Ganti Logo' : 'Upload Logo' }}
                            </h5>
                            <ul class="mb-0">
                                <li>Format yang didukung: JPG, JPEG, PNG, GIF, SVG</li>
                                <li>Ukuran maksimal: 5MB per file</li>
                                <li>Dimensi yang disarankan: 300x200 pixel (rasio 3:2)</li>
                                @if($trustedClient->photo)
                                    <li><strong>Biarkan kosong jika tidak ingin mengganti logo</strong></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- File Upload Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-cloud-upload-alt me-2"></i>{{ $trustedClient->photo ? 'Upload Logo Baru (Opsional)' : 'Upload Logo' }}
                        </h5>
                    </div>
                    <div class="col-12">
                        <div class="upload-area" id="uploadArea">
                            <input type="file" class="form-control d-none @error('photo') is-invalid @enderror"
                                   id="photo" name="photo" accept="image/*" {{ !$trustedClient->photo ? 'required' : '' }}>

                            <div class="upload-content" id="uploadContent">
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                <h5 class="text-primary">{{ $trustedClient->photo ? 'Ganti dengan Logo Baru' : 'Upload Logo' }}</h5>
                                <p class="text-muted">{{ $trustedClient->photo ? 'Drag & Drop atau klik untuk mengganti logo' : 'Drag & Drop atau klik untuk upload logo' }}</p>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('photo').click()">
                                    <i class="fas fa-folder-open me-2"></i>Pilih File
                                </button>
                            </div>

                            <div class="upload-preview d-none" id="uploadPreview">
                                <div class="preview-container">
                                    <img id="previewImage" class="preview-img" src="" alt="Preview">
                                    <div class="preview-overlay">
                                        <button type="button" class="btn btn-sm btn-danger" id="removeImage">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="preview-info mt-3">
                                    <p class="mb-1"><strong>File:</strong> <span id="fileName"></span></p>
                                    <p class="mb-1"><strong>Ukuran:</strong> <span id="fileSize"></span></p>
                                    <p class="mb-0"><strong>Dimensi:</strong> <span id="fileDimensions"></span></p>
                                </div>
                            </div>
                        </div>

                        @error('photo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Preview Website Display -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-desktop me-2"></i>Preview Logo Baru
                        </h5>
                        <div class="website-preview">
                            <div class="alert alert-light">
                                <h6 class="fw-bold mb-3">Bagaimana logo baru akan tampil di website:</h6>
                                <div class="client-preview-grid">
                                    <div class="client-preview-item">
                                        <div class="client-preview-logo">
                                            <img id="websitePreview" src="" alt="Logo Preview" style="display: none;">
                                            <div id="websitePlaceholder" class="preview-placeholder">
                                                <i class="fas fa-image fa-2x text-muted"></i>
                                                <p class="text-muted mt-2">Logo baru akan muncul di sini</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="client-preview-item">
                                        <div class="client-preview-logo">
                                            <img src="{{ asset('images/clients/1.png') }}" alt="Sample Logo">
                                        </div>
                                    </div>
                                    <div class="client-preview-item">
                                        <div class="client-preview-logo">
                                            <img src="{{ asset('images/clients/2.png') }}" alt="Sample Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Logo
                    </button>
                    <a href="{{ route('trusted-clients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.current-logo-display {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 15px;
    border: 1px solid #e3e6f0;
}

.current-logo-container {
    text-align: center;
}

.current-logo-img {
    max-width: 100%;
    max-height: 200px;
    object-fit: contain;
    border-radius: 10px;
    border: 2px solid #e3e6f0;
    background: white;
    padding: 15px;
    margin-bottom: 15px;
}

.current-logo-info {
    background: white;
    padding: 1rem;
    border-radius: 10px;
    border: 1px solid #e3e6f0;
    text-align: left;
}

.website-current-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.client-current-preview {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    width: 150px;
}

.client-current-logo {
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.client-current-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: filter 0.3s ease;
}

.client-current-preview:hover .client-current-logo img {
    filter: grayscale(0%) opacity(1);
}

.upload-area {
    border: 3px dashed #dee2e6;
    border-radius: 15px;
    padding: 3rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
    background: #f8f9fa;
    position: relative;
    min-height: 300px;
}

.upload-area.dragover {
    border-color: var(--bs-primary);
    background: rgba(13, 110, 253, 0.1);
}

.upload-area.has-file {
    border-color: var(--bs-success);
    background: rgba(25, 135, 84, 0.1);
}

.upload-content {
    cursor: pointer;
}

.preview-container {
    position: relative;
    display: inline-block;
    max-width: 300px;
}

.preview-img {
    max-width: 100%;
    max-height: 200px;
    object-fit: contain;
    border-radius: 10px;
    border: 2px solid #e3e6f0;
}

.preview-overlay {
    position: absolute;
    top: 10px;
    right: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.preview-container:hover .preview-overlay {
    opacity: 1;
}

.preview-info {
    background: white;
    padding: 1rem;
    border-radius: 10px;
    border: 1px solid #e3e6f0;
    text-align: left;
}

.preview-placeholder {
    width: 200px;
    height: 150px;
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.client-preview-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    max-width: 600px;
}

.client-preview-item {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.client-preview-logo {
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.client-preview-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: filter 0.3s ease;
}

.client-preview-item:hover .client-preview-logo img {
    filter: grayscale(0%) opacity(1);
}

@media (max-width: 768px) {
    .current-logo-display {
        padding: 1rem;
    }

    .upload-area {
        padding: 2rem 1rem;
        min-height: 250px;
    }

    .client-preview-grid {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }

    .preview-container {
        max-width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const photoInput = document.getElementById('photo');
    const uploadContent = document.getElementById('uploadContent');
    const uploadPreview = document.getElementById('uploadPreview');
    const previewImage = document.getElementById('previewImage');
    const websitePreview = document.getElementById('websitePreview');
    const websitePlaceholder = document.getElementById('websitePlaceholder');
    const removeImageBtn = document.getElementById('removeImage');

    // Make upload area clickable
    uploadContent.addEventListener('click', function() {
        photoInput.click();
    });

    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            photoInput.files = files;
            handleFileSelect();
        }
    });

    // File input change
    photoInput.addEventListener('change', handleFileSelect);

    // Remove image functionality
    removeImageBtn.addEventListener('click', function() {
        photoInput.value = '';
        resetUploadArea();
    });

    function handleFileSelect() {
        const file = photoInput.files[0];
        if (file) {
            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/svg+xml'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, GIF, atau SVG.');
                resetUploadArea();
                return;
            }

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 5MB.');
                resetUploadArea();
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                websitePreview.src = e.target.result;

                // Update file info
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = formatFileSize(file.size);

                // Get image dimensions
                const img = new Image();
                img.onload = function() {
                    document.getElementById('fileDimensions').textContent = `${this.width}x${this.height}px`;
                };
                img.src = e.target.result;

                // Show preview, hide upload content
                uploadContent.classList.add('d-none');
                uploadPreview.classList.remove('d-none');
                uploadArea.classList.add('has-file');

                // Show website preview
                websitePreview.style.display = 'block';
                websitePlaceholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }

    function resetUploadArea() {
        uploadContent.classList.remove('d-none');
        uploadPreview.classList.add('d-none');
        uploadArea.classList.remove('has-file', 'dragover');

        // Hide website preview
        websitePreview.style.display = 'none';
        websitePlaceholder.style.display = 'flex';
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
});
</script>
@endpush