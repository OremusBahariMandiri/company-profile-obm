@extends('layouts.admin.app')

@section('title', 'Kelola Tim Kami')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-users me-2"></i>
            Kelola Tim Kami
        </h2>
        @if($canAdd)
        <a href="{{ route('our-team.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Konfigurasi Tim
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
            Hanya boleh ada 1 konfigurasi tim. Edit yang sudah ada atau hapus untuk membuat yang baru.
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Konfigurasi Tim
        </div>
        <div class="card-body">
            @if($teams->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="15%">Foto Utama</th>
                                <th width="25%">Tim Utama</th>
                                <th width="20%">Tim Kedua</th>
                                <th width="20%">Tim Ketiga</th>
                                <th width="10%">Terakhir Update</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>
                                    @if($team->photo_1)
                                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($team->photo_1) }}" alt="Team Photo"
                                             class="rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                             style="width: 80px; height: 60px;">
                                            <i class="fas fa-users text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="text-primary">{{ $team->title_photo_1 }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($team->subtitle_photo_1, 30) }}</small>
                                </td>
                                <td>
                                    @if($team->title_photo_2)
                                        <strong>{{ Str::limit($team->title_photo_2, 20) }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($team->subtitle_photo_2, 30) }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($team->title_photo_3)
                                        <strong>{{ Str::limit($team->title_photo_3, 20) }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($team->subtitle_photo_3, 30) }}</small>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $team->updated_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('our-team.show', $team) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('our-team.edit', $team) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $team->id }})" title="Hapus">
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
                    <i class="fas fa-users text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada konfigurasi tim</h4>
                    <p class="text-muted">Klik tombol "Tambah Konfigurasi Tim" untuk menambah pengaturan tim.</p>
                    <a href="{{ route('our-team.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Konfigurasi Tim
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
                <p>Apakah Anda yakin ingin menghapus konfigurasi tim ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus semua foto tim yang terkait.</p>
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
    deleteForm.action = `/our-team/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush