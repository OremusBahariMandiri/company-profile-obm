@extends('layouts.admin.app')

@section('title', 'Kelola Karir')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-briefcase me-2"></i>
            Kelola Karir
        </h2>
        <a href="{{ route('career.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Lowongan Karir
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
            <i class="fas fa-list me-2"></i>Daftar Lowongan Karir
        </div>
        <div class="card-body">
            @if($careers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">Foto</th>
                                <th width="20%">Nama Karir</th>
                                <th width="15%">Posisi</th>
                                <th width="15%">Area Kerja</th>
                                <th width="10%">Periode</th>
                                <th width="10%">Status</th>
                                <th width="10%">Update</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careers as $career)
                            <tr>
                                <td>
                                    @if($career->photo)
                                        <img src="{{ Storage::url($career->photo) }}" alt="Career Photo"
                                             class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-briefcase text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="text-primary">{{ $career->careers_name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($career->description, 50) }}</small>
                                </td>
                                <td>
                                    <span class="text-dark">{{ $career->position }}</span>
                                </td>
                                <td>
                                    <span class="text-dark">{{ $career->working_area }}</span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($career->start_date)->format('d/m/Y') }}
                                        @if($career->end_date)
                                            <br>s/d {{ \Carbon\Carbon::parse($career->end_date)->format('d/m/Y') }}
                                        @else
                                            <br><span class="text-success">Terbuka</span>
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($career->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($career->status == 'inactive')
                                        <span class="badge bg-warning">Tidak Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tutup</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $career->updated_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('career.show', $career) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('career.edit', $career) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $career->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-briefcase text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada lowongan karir</h4>
                    <p class="text-muted">Klik tombol "Tambah Lowongan Karir" untuk menambah lowongan pekerjaan baru.</p>
                    <a href="{{ route('career.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Lowongan Karir
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
                <p>Apakah Anda yakin ingin menghapus lowongan karir ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus foto yang terkait.</p>
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
    deleteForm.action = `/career/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush