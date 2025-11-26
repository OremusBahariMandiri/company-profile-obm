@extends('layouts.admin.app')

@section('title', 'Detail Struktur Organisasi')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Struktur Organisasi
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('organization-structure.edit', $organizationStructure) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('organization-structure.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Organization Structure Photo -->
    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-sitemap me-2"></i>Bagan Struktur Organisasi
        </div>
        <div class="card-body text-center">
            @if($organizationStructure->photo)
                <div class="mb-3">
                    <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($organizationStructure->photo) }}" alt="Organization Structure"
                         class="img-fluid rounded shadow border" style="max-width: 100%; max-height: 600px; object-fit: contain;">
                </div>
                <div class="d-flex justify-content-center gap-2">
                    {{-- BEFORE: Storage::url() --}}
                    {{-- <a href="{{ Storage::url($organizationStructure->photo) }}" target="_blank" class="btn btn-primary"> --}}
                    {{-- <a href="{{ Storage::url($organizationStructure->photo) }}" download class="btn btn-info"> --}}

                    {{-- AFTER: StorageHelper --}}
                    <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($organizationStructure->photo) }}" target="_blank" class="btn btn-primary">
                        <i class="fas fa-external-link-alt me-2"></i>Buka Full Size
                    </a>
                    <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($organizationStructure->photo) }}" download class="btn btn-info">
                        <i class="fas fa-download me-2"></i>Unduh Bagan
                    </a>
                </div>
            @else
                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                    <div class="text-center">
                        <i class="fas fa-sitemap text-muted" style="font-size: 4rem;"></i>
                        <p class="text-muted mt-3">Tidak ada bagan struktur organisasi</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <!-- File Information -->
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi File
                </div>
                <div class="card-body">
                    @if($organizationStructure->photo)
                        @php
                            // BEFORE: storage_path('app/public/' . $organizationStructure->photo);
                            // AFTER: Use StorageHelper methods
                            $fileSize = \App\Helpers\StorageHelper::getFileSize($organizationStructure->photo);
                            $fileExtension = strtoupper(pathinfo($organizationStructure->photo, PATHINFO_EXTENSION));
                            $fileName = basename($organizationStructure->photo);

                            // For image dimensions, we still need the full path
                            $fullPath = \App\Helpers\StorageHelper::getStoragePath($organizationStructure->photo);
                        @endphp

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong class="text-primary">Nama File:</strong>
                            </div>
                            <div class="col-md-8">
                                <span class="text-dark">{{ $fileName }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong class="text-primary">Format:</strong>
                            </div>
                            <div class="col-md-8">
                                <span class="badge bg-info">{{ $fileExtension }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong class="text-primary">Ukuran File:</strong>
                            </div>
                            <div class="col-md-8">
                                <span class="text-dark">{{ number_format($fileSize / 1024, 1) }} KB</span>
                                <span class="text-muted">({{ number_format($fileSize / 1024 / 1024, 2) }} MB)</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong class="text-primary">Path:</strong>
                            </div>
                            <div class="col-md-8">
                                <small class="text-muted font-monospace">{{ $organizationStructure->photo }}</small>
                            </div>
                        </div>

                        @if(function_exists('getimagesize') && file_exists($fullPath))
                            @php
                                $imageInfo = getimagesize($fullPath);
                            @endphp
                            @if($imageInfo)
                            <div class="row">
                                <div class="col-md-4">
                                    <strong class="text-primary">Dimensi:</strong>
                                </div>
                                <div class="col-md-8">
                                    <span class="text-dark">{{ $imageInfo[0] }} × {{ $imageInfo[1] }} pixels</span>
                                </div>
                            </div>
                            @endif
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-exclamation-circle text-warning" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2 mb-0">Tidak ada informasi file</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Time Information -->
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-clock me-2"></i>Informasi Waktu
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong class="text-primary">Dibuat:</strong>
                        </div>
                        <div class="col-md-8">
                            <span class="text-dark">{{ $organizationStructure->created_at->format('d F Y') }}</span><br>
                            <small class="text-muted">{{ $organizationStructure->created_at->format('H:i:s') }} WIB</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong class="text-primary">Terakhir Update:</strong>
                        </div>
                        <div class="col-md-8">
                            <span class="text-dark">{{ $organizationStructure->updated_at->format('d F Y') }}</span><br>
                            <small class="text-muted">{{ $organizationStructure->updated_at->format('H:i:s') }} WIB</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong class="text-primary">Status:</strong>
                        </div>
                        <div class="col-md-8">
                            @if($organizationStructure->photo)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-warning">Tidak ada bagan</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-card mt-4">
                <div class="card-header">
                    <i class="fas fa-cog me-2"></i>Aksi Cepat
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('organization-structure.edit', $organizationStructure) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Struktur
                        </a>
                        @if($organizationStructure->photo)
                        {{-- BEFORE: Storage::url() --}}
                        {{-- <a href="{{ Storage::url($organizationStructure->photo) }}" target="_blank" class="btn btn-info"> --}}
                        {{-- <a href="{{ Storage::url($organizationStructure->photo) }}" download class="btn btn-success"> --}}

                        {{-- AFTER: StorageHelper --}}
                        <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($organizationStructure->photo) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Full Size
                        </a>
                        <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($organizationStructure->photo) }}" download class="btn btn-success">
                            <i class="fas fa-download me-2"></i>Unduh Bagan
                        </a>
                        @endif
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $organizationStructure->id }})">
                            <i class="fas fa-trash me-2"></i>Hapus Struktur
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($organizationStructure->photo)
    <!-- Guidelines Information -->
    <div class="dashboard-card mt-4">
        <div class="card-header">
            <i class="fas fa-lightbulb me-2"></i>Panduan Struktur Organisasi
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-primary">Tips untuk Bagan yang Efektif:</h6>
                    <ul>
                        <li>Hierarki yang jelas dari atas ke bawah</li>
                        <li>Nama posisi dan departemen mudah dibaca</li>
                        <li>Garis penghubung yang jelas antar posisi</li>
                        <li>Warna yang kontras dan professional</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6 class="text-primary">Spesifikasi Teknis:</h6>
                    <ul>
                        <li>Resolusi minimal: 1200px lebar</li>
                        <li>Format: JPG, PNG, GIF</li>
                        <li>Ukuran maksimal: 5MB</li>
                        <li>Font yang mudah dibaca</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus struktur organisasi ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus bagan struktur organisasi yang terkait.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/organization-structure/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush