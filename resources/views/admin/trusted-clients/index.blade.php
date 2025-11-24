@extends('layouts.admin.app')

@section('title', 'Kelola Logo Klien')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-building me-2"></i>
            Kelola Logo Klien
        </h2>
        <a href="{{ route('trusted-clients.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Logo
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

    <!-- Statistics Card -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-building fa-2x mb-2"></i>
                    <h4>{{ $trustedClients->count() }}</h4>
                    <p class="mb-0">Total Logo Klien</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-upload fa-2x mb-2"></i>
                    <h4>{{ $trustedClients->where('created_at', '>=', now()->startOfMonth())->count() }}</h4>
                    <p class="mb-0">Upload Bulan Ini</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-calendar fa-2x mb-2"></i>
                    <h4>{{ $trustedClients->where('created_at', '>=', now()->startOfWeek())->count() }}</h4>
                    <p class="mb-0">Upload Minggu Ini</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-2x mb-2"></i>
                    <h4>{{ $trustedClients->where('created_at', '>=', now()->startOfDay())->count() }}</h4>
                    <p class="mb-0">Upload Hari Ini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Logo Klien
        </div>
        <div class="card-body">
            @if($trustedClients->count() > 0)
                <div class="row">
                    @foreach($trustedClients as $client)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                        <div class="client-card">
                            <div class="client-card-header">
                                <div class="client-id">
                                    <small class="text-muted">{{ $loop->iteration }}</small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('trusted-clients.show', $client) }}">
                                                <i class="fas fa-eye me-2"></i>Lihat
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('trusted-clients.edit', $client) }}">
                                                <i class="fas fa-edit me-2"></i>Edit
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#"
                                               onclick="confirmDelete({{ $client->id }})">
                                                <i class="fas fa-trash me-2"></i>Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="client-logo">
                                @if($client->photo)
                                    <img src="{{ Storage::url($client->photo) }}" alt="Client Logo"
                                         class="client-img">
                                @else
                                    <div class="no-image">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="client-info">
                                <small class="text-muted">{{ $client->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-building text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada logo klien</h4>
                    <p class="text-muted">Klik tombol "Tambah Logo" untuk menambah logo klien pertama.</p>
                    <a href="{{ route('trusted-clients.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Logo Klien
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
.client-card {
    background: white;
    border: 1px solid #e3e6f0;
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    height: 200px;
    display: flex;
    flex-direction: column;
}

.client-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    border-color: var(--bs-primary);
}

.client-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.client-logo {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
}

.client-img {
    max-width: 100%;
    max-height: 100px;
    object-fit: contain;
    filter: grayscale(20%);
    transition: filter 0.3s ease;
}

.client-card:hover .client-img {
    filter: grayscale(0%);
}

.no-image {
    width: 80px;
    height: 80px;
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 1.5rem;
}

.client-info {
    text-align: center;
    margin-top: auto;
}

.client-id {
    font-weight: 600;
}
</style>
@endpush

@push('scripts')
<script>
function confirmDelete(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/trusted-clients/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush