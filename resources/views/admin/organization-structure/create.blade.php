@extends('layouts.admin.app')

@section('title', 'Tambah Struktur Organisasi')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-plus me-2"></i>
            Tambah Struktur Organisasi
        </h2>
        <a href="{{ route('organization-structure.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Tambah Struktur Organisasi
        </div>
        <div class="card-body">
            <form action="{{ route('organization-structure.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Organization Structure Photo Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-sitemap me-2"></i>Bagan Struktur Organisasi
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo" class="form-label">Foto Bagan Struktur Organisasi <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               id="photo" name="photo" accept="image/*" required>
                        <div class="form-text">
                            <strong>Persyaratan File:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Maksimal 5MB</li>
                                <li>Format: JPG, JPEG, PNG, GIF</li>
                                <li>Disarankan resolusi tinggi untuk kualitas terbaik</li>
                                <li>Pastikan teks dalam bagan dapat terbaca dengan jelas</li>
                            </ul>
                        </div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Information Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi
                        </h5>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-info">
                            <h6 class="alert-heading">
                                <i class="fas fa-lightbulb me-2"></i>Tips untuk Bagan Struktur Organisasi yang Baik:
                            </h6>
                            <ul class="mb-0">
                                <li>Gunakan resolusi tinggi (minimal 1200px lebar) untuk kejelasan</li>
                                <li>Pastikan nama posisi dan departemen mudah dibaca</li>
                                <li>Gunakan warna yang kontras untuk teks dan background</li>
                                <li>Susun hierarki dengan jelas dari atas ke bawah</li>
                                <li>Sertakan garis penghubung yang jelas antar posisi</li>
                                <li>Gunakan font yang profesional dan mudah dibaca</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                    <a href="{{ route('organization-structure.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview image functionality
    const photoInput = document.getElementById('photo');

    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Create preview container if it doesn't exist
                let preview = document.getElementById('photo_preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'photo_preview';
                    preview.className = 'mt-3';
                    photoInput.parentNode.appendChild(preview);
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="text-center">
                            <h6 class="text-success mb-2">
                                <i class="fas fa-check-circle me-1"></i>Pratinjau Bagan Struktur Organisasi
                            </h6>
                            <div class="border rounded p-3 bg-light">
                                <img src="${e.target.result}" alt="Preview"
                                     class="img-fluid rounded shadow" style="max-width: 100%; max-height: 400px; object-fit: contain;">
                            </div>
                            <small class="text-muted mt-2 d-block">
                                File: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)
                            </small>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // File size validation
    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes
            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar! Maksimal 5MB.');
                this.value = '';
                // Remove preview if exists
                const preview = document.getElementById('photo_preview');
                if (preview) {
                    preview.remove();
                }
            }
        }
    });
});
</script>
@endpush