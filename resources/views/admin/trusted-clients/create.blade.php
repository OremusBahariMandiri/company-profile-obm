@extends('layouts.admin.app')

@section('title', 'Tambah Logo Klien')

@section('content')
    <div class="fade-in">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">
                <i class="fas fa-plus me-2"></i>
                Tambah Logo Klien
            </h2>
            <a href="{{ route('trusted-clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="dashboard-card">
            <div class="card-header">
                <i class="fas fa-upload me-2"></i>Form Tambah Logo Klien
            </div>
            <div class="card-body">
                <form action="{{ route('trusted-clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Upload Instructions -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h5 class="alert-heading">
                                    <i class="fas fa-info-circle me-2"></i>Panduan Upload Logo
                                </h5>
                                <ul class="mb-0">
                                    <li>Format yang didukung: JPG, JPEG, PNG, GIF, SVG</li>
                                    <li>Ukuran maksimal: 5MB per file</li>
                                    <li>Dimensi yang disarankan: 300x200 pixel (rasio 3:2)</li>
                                    <li>Background transparan direkomendasikan untuk logo</li>
                                    <li>Logo akan ditampilkan dengan filter grayscale di website</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- File Upload Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="text-primary border-bottom pb-2">
                                <i class="fas fa-cloud-upload-alt me-2"></i>Upload Logo
                            </h5>
                        </div>
                        <div class="col-12">
                            <label for="photo" class="upload-area" id="uploadArea">
                                <input type="file" class="form-control d-none @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" accept="image/*" required>

                                <div class="upload-content" id="uploadContent">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                    <h5 class="text-primary">Drag & Drop atau Klik untuk Upload</h5>
                                    <p class="text-muted">Pilih file logo klien dari komputer Anda</p>
                                    <span class="btn btn-primary">
                                        <i class="fas fa-folder-open me-2"></i>Pilih File
                                    </span>
                                </div>

                                <div class="upload-preview d-none" id="uploadPreview">
                                    <div class="preview-container">
                                        <img id="previewImage" class="preview-img" src="" alt="Preview">
                                    </div>
                                    <div class="preview-info mt-3">
                                        <p class="mb-1"><strong>File:</strong> <span id="fileName"></span></p>
                                        <p class="mb-1"><strong>Ukuran:</strong> <span id="fileSize"></span></p>
                                        <p class="mb-0"><strong>Dimensi:</strong> <span id="fileDimensions"></span></p>
                                    </div>
                                </div>
                            </label>

                            <!-- Tombol Remove di luar label -->
                            <div class="text-center mt-2 d-none" id="removeContainer">
                                <button type="button" class="btn btn-outline-danger btn-sm" id="removeImage">
                                    <i class="fas fa-trash me-2"></i>Hapus & Pilih Ulang
                                </button>
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
                                <i class="fas fa-desktop me-2"></i>Preview Website
                            </h5>
                            <div class="website-preview">
                                <div class="alert alert-light">
                                    <h6 class="fw-bold mb-3">Bagaimana logo akan tampil di website:</h6>
                                    <div class="client-preview-grid">
                                        <div class="client-preview-item">
                                            <div class="client-preview-logo">
                                                <img id="websitePreview" src="" alt="Logo Preview"
                                                    style="display: none;">
                                                <div id="websitePlaceholder" class="preview-placeholder">
                                                    <i class="fas fa-image fa-2x text-muted"></i>
                                                    <p class="text-muted mt-2">Logo akan muncul di sini</p>
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
                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>
                            <i class="fas fa-save me-2"></i>Simpan Logo
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
        .upload-area {
            display: block;
            border: 3px dashed #dee2e6;
            border-radius: 15px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9fa;
            position: relative;
            min-height: 300px;
            cursor: pointer;
        }

        .upload-area:hover {
            border-color: var(--bs-primary);
            background: rgba(13, 110, 253, 0.05);
        }

        .upload-area.dragover {
            border-color: var(--bs-primary);
            background: rgba(13, 110, 253, 0.1);
        }

        .upload-area.has-file {
            border-color: var(--bs-success);
            background: rgba(25, 135, 84, 0.1);
            cursor: default;
        }

        .upload-content {
            pointer-events: none;
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

        .preview-info {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid #e3e6f0;
            text-align: left;
            pointer-events: none;
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
            const removeContainer = document.getElementById('removeContainer');
            const removeImageBtn = document.getElementById('removeImage');
            const submitBtn = document.getElementById('submitBtn');

            // File input change handler
            photoInput.addEventListener('change', function(e) {
                handleFileSelect(this.files[0]);
            });

            // Prevent click when file is selected
            uploadArea.addEventListener('click', function(e) {
                if (uploadArea.classList.contains('has-file')) {
                    e.preventDefault();
                }
            });

            // Drag and drop
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (!uploadArea.classList.contains('has-file')) {
                    uploadArea.classList.add('dragover');
                }
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                uploadArea.classList.remove('dragover');

                if (!uploadArea.classList.contains('has-file')) {
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        // Set file ke input
                        const dt = new DataTransfer();
                        dt.items.add(files[0]);
                        photoInput.files = dt.files;
                        handleFileSelect(files[0]);
                    }
                }
            });

            // Remove image
            removeImageBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                resetUploadArea();
            });

            function handleFileSelect(file) {
                if (!file) return;

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
                        document.getElementById('fileDimensions').textContent =
                            this.width + 'x' + this.height + 'px';
                    };
                    img.src = e.target.result;

                    // Update UI
                    uploadContent.classList.add('d-none');
                    uploadPreview.classList.remove('d-none');
                    uploadArea.classList.add('has-file');
                    removeContainer.classList.remove('d-none');

                    // Show website preview
                    websitePreview.style.display = 'block';
                    websitePlaceholder.style.display = 'none';

                    // Enable submit
                    submitBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            }

            function resetUploadArea() {
                photoInput.value = '';
                uploadContent.classList.remove('d-none');
                uploadPreview.classList.add('d-none');
                uploadArea.classList.remove('has-file', 'dragover');
                removeContainer.classList.add('d-none');

                // Hide website preview
                websitePreview.style.display = 'none';
                websitePlaceholder.style.display = 'flex';

                // Disable submit
                submitBtn.disabled = true;
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