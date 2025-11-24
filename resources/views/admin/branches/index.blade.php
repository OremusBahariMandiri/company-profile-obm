@extends('layouts.admin.app')

@section('title', 'Kelola Kantor & Cabang')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-building me-2"></i>
            Kelola Kantor & Cabang
        </h2>
        <a href="{{ route('branches.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Kantor
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
                    <h4>{{ $branches->count() }}</h4>
                    <p class="mb-0">Total Kantor</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-home fa-2x mb-2"></i>
                    <h4>{{ $branches->where('status', 'main_office')->count() }}</h4>
                    <p class="mb-0">Kantor Pusat</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-code-branch fa-2x mb-2"></i>
                    <h4>{{ $branches->where('status', 'branch')->count() }}</h4>
                    <p class="mb-0">Kantor Cabang</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-2x mb-2"></i>
                    <h4>{{ $branches->where('created_at', '>=', now()->startOfMonth())->count() }}</h4>
                    <p class="mb-0">Baru Bulan Ini</p>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Kantor & Cabang
        </div>
        <div class="card-body">
            @if($branches->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="20%">Nama Kantor</th>
                                <th width="30%">Alamat</th>
                                <th width="15%">PIC</th>
                                <th width="15%">Kontak</th>
                                <th width="10%">Status</th>
                                <th width="5%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $index => $branch)
                            <tr class="{{ $branch->status === 'main_office' ? 'table-success' : '' }}">
                                <td>
                                    @if($branch->status === 'main_office')
                                        <i class="fas fa-star text-warning" title="Kantor Pusat"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $branch->branch_name }}</strong>
                                    @if($branch->status === 'main_office')
                                        <i class="fas fa-home text-primary ms-1" title="Kantor Pusat"></i>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($branch->address, 80) }}</small>
                                </td>
                                <td>
                                    <i class="fas fa-user me-1"></i>{{ $branch->pic }}
                                </td>
                                <td>
                                    <small>
                                        <i class="fas fa-phone text-success me-1"></i>{{ $branch->mobile_phone_number }}<br>
                                        <i class="fas fa-envelope text-primary me-1"></i>{{ $branch->email_1 }}
                                    </small>
                                </td>
                                <td>
                                    @if($branch->status === 'main_office')
                                        <span class="badge bg-success">Kantor Pusat</span>
                                    @else
                                        <span class="badge bg-info">Kantor Cabang</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('branches.show', $branch) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('branches.edit', $branch) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $branch->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Information Alert -->
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Informasi:</strong>
                    <ul class="mb-0 mt-2">
                        <li>Kantor Pusat akan ditampilkan di bagian utama website dengan foto kantor</li>
                        <li>Kantor Cabang akan ditampilkan dalam bentuk card di bagian bawah</li>
                        <li>Hanya boleh ada satu Kantor Pusat dalam sistem</li>
                    </ul>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-building text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada data kantor</h4>
                    <p class="text-muted">Klik tombol "Tambah Kantor" untuk menambah kantor pusat atau cabang.</p>
                    <a href="{{ route('branches.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Kantor
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
                <p>Apakah Anda yakin ingin menghapus data kantor ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghilangkan kantor dari tampilan website.</p>
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
    deleteForm.action = `/admin/branches/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush