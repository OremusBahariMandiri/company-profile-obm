@extends('layouts.admin.app')

@section('title', 'Kelola Layanan')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-cogs me-2"></i>
            Kelola Layanan
        </h2>
        <a href="{{ route('services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Layanan ({{ $services->count() }} layanan)
        </div>
        <div class="card-body">
            @if($services->count() > 0)
                <!-- Grid View for Services -->
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="card service-card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <!-- Service Icon -->
                                <div class="service-icon mb-3">
                                    <i class="fas {{ $service->icon }} text-{{ $service->color }}" style="font-size: 3rem;"></i>
                                </div>

                                <!-- Service Name -->
                                <h5 class="card-title text-primary mb-3">{{ $service->name }}</h5>

                                <!-- Service Description -->
                                <p class="card-text text-muted small">
                                    {{ Str::limit($service->description, 120) }}
                                </p>
                            </div>

                            <!-- Card Footer with Actions -->
                            <div class="card-footer bg-transparent border-top">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('services.show', $service) }}"
                                       class="btn btn-sm btn-info" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('services.edit', $service) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $service->id }})" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <!-- Service Meta Info -->
                                <div class="text-center mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $service->updated_at->format('d/m/Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Table View (Alternative) - Hidden by default -->
                <div class="table-view d-none">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="10%" class="text-center">Icon</th>
                                    <th width="25%">Nama Layanan</th>
                                    <th width="45%">Deskripsi</th>
                                    <th width="10%">Terakhir Update</th>
                                    <th width="5%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        <i class="fas {{ $service->icon }} text-{{ $service->color }}" style="font-size: 1.5rem;"></i>
                                    </td>
                                    <td>
                                        <strong class="text-primary">{{ $service->name }}</strong>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ Str::limit($service->description, 100) }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $service->updated_at->format('d/m/Y H:i') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('services.show', $service) }}"
                                               class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('services.edit', $service) }}"
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{ $service->id }})" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- View Toggle Buttons -->
                <div class="d-flex justify-content-end mt-3">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary btn-sm active" id="gridViewBtn">
                            <i class="fas fa-th me-1"></i>Grid
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-sm" id="tableViewBtn">
                            <i class="fas fa-table me-1"></i>Table
                        </button>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-cogs text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada layanan</h4>
                    <p class="text-muted">Klik tombol "Tambah Layanan" untuk menambah layanan pertama.</p>
                    <a href="{{ route('services.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Layanan Pertama
                    </a>
                </div>
            @endif
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
                <p>Apakah Anda yakin ingin menghapus layanan ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan layanan akan dihapus dari website.</p>
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
.service-card {
    transition: all 0.3s ease;
    border: 1px solid #e3f2fd;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(26, 75, 120, 0.15) !important;
}

.service-icon {
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
    border-radius: 50%;
    width: 80px;
    margin: 0 auto;
    border: 2px solid #1a4b78;
}

.card-title {
    font-weight: 600;
    font-size: 1.1rem;
}

.btn-group .btn.active {
    background-color: #1a4b78;
    border-color: #1a4b78;
    color: white;
}
</style>
@endpush

@push('scripts')
<script>
function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/services/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// View toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const gridViewBtn = document.getElementById('gridViewBtn');
    const tableViewBtn = document.getElementById('tableViewBtn');
    const gridView = document.querySelector('.row');
    const tableView = document.querySelector('.table-view');

    if (gridViewBtn && tableViewBtn && gridView && tableView) {
        gridViewBtn.addEventListener('click', function() {
            gridView.classList.remove('d-none');
            tableView.classList.add('d-none');
            gridViewBtn.classList.add('active');
            tableViewBtn.classList.remove('active');
        });

        tableViewBtn.addEventListener('click', function() {
            gridView.classList.add('d-none');
            tableView.classList.remove('d-none');
            tableViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });
    }
});
</script>
@endpush