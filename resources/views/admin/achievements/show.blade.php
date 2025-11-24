@extends('layouts.admin.app')

@section('title', 'Detail Achievement')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-trophy me-2"></i>
            Detail Achievement
        </h2>
        <div class="btn-group" role="group">
            <a href="{{ route('achievements.edit', $achievement) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi Achievement
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Tanggal Dibuat:</strong></p>
                            <p class="text-muted">{{ $achievement->created_at->format('d F Y, H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Terakhir Diupdate:</strong></p>
                            <p class="text-muted">{{ $achievement->updated_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Achievement Items 1 & 2 -->
    <div class="row">
        <!-- Achievement 1 -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-primary text-white">
                    <i class="{{ $achievement->icon_title_1 }} me-2"></i>Achievement 1
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <i class="{{ $achievement->icon_title_1 }} text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="card-title">{{ $achievement->title_1 }}</h5>
                            <small class="text-muted">Icon: {{ $achievement->icon_title_1 }}</small>
                        </div>
                    </div>
                    <p class="card-text">{{ $achievement->description_1 }}</p>
                </div>
            </div>
        </div>

        <!-- Achievement 2 -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-success text-white">
                    <i class="{{ $achievement->icon_title_2 }} me-2"></i>Achievement 2
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                            <i class="{{ $achievement->icon_title_2 }} text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="card-title">{{ $achievement->title_2 }}</h5>
                            <small class="text-muted">Icon: {{ $achievement->icon_title_2 }}</small>
                        </div>
                    </div>
                    <p class="card-text">{{ $achievement->description_2 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo 1 Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-image me-2"></i>Foto Achievement 1
                </div>
                <div class="card-body text-center">
                    @if($achievement->photo_1)
                        <img src="{{ Storage::url($achievement->photo_1) }}" alt="Achievement Photo 1"
                             class="img-fluid rounded shadow" style="max-height: 400px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                             style="height: 200px;">
                            <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <p class="text-muted mt-2">Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Achievement Items 3 & 4 -->
    <div class="row">
        <!-- Achievement 3 -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-warning text-white">
                    <i class="{{ $achievement->icon_title_3 }} me-2"></i>Achievement 3
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                            <i class="{{ $achievement->icon_title_3 }} text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="card-title">{{ $achievement->title_3 }}</h5>
                            <small class="text-muted">Icon: {{ $achievement->icon_title_3 }}</small>
                        </div>
                    </div>
                    <p class="card-text">{{ $achievement->description_3 }}</p>
                </div>
            </div>
        </div>

        <!-- Achievement 4 -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-info text-white">
                    <i class="{{ $achievement->icon_title_4 }} me-2"></i>Achievement 4
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                            <i class="{{ $achievement->icon_title_4 }} text-info" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h5 class="card-title">{{ $achievement->title_4 }}</h5>
                            <small class="text-muted">Icon: {{ $achievement->icon_title_4 }}</small>
                        </div>
                    </div>
                    <p class="card-text">{{ $achievement->description_4 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo 2 Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-image me-2"></i>Foto Achievement 2
                </div>
                <div class="card-body text-center">
                    @if($achievement->photo_2)
                        <img src="{{ Storage::url($achievement->photo_2) }}" alt="Achievement Photo 2"
                             class="img-fluid rounded shadow" style="max-height: 400px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded"
                             style="height: 200px;">
                            <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <p class="text-muted mt-2">Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('achievements.edit', $achievement) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>Edit Achievement
                </a>
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $achievement->id }})">
                    <i class="fas fa-trash me-2"></i>Hapus Achievement
                </button>
                <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list me-2"></i>Kembali ke Daftar
                </a>
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
                <p>Apakah Anda yakin ingin menghapus achievement ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus semua foto yang terkait.</p>
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