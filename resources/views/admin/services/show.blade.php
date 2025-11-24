@extends('layouts.admin.app')

@section('title', 'Detail Layanan')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Layanan
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Service Details -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-info-circle me-2"></i>Informasi Layanan
                </div>
                <div class="card-body">
                    <!-- Service Header -->
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="service-icon-large">
                                <i class="fas {{ $service->icon }} text-{{ $service->color }}"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="text-primary mb-1">{{ $service->name }}</h3>
                            <p class="text-muted mb-0">
                                <i class="fas fa-tag me-1"></i>
                                Layanan Maritime Services
                            </p>
                        </div>
                    </div>

                    <!-- Service Description -->
                    <div class="mb-4">
                        <h5 class="text-secondary border-bottom pb-2">
                            <i class="fas fa-align-left me-2"></i>Deskripsi Layanan
                        </h5>
                        <div class="service-description">
                            <p style="text-align: justify; line-height: 1.8; font-size: 1rem; color: #495057;">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Service Statistics -->
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="stat-card bg-light p-3 rounded">
                                <i class="fas fa-font text-primary mb-2" style="font-size: 1.5rem;"></i>
                                <h4 class="text-primary mb-1">{{ strlen($service->description) }}</h4>
                                <small class="text-muted">Karakter Deskripsi</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-light p-3 rounded">
                                <i class="fas fa-calendar-plus text-success mb-2" style="font-size: 1.5rem;"></i>
                                <h4 class="text-success mb-1">{{ $service->created_at->format('d/m/Y') }}</h4>
                                <small class="text-muted">Tanggal Dibuat</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-light p-3 rounded">
                                <i class="fas fa-edit text-warning mb-2" style="font-size: 1.5rem;"></i>
                                <h4 class="text-warning mb-1">{{ $service->updated_at->format('d/m/Y') }}</h4>
                                <small class="text-muted">Terakhir Update</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Actions -->
            <div class="dashboard-card mt-4">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-tools me-2"></i>Aksi Layanan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-secondary">Aksi Tersedia:</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('services.edit', $service) }}" class="text-decoration-none">
                                        <i class="fas fa-edit text-warning me-2"></i>Edit Layanan
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <button type="button" class="btn btn-link p-0 text-decoration-none text-danger"
                                            onclick="confirmDelete({{ $service->id }})">
                                        <i class="fas fa-trash text-danger me-2"></i>Hapus Layanan
                                    </button>
                                </li>
                                <li class="mb-2">
                                    <a href="/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-external-link-alt text-info me-2"></i>Lihat di Website
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-secondary">Informasi Teknis:</h6>
                            <ul class="list-unstyled small text-muted">
                                <li><strong>ID:</strong> {{ $service->id }}</li>
                                <li><strong>Icon Class:</strong> {{ $service->icon }}</li>
                                <li><strong>Color:</strong> {{ $service->color }}</li>
                                <li><strong>Created:</strong> {{ $service->created_at->format('Y-m-d H:i:s') }}</li>
                                <li><strong>Updated:</strong> {{ $service->updated_at->format('Y-m-d H:i:s') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview & Related -->
        <div class="col-lg-4">
            <!-- Website Preview -->
            <div class="dashboard-card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-globe me-2"></i>Preview Website
                </div>
                <div class="card-body text-center">
                    <!-- Website Style Preview -->
                    <div class="website-preview p-4 bg-light rounded">
                        <div class="service-icon-preview mb-3">
                            <i class="fas {{ $service->icon }} text-{{ $service->color }}" style="font-size: 2.5rem;"></i>
                        </div>
                        <h6 class="text-primary mb-3">{{ $service->name }}</h6>
                        <p class="small text-muted">
                            {{ Str::limit($service->description, 100) }}
                        </p>
                    </div>

                    <hr>

                    <a href="/" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-1"></i>
                        Lihat di Website
                    </a>
                </div>
            </div>

            <!-- Icon Information -->
            <div class="dashboard-card mt-4">
                <div class="card-header bg-secondary text-white">
                    <i class="fas fa-info me-2"></i>Informasi Icon
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="icon-display p-4 bg-light rounded">
                            <i class="fas {{ $service->icon }} text-{{ $service->color }}" style="font-size: 4rem;"></i>
                        </div>
                    </div>

                    <div class="icon-details">
                        <p class="mb-2">
                            <strong>Kelas CSS:</strong><br>
                            <code>fas {{ $service->icon }}</code>
                        </p>
                        <p class="mb-2">
                            <strong>Kategori:</strong><br>
                            @if(Str::contains($service->icon, ['ship', 'anchor', 'compass', 'water']))
                                <span class="badge bg-primary">Maritime & Shipping</span>
                            @elseif(Str::contains($service->icon, ['box', 'truck', 'dolly', 'pallet']))
                                <span class="badge bg-success">Logistics & Supply</span>
                            @elseif(Str::contains($service->icon, ['ambulance', 'heartbeat', 'hospital', 'first-aid', 'user-md']))
                                <span class="badge bg-danger">Medical & Emergency</span>
                            @elseif(Str::contains($service->icon, ['users', 'user-tie', 'hard-hat', 'id-card']))
                                <span class="badge bg-warning">Crew & People</span>
                            @else
                                <span class="badge bg-secondary">General</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="dashboard-card mt-4">
                <div class="card-header bg-dark text-white">
                    <i class="fas fa-chart-bar me-2"></i>Statistik Cepat
                </div>
                <div class="card-body">
                    <div class="quick-stats">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Panjang Nama:</span>
                            <span class="badge bg-primary">{{ strlen($service->name) }} karakter</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Kata dalam Deskripsi:</span>
                            <span class="badge bg-success">{{ str_word_count($service->description) }} kata</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Umur Data:</span>
                            <span class="badge bg-info">{{ $service->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Update Terakhir:</span>
                            <span class="badge bg-warning">{{ $service->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
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
                <div class="text-center mb-3">
                    <i class="fas {{ $service->icon }} text-muted" style="font-size: 3rem;"></i>
                    <h5 class="mt-2">{{ $service->name }}</h5>
                </div>
                <p>Apakah Anda yakin ingin menghapus layanan ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan layanan akan dihapus dari website.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus Layanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.service-icon-large {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #1a4b78;
    font-size: 2rem;
}

.service-icon-preview {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border: 2px solid #1a4b78;
}

.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.service-description {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #1a4b78;
}

.website-preview {
    background: #ffffff !important;
    border: 1px solid #e9ecef;
}

.icon-display {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}

.quick-stats {
    font-size: 0.9rem;
}

.card-header.bg-primary {
    background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%) !important;
}

.card-header.bg-info {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
}

.card-header.bg-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.card-header.bg-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%) !important;
}

.card-header.bg-dark {
    background: linear-gradient(135deg, #343a40 0%, #212529 100%) !important;
}
</style>
@endpush

@push('scripts')
<script>
function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/services/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush