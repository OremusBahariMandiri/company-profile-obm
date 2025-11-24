@extends('layouts.admin.app')

@section('title', 'Detail Konfigurasi Tim')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Konfigurasi Tim
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('our-team.edit', $ourTeam) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('our-team.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Team Photo 1 (Main Team) -->
    <div class="dashboard-card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-star me-2"></i>Tim Utama
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    @if($ourTeam->photo_1)
                        <img src="{{ Storage::url($ourTeam->photo_1) }}" alt="Team Photo 1"
                             class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <div class="text-center">
                                <i class="fas fa-users text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2">Tidak ada foto</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong class="text-primary">Judul:</strong>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-dark mb-0">{{ $ourTeam->title_photo_1 }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <strong class="text-primary">Subtitle:</strong>
                        </div>
                        <div class="col-md-9">
                            <p class="text-muted mb-0">{{ $ourTeam->subtitle_photo_1 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Team Photo 2 -->
        <div class="col-lg-6">
            <div class="dashboard-card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i>Tim Kedua
                </div>
                <div class="card-body">
                    @if($ourTeam->title_photo_2 || $ourTeam->subtitle_photo_2 || $ourTeam->photo_2)
                        @if($ourTeam->photo_2)
                        <div class="text-center mb-3">
                            <img src="{{ Storage::url($ourTeam->photo_2) }}" alt="Team Photo 2"
                                 class="img-fluid rounded shadow" style="max-width: 100%; max-height: 200px; object-fit: cover;">
                        </div>
                        @endif

                        @if($ourTeam->title_photo_2)
                        <div class="row mb-2">
                            <div class="col-4">
                                <strong class="text-primary">Judul:</strong>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ $ourTeam->title_photo_2 }}</span>
                            </div>
                        </div>
                        @endif

                        @if($ourTeam->subtitle_photo_2)
                        <div class="row">
                            <div class="col-4">
                                <strong class="text-primary">Subtitle:</strong>
                            </div>
                            <div class="col-8">
                                <span class="text-muted">{{ $ourTeam->subtitle_photo_2 }}</span>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-users text-muted" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2 mb-0">Tim kedua belum diatur</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Team Photo 3 -->
        <div class="col-lg-6">
            <div class="dashboard-card mb-4">
                <div class="card-header">
                    <i class="fas fa-user-friends me-2"></i>Tim Ketiga
                </div>
                <div class="card-body">
                    @if($ourTeam->title_photo_3 || $ourTeam->subtitle_photo_3 || $ourTeam->photo_3)
                        @if($ourTeam->photo_3)
                        <div class="text-center mb-3">
                            <img src="{{ Storage::url($ourTeam->photo_3) }}" alt="Team Photo 3"
                                 class="img-fluid rounded shadow" style="max-width: 100%; max-height: 200px; object-fit: cover;">
                        </div>
                        @endif

                        @if($ourTeam->title_photo_3)
                        <div class="row mb-2">
                            <div class="col-4">
                                <strong class="text-primary">Judul:</strong>
                            </div>
                            <div class="col-8">
                                <span class="text-dark">{{ $ourTeam->title_photo_3 }}</span>
                            </div>
                        </div>
                        @endif

                        @if($ourTeam->subtitle_photo_3)
                        <div class="row">
                            <div class="col-4">
                                <strong class="text-primary">Subtitle:</strong>
                            </div>
                            <div class="col-8">
                                <span class="text-muted">{{ $ourTeam->subtitle_photo_3 }}</span>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-user-friends text-muted" style="font-size: 2rem;"></i>
                            <p class="text-muted mt-2 mb-0">Tim ketiga belum diatur</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-info-circle me-2"></i>Informasi Waktu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="fas fa-calendar-plus me-1"></i>
                        Dibuat: {{ $ourTeam->created_at->format('d F Y, H:i') }}
                    </small>
                </div>
                <div class="col-md-6">
                    <small class="text-muted">
                        <i class="fas fa-calendar-edit me-1"></i>
                        Terakhir diupdate: {{ $ourTeam->updated_at->format('d F Y, H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="dashboard-card mt-4">
        <div class="card-header">
            <i class="fas fa-cog me-2"></i>Aksi
        </div>
        <div class="card-body">
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('our-team.edit', $ourTeam) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-2"></i>Edit Konfigurasi
                </a>
                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $ourTeam->id }})">
                    <i class="fas fa-trash me-2"></i>Hapus Konfigurasi
                </button>
                @if($ourTeam->photo_1)
                <a href="{{ Storage::url($ourTeam->photo_1) }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-download me-2"></i>Unduh Foto Utama
                </a>
                @endif
                @if($ourTeam->photo_2)
                <a href="{{ Storage::url($ourTeam->photo_2) }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-download me-2"></i>Unduh Foto Kedua
                </a>
                @endif
                @if($ourTeam->photo_3)
                <a href="{{ Storage::url($ourTeam->photo_3) }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-download me-2"></i>Unduh Foto Ketiga
                </a>
                @endif
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