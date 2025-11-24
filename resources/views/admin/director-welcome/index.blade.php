@extends('layouts.admin.app')

@section('title', 'Kelola Sambutan Direktur')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-user-tie me-2"></i>
            Kelola Sambutan Direktur
        </h2>
        @if($canAdd)
        <a href="{{ route('director-welcome.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Sambutan
        </a>
        @endif
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

    @if(!$canAdd)
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle me-2"></i>
            Hanya boleh ada 1 sambutan direktur. Edit yang sudah ada atau hapus untuk membuat yang baru.
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Sambutan Direktur
        </div>
        <div class="card-body">
            @if($directorWelcomes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">Foto</th>
                                <th width="20%">Nama Direktur</th>
                                <th width="25%">Judul Highlight</th>
                                <th width="30%">Konten Preview</th>
                                <th width="10%">Terakhir Update</th>
                                <th width="5%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($directorWelcomes as $welcome)
                            <tr>
                                <td>
                                    @if($welcome->director_photo)
                                        <img src="{{ Storage::url($welcome->director_photo) }}" alt="Director Photo"
                                             class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $welcome->director_name }}</strong>
                                </td>
                                <td>
                                    <span class="text-primary fw-bold">{{ Str::limit($welcome->title_highlight, 40) }}</span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($welcome->content_1, 100) }}</small>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $welcome->updated_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('director-welcome.show', $welcome) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('director-welcome.edit', $welcome) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $welcome->id }})" title="Hapus">
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
                    <i class="fas fa-user-tie text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada sambutan direktur</h4>
                    <p class="text-muted">Klik tombol "Tambah Sambutan" untuk menambah sambutan direktur.</p>
                    <a href="{{ route('director-welcome.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Sambutan Direktur
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
                <p>Apakah Anda yakin ingin menghapus sambutan direktur ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus foto direktur yang terkait.</p>
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
    deleteForm.action = `/director-welcome/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush