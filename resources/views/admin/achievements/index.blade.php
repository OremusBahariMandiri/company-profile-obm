@extends('layouts.admin.app')

@section('title', 'Kelola Achievement')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-trophy me-2"></i>
            Kelola Achievement
        </h2>
        @if($canAdd)
        <a href="{{ route('achievements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Achievement
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
            Maksimal 3 achievement sudah tercapai. Hapus salah satu untuk menambah yang baru.
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Achievement
        </div>
        <div class="card-body">
            @if($achievements->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">Photo</th>
                                <th width="15%">Achievement 1</th>
                                <th width="15%">Achievement 2</th>
                                <th width="15%">Achievement 3</th>
                                <th width="15%">Achievement 4</th>
                                <th width="10%" class="text-center">Dibuat</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($achievements as $index => $achievement)
                            <tr>
                                <td>
                                    @if($achievement->photo_1)
                                        <img src="{{ Storage::url($achievement->photo_1) }}" alt="Achievement Photo"
                                             class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px; border-radius: 8px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="{{ $achievement->icon_title_1 }} text-primary me-2"></i>
                                        <small class="text-muted">{{ $achievement->icon_title_1 }}</small>
                                    </div>
                                    <strong>{{ Str::limit($achievement->title_1, 20) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($achievement->description_1, 30) }}</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="{{ $achievement->icon_title_2 }} text-success me-2"></i>
                                        <small class="text-muted">{{ $achievement->icon_title_2 }}</small>
                                    </div>
                                    <strong>{{ Str::limit($achievement->title_2, 20) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($achievement->description_2, 30) }}</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="{{ $achievement->icon_title_3 }} text-warning me-2"></i>
                                        <small class="text-muted">{{ $achievement->icon_title_3 }}</small>
                                    </div>
                                    <strong>{{ Str::limit($achievement->title_3, 20) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($achievement->description_3, 30) }}</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="{{ $achievement->icon_title_4 }} text-info me-2"></i>
                                        <small class="text-muted">{{ $achievement->icon_title_4 }}</small>
                                    </div>
                                    <strong>{{ Str::limit($achievement->title_4, 20) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($achievement->description_4, 30) }}</small>
                                </td>
                                <td class="text-center">
                                    <small class="text-muted">
                                        {{ $achievement->created_at->format('d/m/Y') }}<br>
                                        {{ $achievement->created_at->format('H:i') }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('achievements.show', $achievement) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('achievements.edit', $achievement) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $achievement->id }})" title="Hapus">
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
                    <i class="fas fa-trophy text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada achievement</h4>
                    <p class="text-muted">Klik tombol "Tambah Achievement" untuk menambah achievement pertama.</p>
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
                <p>Apakah Anda yakin ingin menghapus achievement ini?</p>
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
    deleteForm.action = `/admin/achievements/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush