@extends('layouts.admin.app')

@section('title', 'Detail Sertifikat')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Sertifikat
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('certification.edit', $certification) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('certification.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Certificate Photo -->
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-image me-2"></i>Foto Sertifikat
                </div>
                <div class="card-body text-center">
                    @if($certification->photo)
                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($certification->photo) }}" alt="Certificate Photo"
                             class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <div class="text-center">
                                <i class="fas fa-certificate text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2">Tidak ada foto</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Certificate Information -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi Sertifikat
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Judul:</strong>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-dark mb-0">{{ $certification->title }}</h4>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Deskripsi:</strong>
                        </div>
                        <div class="col-md-9">
                            <div class="text-muted" style="white-space: pre-line; line-height: 1.6;">{{ $certification->description }}</div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <strong class="text-primary">Informasi Waktu:</strong>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-plus me-1"></i>
                                        Dibuat: {{ $certification->created_at->format('d F Y, H:i') }}
                                    </small>
                                </div>
                                <div class="col-12">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-edit me-1"></i>
                                        Terakhir diupdate: {{ $certification->updated_at->format('d F Y, H:i') }}
                                    </small>
                                </div>
                            </div>
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
                        <a href="{{ route('certification.edit', $certification) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Sertifikat
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $certification->id }})">
                            <i class="fas fa-trash me-2"></i>Hapus Sertifikat
                        </button>
                        @if($certification->photo)
                        <a href="{{ Storage::url($certification->photo) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-download me-2"></i>Unduh Foto
                        </a>
                        @endif
                    </div>
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
                <p>Apakah Anda yakin ingin menghapus sertifikat "<strong>{{ $certification->title }}</strong>"?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus foto sertifikat yang terkait.</p>
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
    deleteForm.action = `/certification/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush