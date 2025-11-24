@extends('layouts.admin.app')

@section('title', 'Edit Struktur Organisasi')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Struktur Organisasi
        </h2>
        <a href="{{ route('organization-structure.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Struktur Organisasi
        </div>
        <div class="card-body">
            <form action="{{ route('organization-structure.update', $organizationStructure) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Organization Structure Photo Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-sitemap me-2"></i>Bagan Struktur Organisasi
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo" class="form-label">Foto Bagan Struktur Organisasi</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               id="photo" name="photo" accept="image/*">
                        <div class="form-text">
                            <strong>Persyaratan File:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Maksimal 5MB</li>
                                <li>Format: JPG, JPEG, PNG, GIF</li>
                                <li>Disarankan resolusi tinggi untuk kualitas terbaik</li>
                                <li>Kosongkan jika tidak ingin mengubah bagan saat ini</li>
                            </ul>
                        </div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($organizationStructure->photo)
                        <div class="mt-3">
                            <h6 class="text-muted mb-2">Bagan Saat Ini:</h6>
                            <div class="border rounded p-3 bg-light text-center">
                                <img src="{{ Storage::url($organizationStructure->photo) }}" alt="Current Organization Structure"
                                     class="img-fluid rounded shadow" style="max-width: 100%; max-height: 400px; object-fit: contain;">
                                <div class="mt-2">
                                    <a href="{{ Storage::url($organizationStructure->photo) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-external-link-alt me-1"></i>Lihat Full Size
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
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

                @if($organizationStructure->photo)
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-chart-bar me-2"></i>Informasi File Saat Ini
                        </h5>
                    </div>
                    <div class="col-12">
                        @php
                            $filePath = storage_path('app/public/' . $organizationStructure->photo);
                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                            $fileExtension = strtoupper(pathinfo($organizationStructure->photo, PATHINFO_EXTENSION));
                        @endphp
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Format:</strong> <span class="badge bg-info">{{ $fileExtension }}</span>
                            </div>
                            <div class="col-md-4">
                                <strong>Ukuran:</strong> {{ number_format($fileSize / 1024, 1) }} KB
                            </div>
                            <div class="col-md-4">
                                <strong>Diupload:</strong> {{ $organizationStructure->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
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
                                <i class="fas fa-check-circle me-1"></i>Pratinjau Bagan Baru yang Dipilih
                            </h6>
                            <div class="border rounded p-3 bg-success bg-opacity-10">
                                <img src="${e.target.result}" alt="Preview"
                                     class="img-fluid rounded shadow" style="max-width: 100%; max-height: 400px; object-fit: contain;">
                            </div>
                            <small class="text-success mt-2 d-block">
                                <i class="fas fa-arrow-up me-1"></i>Bagan baru: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)
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