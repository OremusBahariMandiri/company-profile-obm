@extends('layouts.admin.app')

@section('title', 'Detail Lowongan Karir')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Lowongan Karir
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('career.edit', $career) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('career.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Career Photo -->
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-image me-2"></i>Foto Karir
                </div>
                <div class="card-body text-center">
                    @if($career->photo)
                        {{-- BEFORE: Storage::url() --}}
                        {{-- <img src="{{ Storage::url($career->photo) }}" alt="Career Photo" --}}

                        {{-- AFTER: StorageHelper --}}
                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($career->photo) }}" alt="Career Photo"
                             class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <div class="text-center">
                                <i class="fas fa-briefcase text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2">Tidak ada foto</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Status and Dates -->
            <div class="dashboard-card mt-4">
                <div class="card-header">
                    <i class="fas fa-calendar me-2"></i>Status & Periode
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-5">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-7">
                            @if($career->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($career->status == 'inactive')
                                <span class="badge bg-warning">Tidak Aktif</span>
                            @else
                                <span class="badge bg-danger">Tutup</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <strong>Mulai:</strong>
                        </div>
                        <div class="col-7">
                            {{ \Carbon\Carbon::parse($career->start_date)->format('d F Y') }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <strong>Berakhir:</strong>
                        </div>
                        <div class="col-7">
                            @if($career->end_date)
                                {{ \Carbon\Carbon::parse($career->end_date)->format('d F Y') }}
                            @else
                                <span class="text-success">Terbuka</span>
                            @endif
                        </div>
                    </div>
                    @if($career->sallary)
                    <div class="row">
                        <div class="col-5">
                            <strong>Gaji:</strong>
                        </div>
                        <div class="col-7">
                            {{ $career->sallary }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Career Information -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-info-circle me-2"></i>Informasi Lowongan
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Nama Karir:</strong>
                        </div>
                        <div class="col-md-9">
                            <h4 class="text-dark mb-0">{{ $career->careers_name }}</h4>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Posisi:</strong>
                        </div>
                        <div class="col-md-9">
                            <h5 class="text-dark mb-0">{{ $career->position }}</h5>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Area Kerja:</strong>
                        </div>
                        <div class="col-md-9">
                            <span class="text-dark">{{ $career->working_area }}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Deskripsi:</strong>
                        </div>
                        <div class="col-md-9">
                            <div class="text-muted" style="white-space: pre-line; line-height: 1.6;">{{ $career->description }}</div>
                        </div>
                    </div>

                    @if($career->contact_phone || $career->contact_email)
                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <strong class="text-primary">Kontak:</strong>
                        </div>
                        <div class="col-md-9">
                            @if($career->contact_phone)
                            <div class="mb-2">
                                <i class="fas fa-phone text-primary me-2"></i>
                                {{ $career->contact_phone }}
                            </div>
                            @endif
                            @if($career->contact_email)
                            <div>
                                <i class="fas fa-envelope text-primary me-2"></i>
                                <a href="mailto:{{ $career->contact_email }}" class="text-decoration-none">{{ $career->contact_email }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <strong class="text-primary">Terakhir Update:</strong>
                        </div>
                        <div class="col-md-9">
                            <small class="text-muted">
                                <i class="fas fa-calendar-edit me-1"></i>
                                {{ $career->updated_at->format('d F Y, H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job Specifications -->
            @php
                $specifications = [];
                for($i = 1; $i <= 10; $i++) {
                    if($career->{'spesification_'.$i}) {
                        $specifications[] = $career->{'spesification_'.$i};
                    }
                }
            @endphp

            @if(count($specifications) > 0)
            <div class="dashboard-card mt-4">
                <div class="card-header">
                    <i class="fas fa-list me-2"></i>Spesifikasi Pekerjaan
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($specifications as $index => $specification)
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <span class="badge bg-primary me-2">{{ $index + 1 }}</span>
                                <span>{{ $specification }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="dashboard-card mt-4">
                <div class="card-header">
                    <i class="fas fa-cog me-2"></i>Aksi
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('career.edit', $career) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Lowongan
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $career->id }})">
                            <i class="fas fa-trash me-2"></i>Hapus Lowongan
                        </button>
                        @if($career->photo)
                        {{-- BEFORE: Storage::url() --}}
                        {{-- <a href="{{ Storage::url($career->photo) }}" target="_blank" class="btn btn-info"> --}}

                        {{-- AFTER: StorageHelper --}}
                        <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($career->photo) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-download me-2"></i>Unduh Foto
                        </a>
                        @endif
                        @if($career->contact_email)
                        <a href="mailto:{{ $career->contact_email }}" class="btn btn-success">
                            <i class="fas fa-envelope me-2"></i>Kirim Email
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
                <p>Apakah Anda yakin ingin menghapus lowongan karir "<strong>{{ $career->careers_name }}</strong>"?</p>
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