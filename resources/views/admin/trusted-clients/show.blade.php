@extends('layouts.admin.app')

@section('title', 'Detail Logo Klien')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Logo Klien
        </h2>
        <div class="btn-group">
            <a href="{{ route('trusted-clients.edit', $trustedClient) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $trustedClient->id }})">
                <i class="fas fa-trash me-2"></i>Hapus
            </button>
            <a href="{{ route('trusted-clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Logo Display -->
        <div class="col-lg-8 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-image me-2"></i>Logo Klien
                </div>
                <div class="card-body">
                    @if($trustedClient->photo)
                        <div class="logo-display-container">
                            <div class="main-logo-display">
                                <img src="{{ Storage::url($trustedClient->photo) }}" alt="Client Logo"
                                     class="main-logo-img" id="mainLogo">
                            </div>

                            <!-- Logo Controls -->
                            <div class="logo-controls mt-3">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="toggleFilter('none')">
                                        <i class="fas fa-palette me-1"></i>Original
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary active" onclick="toggleFilter('grayscale')">
                                        <i class="fas fa-adjust me-1"></i>Grayscale
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-info" onclick="zoomLogo()">
                                        <i class="fas fa-search-plus me-1"></i>Zoom
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Logo ditampilkan dengan filter grayscale di website
                                    </small>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="no-logo-display">
                            <i class="fas fa-image fa-5x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada logo</h5>
                            <p class="text-muted">Logo belum diupload untuk klien ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Information Panel -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi Detail
                </div>
                <div class="card-body">
                    <div class="info-group mb-3">
                        <label class="info-label">ID Klien:</label>
                        <div class="info-value">
                            <span class="badge bg-primary">#{{ $trustedClient->id }}</span>
                        </div>
                    </div>

                    <div class="info-group mb-3">
                        <label class="info-label">Tanggal Upload:</label>
                        <div class="info-value">
                            {{ $trustedClient->created_at->format('d F Y') }}<br>
                            <small class="text-muted">{{ $trustedClient->created_at->format('H:i') }} WIB</small>
                        </div>
                    </div>

                    <div class="info-group mb-3">
                        <label class="info-label">Terakhir Update:</label>
                        <div class="info-value">
                            {{ $trustedClient->updated_at->format('d F Y') }}<br>
                            <small class="text-muted">{{ $trustedClient->updated_at->format('H:i') }} WIB</small>
                        </div>
                    </div>

                    @if($trustedClient->photo)
                        @php
                            $imagePath = Storage::disk('public')->path($trustedClient->photo);
                            $fileExists = file_exists($imagePath);
                            $fileSize = $fileExists ? filesize($imagePath) : 0;
                            $imageInfo = $fileExists ? @getimagesize(Storage::disk('public')->url($trustedClient->photo)) : null;
                        @endphp

                        @if($imageInfo)
                            <div class="info-group mb-3">
                                <label class="info-label">Dimensi:</label>
                                <div class="info-value">
                                    {{ $imageInfo[0] }} x {{ $imageInfo[1] }} pixel
                                    <br><small class="text-muted">Rasio: {{ number_format($imageInfo[0] / $imageInfo[1], 2) }}:1</small>
                                </div>
                            </div>

                            <div class="info-group mb-3">
                                <label class="info-label">Format:</label>
                                <div class="info-value">
                                    @php
                                        $mimeType = $imageInfo['mime'] ?? '';
                                        $format = '';
                                        switch($mimeType) {
                                            case 'image/jpeg': $format = 'JPEG'; break;
                                            case 'image/png': $format = 'PNG'; break;
                                            case 'image/gif': $format = 'GIF'; break;
                                            case 'image/svg+xml': $format = 'SVG'; break;
                                            default: $format = 'Unknown';
                                        }
                                    @endphp
                                    <span class="badge bg-info">{{ $format }}</span>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Website Preview -->
    <div class="row">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-desktop me-2"></i>Preview Website
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Bagaimana logo ini akan tampil di halaman website:</h6>

                    <div class="website-simulation">
                        <div class="clients-section-preview">
                            <h5 class="text-center mb-4 text-primary">Our Trusted Clients</h5>

                            <div class="clients-grid-preview">
                                <!-- Current logo -->
                                <div class="client-item-preview featured">
                                    @if($trustedClient->photo)
                                        <div class="client-logo-preview">
                                            <img src="{{ Storage::url($trustedClient->photo) }}" alt="Current Logo">
                                        </div>
                                    @else
                                        <div class="client-logo-preview no-image">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                    <div class="featured-badge">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>

                                <!-- Sample logos -->
                                <div class="client-item-preview">
                                    <div class="client-logo-preview">
                                        <img src="{{ asset('images/clients/1.png') }}" alt="Sample">
                                    </div>
                                </div>
                                <div class="client-item-preview">
                                    <div class="client-logo-preview">
                                        <img src="{{ asset('images/clients/2.png') }}" alt="Sample">
                                    </div>
                                </div>
                                <div class="client-item-preview">
                                    <div class="client-logo-preview">
                                        <img src="{{ asset('images/clients/3.png') }}" alt="Sample">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Zoom Modal -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-search-plus me-2"></i>Logo Preview
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                @if($trustedClient->photo)
                    <img src="{{ Storage::url($trustedClient->photo) }}" alt="Logo Zoom"
                         class="img-fluid" style="max-height: 70vh;">
                @endif
            </div>
        </div>
    </div>
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
                <p>Apakah Anda yakin ingin menghapus logo klien ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus file gambar yang terkait.</p>
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

@push('styles')
<style>
.logo-display-container {
    text-align: center;
}

.main-logo-display {
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 1rem;
}

.main-logo-img {
    max-width: 100%;
    max-height: 300px;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: all 0.3s ease;
    border-radius: 10px;
    background: white;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.logo-controls .btn.active {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
    color: white;
}

.no-logo-display {
    text-align: center;
    padding: 3rem 2rem;
    color: #6c757d;
}

.info-group {
    border-bottom: 1px solid #e3e6f0;
    padding-bottom: 0.75rem;
}

.info-label {
    font-weight: 600;
    color: #495057;
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
    display: block;
}

.info-value {
    color: #212529;
}

.website-simulation {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid #dee2e6;
}

.clients-section-preview {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.clients-grid-preview {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.client-item-preview {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.client-item-preview:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.client-item-preview.featured {
    border: 2px solid var(--bs-primary);
    box-shadow: 0 5px 20px rgba(13, 110, 253, 0.2);
}

.client-logo-preview {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.client-logo-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: filter 0.3s ease;
}

.client-item-preview:hover .client-logo-preview img {
    filter: grayscale(0%) opacity(1);
}

.client-logo-preview.no-image {
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    color: #6c757d;
    font-size: 1.5rem;
}

.featured-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--bs-primary);
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
}

@media (max-width: 768px) {
    .clients-grid-preview {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.8rem;
    }

    .main-logo-display {
        padding: 1rem;
    }

    .website-simulation {
        padding: 1rem;
    }

    .clients-section-preview {
        padding: 1rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
function toggleFilter(type) {
    const logo = document.getElementById('mainLogo');
    const buttons = document.querySelectorAll('.logo-controls .btn');

    // Remove active class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));

    if (type === 'none') {
        logo.style.filter = 'none';
        buttons[0].classList.add('active');
    } else if (type === 'grayscale') {
        logo.style.filter = 'grayscale(100%) opacity(0.7)';
        buttons[1].classList.add('active');
    }
}

function zoomLogo() {
    const modal = new bootstrap.Modal(document.getElementById('zoomModal'));
    modal.show();
}

function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/trusted-clients/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush