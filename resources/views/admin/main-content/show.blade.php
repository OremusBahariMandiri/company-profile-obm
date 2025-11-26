@extends('layouts.admin.app')

@section('title', 'Detail Konten Utama')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Konten Utama
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('main-content.edit', $mainContent) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('main-content.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Konten 1 -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-image me-2"></i>Konten 1
                </div>
                <div class="card-body">
                    @if($mainContent->photo_1)
                        <div class="text-center mb-3">
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($mainContent->photo_1) }}" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($mainContent->photo_1) }}"
                                 alt="Photo 1" class="img-fluid rounded"
                                 style="max-height: 200px; object-fit: cover; width: 100%;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Judul:</label>
                        <p class="mb-0">{{ $mainContent->title_1 }}</p>
                    </div>

                    <div>
                        <label class="form-label fw-bold text-muted">Subtitle:</label>
                        <p class="mb-0" style="white-space: pre-line;">{{ $mainContent->subtitle_1 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten 2 -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-image me-2"></i>Konten 2
                </div>
                <div class="card-body">
                    @if($mainContent->photo_2)
                        <div class="text-center mb-3">
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($mainContent->photo_2) }}" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($mainContent->photo_2) }}"
                                 alt="Photo 2" class="img-fluid rounded"
                                 style="max-height: 200px; object-fit: cover; width: 100%;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Judul:</label>
                        <p class="mb-0">{{ $mainContent->title_2 }}</p>
                    </div>

                    <div>
                        <label class="form-label fw-bold text-muted">Subtitle:</label>
                        <p class="mb-0" style="white-space: pre-line;">{{ $mainContent->subtitle_2 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten 3 -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-image me-2"></i>Konten 3
                </div>
                <div class="card-body">
                    @if($mainContent->photo_3)
                        <div class="text-center mb-3">
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($mainContent->photo_3) }}" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($mainContent->photo_3) }}"
                                 alt="Photo 3" class="img-fluid rounded"
                                 style="max-height: 200px; object-fit: cover; width: 100%;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Judul:</label>
                        <p class="mb-0">{{ $mainContent->title_3 }}</p>
                    </div>

                    <div>
                        <label class="form-label fw-bold text-muted">Subtitle:</label>
                        <p class="mb-0" style="white-space: pre-line;">{{ $mainContent->subtitle_3 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Metadata -->
    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-info-circle me-2"></i>Informasi Metadata
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="text-muted">Dibuat:</strong>
                        {{ $mainContent->created_at->format('d F Y') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="text-muted">Terakhir diupdate:</strong>
                        {{ $mainContent->updated_at->format('d F Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Button -->
    <div class="text-center mt-4">
        <a href="/" target="_blank" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-external-link-alt me-2"></i>
            Lihat di Website
        </a>
    </div>
</div>
@endsection

@push('styles')
<style>
.img-fluid.rounded {
    border: 1px solid #e9ecef;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card-header.bg-primary {
    background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%) !important;
}

.card-header.bg-success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
}

.card-header.bg-info {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
}
</style>
@endpush