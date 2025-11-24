@extends('layouts.admin.app')

@section('title', 'Detail Kantor')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Kantor
        </h2>
        <div class="btn-group">
            <a href="{{ route('branches.edit', $branch) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $branch->id }})">
                <i class="fas fa-trash me-2"></i>Hapus
            </button>
            <a href="{{ route('branches.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Branch Information -->
        <div class="col-lg-8 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi Kantor
                </div>
                <div class="card-body">
                    <div class="branch-header mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="text-primary mb-2">
                                    @if($branch->status === 'main_office')
                                        <i class="fas fa-home me-2"></i>
                                    @else
                                        <i class="fas fa-code-branch me-2"></i>
                                    @endif
                                    {{ $branch->branch_name }}
                                </h4>
                                <span class="badge {{ $branch->status === 'main_office' ? 'bg-success' : 'bg-info' }} fs-6">
                                    {{ App\Http\Controllers\Admin\BranchController::getStatusName($branch->status) }}
                                </span>
                            </div>
                            @if($branch->status === 'main_office')
                                <div class="main-office-badge">
                                    <i class="fas fa-star text-warning fa-2x"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-section">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                </h6>
                                <p class="mb-0">{{ $branch->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-section">
                                <h6 class="text-primary mb-3">
                                    <i class="fas fa-user me-2"></i>Person in Charge (PIC)
                                </h6>
                                <p class="mb-0">{{ $branch->pic }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6 class="text-primary mb-2">
                                    <i class="fas fa-phone me-2"></i>Telepon
                                </h6>
                                <p class="mb-0">
                                    <a href="tel:{{ str_replace(['+', ' ', '-'], '', $branch->mobile_phone_number) }}"
                                       class="text-decoration-none">
                                        {{ $branch->mobile_phone_number }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6 class="text-primary mb-2">
                                    <i class="fas fa-envelope me-2"></i>Email Utama
                                </h6>
                                <p class="mb-0">
                                    <a href="mailto:{{ $branch->email_1 }}" class="text-decoration-none">
                                        {{ $branch->email_1 }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6 class="text-primary mb-2">
                                    <i class="fas fa-envelope me-2"></i>Email Kedua
                                </h6>
                                <p class="mb-0">
                                    @if($branch->email_2)
                                        <a href="mailto:{{ $branch->email_2 }}" class="text-decoration-none">
                                            {{ $branch->email_2 }}
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-clock me-2"></i>Informasi Sistem
                </div>
                <div class="card-body">
                    <div class="system-info">
                        <div class="info-item mb-3">
                            <label class="info-label">ID Kantor:</label>
                            <div class="info-value">
                                <span class="badge bg-secondary">#{{ $branch->id }}</span>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <label class="info-label">Dibuat:</label>
                            <div class="info-value">
                                {{ $branch->created_at->format('d F Y') }}<br>
                                <small class="text-muted">{{ $branch->created_at->format('H:i') }} WIB</small>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <label class="info-label">Terakhir Update:</label>
                            <div class="info-value">
                                {{ $branch->updated_at->format('d F Y') }}<br>
                                <small class="text-muted">{{ $branch->updated_at->format('H:i') }} WIB</small>
                            </div>
                        </div>

                        <div class="info-item">
                            <label class="info-label">Status:</label>
                            <div class="info-value">
                                @if($branch->status === 'main_office')
                                    <span class="badge bg-success">Aktif - Kantor Pusat</span>
                                @else
                                    <span class="badge bg-info">Aktif - Kantor Cabang</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-tools me-2"></i>Aksi Cepat
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="tel:{{ str_replace(['+', ' ', '-'], '', $branch->mobile_phone_number) }}"
                           class="btn btn-outline-success btn-sm">
                            <i class="fas fa-phone me-2"></i>Telepon {{ $branch->pic }}
                        </a>
                        <a href="mailto:{{ $branch->email_1 }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-envelope me-2"></i>Email Utama
                        </a>
                        @if($branch->email_2)
                        <a href="mailto:{{ $branch->email_2 }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-envelope me-2"></i>Email Kedua
                        </a>
                        @endif
                    </div>
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
                    <h6 class="fw-bold mb-3">Bagaimana kantor ini ditampilkan di website:</h6>

                    @if($branch->status === 'main_office')
                        <div class="alert alert-success">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-home me-2"></i>Tampilan Kantor Pusat:
                            </h6>
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="{{ asset('images/kantor.jpeg') }}" alt="Main Office"
                                                 class="img-fluid h-100 w-100" style="object-fit: cover; height: 250px;">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="p-4">
                                                <h5 class="mb-3 text-primary">
                                                    <i class="fas fa-building me-2"></i>{{ $branch->branch_name }}
                                                </h5>
                                                <div class="contact-item mb-3">
                                                    <i class="fas fa-map-marker-alt me-2 text-success"></i>
                                                    <span>{{ $branch->address }}</span>
                                                </div>
                                                <div class="contact-item mb-3">
                                                    <i class="fas fa-user me-2 text-success"></i>
                                                    <span>{{ $branch->pic }} (PIC)</span>
                                                </div>
                                                <div class="contact-item mb-3">
                                                    <i class="fas fa-phone me-2 text-success"></i>
                                                    <span>{{ $branch->mobile_phone_number }}</span>
                                                </div>
                                                <div class="contact-item mb-3">
                                                    <i class="fas fa-envelope me-2 text-success"></i>
                                                    <span>{{ $branch->email_1 }}</span>
                                                </div>
                                                @if($branch->email_2)
                                                <div class="contact-item">
                                                    <i class="fas fa-envelope me-2 text-success"></i>
                                                    <span>{{ $branch->email_2 }}</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-code-branch me-2"></i>Tampilan Kantor Cabang:
                            </h6>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="text-primary">
                                                <i class="fas fa-anchor me-2"></i>{{ $branch->branch_name }}
                                            </h6>
                                            <div class="contact-item mb-2">
                                                <i class="fas fa-map-marker-alt text-muted"></i>
                                                <small class="ms-2">{{ Str::limit($branch->address, 60) }}</small>
                                            </div>
                                            <div class="contact-item mb-2">
                                                <i class="fas fa-user text-muted"></i>
                                                <small class="ms-2">{{ $branch->pic }} (PIC)</small>
                                            </div>
                                            <div class="contact-item mb-2">
                                                <i class="fas fa-phone text-muted"></i>
                                                <small class="ms-2">{{ $branch->mobile_phone_number }}</small>
                                            </div>
                                            <div class="contact-item mb-2">
                                                <i class="fas fa-envelope text-muted"></i>
                                                <small class="ms-2">{{ $branch->email_1 }}</small>
                                            </div>
                                            @if($branch->email_2)
                                            <div class="contact-item">
                                                <i class="fas fa-envelope text-muted"></i>
                                                <small class="ms-2">{{ $branch->email_2 }}</small>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="text-center w-100">
                                        <i class="fas fa-ellipsis-h fa-2x text-muted mb-2"></i>
                                        <p class="text-muted">Akan ditampilkan bersama kantor cabang lainnya dalam grid layout</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                <p>Apakah Anda yakin ingin menghapus data kantor <strong>{{ $branch->branch_name }}</strong>?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghilangkan kantor dari tampilan website.</p>
                @if($branch->status === 'main_office')
                    <div class="alert alert-warning small">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        <strong>Perhatian:</strong> Ini adalah Kantor Pusat yang akan mempengaruhi tampilan utama website.
                    </div>
                @endif
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
.branch-header {
    border-bottom: 2px solid #e3e6f0;
}

.info-section {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    border-left: 4px solid var(--bs-primary);
}

.contact-info {
    text-align: center;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    border: 1px solid #e3e6f0;
    transition: all 0.3s ease;
}

.contact-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.system-info .info-item {
    border-bottom: 1px solid #e3e6f0;
    padding-bottom: 0.75rem;
}

.system-info .info-item:last-child {
    border-bottom: none;
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

.main-office-badge {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}
</style>
@endpush

@push('scripts')
<script>
function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/branches/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush