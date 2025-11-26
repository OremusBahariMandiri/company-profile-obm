@extends('layouts.admin.app')

@section('title', 'Detail Sambutan Direktur')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i>
            Detail Sambutan Direktur
        </h2>
        <div class="d-flex gap-2">
            <a href="{{ route('director-welcome.edit', $directorWelcome) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('director-welcome.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Director Profile Section -->
        <div class="col-lg-4 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-user-tie me-2"></i>Profil Direktur
                </div>
                <div class="card-body text-center">
                    @if($directorWelcome->director_photo)
                        <div class="mb-4">
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($directorWelcome->director_photo) }}" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($directorWelcome->director_photo) }}"
                                 alt="Director Photo" class="rounded-circle border shadow"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                    @else
                        <div class="mb-4">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-user text-white" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    @endif

                    <h4 class="text-primary mb-2">{{ $directorWelcome->director_name }}</h4>
                    <p class="text-muted mb-0">President Director</p>
                    <p class="text-muted">PT. Oremus Bahari Mandiri</p>

                    <hr>

                    <div class="text-start">
                        <p class="mb-2">
                            <small class="text-muted fw-bold">Dibuat:</small><br>
                            <span class="text-dark">{{ $directorWelcome->created_at->format('d F Y, H:i') }}</span>
                        </p>
                        <p class="mb-0">
                            <small class="text-muted fw-bold">Terakhir diupdate:</small><br>
                            <span class="text-dark">{{ $directorWelcome->updated_at->format('d F Y, H:i') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Message Section -->
        <div class="col-lg-8 mb-4">
            <div class="dashboard-card h-100">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-comments me-2"></i>Pesan Sambutan
                </div>
                <div class="card-body">
                    <!-- Title Highlight -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <h5 class="text-primary mb-0">{{ $directorWelcome->title_highlight }}</h5>
                    </div>

                    <!-- Content Paragraphs -->
                    <div class="welcome-content">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Paragraf Pembuka:</label>
                            <p class="mb-0" style="text-align: justify; line-height: 1.7;">{{ $directorWelcome->content_1 }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Paragraf Kedua:</label>
                            <p class="mb-0" style="text-align: justify; line-height: 1.7;">{{ $directorWelcome->content_2 }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Paragraf Ketiga:</label>
                            <p class="mb-0" style="text-align: justify; line-height: 1.7;">{{ $directorWelcome->content_3 }}</p>
                        </div>

                        @if($directorWelcome->content_4)
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Paragraf Penutup:</label>
                            <p class="mb-0" style="text-align: justify; line-height: 1.7;">{{ $directorWelcome->content_4 }}</p>
                        </div>
                        @endif
                    </div>

                    <hr>

                    <!-- Message Stats -->
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="border rounded p-2">
                                <small class="text-muted d-block">Judul</small>
                                <strong class="text-primary">{{ strlen($directorWelcome->title_highlight) }} karakter</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-2">
                                <small class="text-muted d-block">Paragraf 1</small>
                                <strong class="text-success">{{ strlen($directorWelcome->content_1) }} karakter</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-2">
                                <small class="text-muted d-block">Paragraf 2</small>
                                <strong class="text-info">{{ strlen($directorWelcome->content_2) }} karakter</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-2">
                                <small class="text-muted d-block">Paragraf 3</small>
                                <strong class="text-warning">{{ strlen($directorWelcome->content_3) }} karakter</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="dashboard-card">
        <div class="card-header bg-info text-white">
            <i class="fas fa-eye me-2"></i>Preview Tampilan Website
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($directorWelcome->director_photo)
                        {{-- BEFORE: Storage::url() --}}
                        {{-- <img src="{{ Storage::url($directorWelcome->director_photo) }}" --}}

                        {{-- AFTER: StorageHelper --}}
                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($directorWelcome->director_photo) }}"
                             alt="Director" class="img-fluid rounded shadow"
                             style="max-width: 200px;">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="p-3 bg-light rounded">
                        <h5 class="text-primary mb-3">{{ $directorWelcome->title_highlight }}</h5>
                        <p class="text-muted small mb-2">Selamat datang di PT. Oremus Bahari Mandiri.</p>
                        <p style="text-align: justify;">{{ Str::limit($directorWelcome->content_1, 200) }}</p>
                        <hr>
                        <div class="text-end">
                            <strong>{{ $directorWelcome->director_name }}</strong><br>
                            <small class="text-muted">President Director<br>PT. Oremus Bahari Mandiri</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mt-4">
        <a href="/" target="_blank" class="btn btn-outline-primary btn-lg me-2">
            <i class="fas fa-external-link-alt me-2"></i>
            Lihat di Website
        </a>
        <a href="{{ route('director-welcome.edit', $directorWelcome) }}" class="btn btn-primary btn-lg">
            <i class="fas fa-edit me-2"></i>
            Edit Sambutan
        </a>
    </div>
</div>
@endsection

@push('styles')
<style>
.welcome-content p {
    font-size: 0.95rem;
    color: #495057;
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

.border.rounded {
    transition: all 0.3s ease;
}

.border.rounded:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transform: translateY(-1px);
}
</style>
@endpush