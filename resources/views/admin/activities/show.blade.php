@extends('layouts.admin.app')

@section('title', 'Detail Aktivitas')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Aktivitas
        </h2>
        <div class="btn-group">
            <a href="{{ route('activities.edit', $activity) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('activities.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-info-circle me-2"></i>Informasi Aktivitas
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Photo Section -->
                <div class="col-md-6 mb-4">
                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="fas fa-image me-2"></i>Foto Aktivitas
                    </h5>
                    @if($activity->photo)
                        <div class="text-center">
                            <img src="{{ Storage::url($activity->photo) }}" alt="{{ $activity->title }}"
                                 class="img-fluid rounded border shadow-sm" style="max-height: 400px; object-fit: cover;">
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="bg-light rounded border d-inline-flex align-items-center justify-content-center"
                                 style="width: 200px; height: 150px;">
                                <i class="fas fa-image text-muted fa-3x"></i>
                            </div>
                            <p class="text-muted mt-2">Tidak ada foto</p>
                        </div>
                    @endif
                </div>

                <!-- Info Section -->
                <div class="col-md-6 mb-4">
                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="fas fa-info-circle me-2"></i>Detail Informasi
                    </h5>

                    <div class="info-item mb-3">
                        <strong class="text-dark">Judul:</strong>
                        <p class="mb-0">{{ $activity->title }}</p>
                    </div>

                    <div class="info-item mb-3">
                        <strong class="text-dark">Kategori:</strong>
                        @php
                            $categoryColors = [
                                'agency' => 'primary',
                                'cable-laying' => 'success',
                                'ship-to-ship' => 'info',
                                'provision-supply' => 'warning',
                                'medivac' => 'danger',
                                'crew-change' => 'secondary'
                            ];
                            $categoryIcons = [
                                'agency' => 'fa-ship',
                                'cable-laying' => 'fa-cable-car',
                                'ship-to-ship' => 'fa-exchange-alt',
                                'provision-supply' => 'fa-box',
                                'medivac' => 'fa-ambulance',
                                'crew-change' => 'fa-users'
                            ];
                            $color = $categoryColors[$activity->category] ?? 'secondary';
                            $icon = $categoryIcons[$activity->category] ?? 'fa-folder';
                        @endphp
                        <div class="d-flex align-items-center">
                            <span class="badge bg-{{ $color }} fs-6 me-2">
                                <i class="fas {{ $icon }} me-1"></i>
                                {{ $categories[$activity->category] ?? $activity->category }}
                            </span>
                            <small class="text-muted">({{ $activity->category }})</small>
                        </div>
                    </div>

                    <div class="info-item mb-3">
                        <strong class="text-dark">Dibuat:</strong>
                        <p class="mb-0">{{ $activity->created_at->format('d F Y, H:i') }} WIB</p>
                    </div>

                    <div class="info-item mb-3">
                        <strong class="text-dark">Terakhir Update:</strong>
                        <p class="mb-0">{{ $activity->updated_at->format('d F Y, H:i') }} WIB</p>
                    </div>

                    @if($activity->photo)
                    <div class="info-item mb-3">
                        <strong class="text-dark">File Info:</strong>
                        @php
                            $imagePath = Storage::disk('public')->path($activity->photo);
                            $fileSize = file_exists($imagePath) ? round(filesize($imagePath) / 1024, 2) : 'N/A';
                            $imageInfo = file_exists($imagePath) ? getimagesize(Storage::disk('public')->url($activity->photo)) : null;
                        @endphp
                        <ul class="list-unstyled mb-0">
                            <li><small class="text-muted">Ukuran: {{ $fileSize }} KB</small></li>
                            @if($imageInfo)
                                <li><small class="text-muted">Dimensi: {{ $imageInfo[0] }}x{{ $imageInfo[1] }} pixel</small></li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="dashboard-card mt-4">
        <div class="card-header">
            <i class="fas fa-desktop me-2"></i>Preview Website
        </div>
        <div class="card-body">
            <h5 class="text-primary mb-3">Bagaimana aktivitas ini akan tampil di website:</h5>

            <!-- Website Preview Simulation -->
            <div class="website-preview border rounded p-3" style="background-color: #f8f9fa;">
                <div class="activity-gallery-preview">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery-item-preview position-relative" style="height: 200px; border-radius: 10px; overflow: hidden;">
                                @if($activity->photo)
                                    <img src="{{ Storage::url($activity->photo) }}" alt="{{ $activity->title }}"
                                         class="w-100 h-100" style="object-fit: cover;">
                                    <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                         style="background: rgba(0,0,0,0.7); opacity: 0; transition: opacity 0.3s;">
                                        <h5 class="text-white text-center">{{ $activity->title }}</h5>
                                    </div>
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                        <div class="text-center">
                                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                            <p class="text-muted">No Image</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <div class="text-center text-muted">
                                    <i class="fas fa-plus fa-3x mb-2"></i>
                                    <p>Aktivitas lainnya dalam kategori yang sama akan muncul di sini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Preview: Aktivitas ini akan muncul di tab "{{ $categories[$activity->category] ?? $activity->category }}" di halaman website
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.gallery-item-preview:hover .gallery-overlay {
    opacity: 1 !important;
}
.info-item {
    border-left: 3px solid var(--bs-primary);
    padding-left: 15px;
}
</style>
@endpush
@endsection