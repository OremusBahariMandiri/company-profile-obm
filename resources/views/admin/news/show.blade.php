@extends('layouts.admin.app')

@section('title', 'News Details - Maritime Dashboard')

@push('styles')
<style>
    .dashboard-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(26, 75, 120, 0.1);
        border: none;
        overflow: hidden;
    }

    .card-header {
        font-weight: 600;
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        color: white;
        border: none;
        padding: 20px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        box-shadow: 0 4px 10px rgba(26, 75, 120, 0.3);
        transform: translateY(-2px);
        background: linear-gradient(135deg, #2c6ca5 0%, #1a4b78 100%);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .btn-warning {
        background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        color: white;
    }

    .btn-warning:hover {
        box-shadow: 0 4px 10px rgba(240, 173, 78, 0.3);
        transform: translateY(-2px);
        background: linear-gradient(135deg, #ec971f 0%, #f0ad4e 100%);
        color: white;
    }

    .btn-outline-warning {
        color: #f0ad4e;
        border: 2px solid #f0ad4e;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-warning:hover {
        background: #f0ad4e;
        border-color: #f0ad4e;
        color: white;
        transform: translateY(-1px);
    }

    .btn-outline-danger {
        color: #d9534f;
        border: 2px solid #d9534f;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover {
        background: #d9534f;
        border-color: #d9534f;
        color: white;
        transform: translateY(-1px);
    }

    .content-section {
        background: #f8fbff;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 20px;
        border-left: 4px solid #1a4b78;
    }

    .section-title {
        color: #1a4b78;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .badge {
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 20px;
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        color: white;
        font-weight: 600;
    }

    .news-title {
        color: #1a4b78;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .meta-info {
        color: #6c757d;
        font-size: 0.95rem;
        margin-bottom: 25px;
    }

    .meta-info i {
        color: #1a4b78;
        margin-right: 8px;
    }

    .main-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(26, 75, 120, 0.1);
        margin-bottom: 25px;
    }

    .content-text {
        line-height: 1.8;
        font-size: 16px;
        color: #333;
        text-align: justify;
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .additional-images {
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .additional-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(26, 75, 120, 0.1);
        transition: transform 0.3s ease;
    }

    .additional-image:hover {
        transform: scale(1.02);
    }

    .action-footer {
        background: white;
        padding: 20px 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-top: 3px solid #e3f2fd;
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .timestamp-info {
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        padding: 15px;
        border-radius: 8px;
        color: #1a4b78;
        font-size: 0.9rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="dashboard-card fade-in mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-newspaper me-2"></i> News Details
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i> Edit
                        </a>
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Back to News
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Header Section -->
                    <div class="content-section">
                        <div class="section-title">
                            <i class="fas fa-info-circle me-2"></i>Article Information
                        </div>
                        <div class="mb-3">
                            <span class="badge">{{ $news->topic }}</span>
                        </div>
                        <h1 class="news-title">{{ $news->title }}</h1>
                        <div class="meta-info">
                            <div class="d-flex flex-wrap gap-4">
                                <div>
                                    <i class="fas fa-calendar-alt"></i>
                                    Published on {{ $news->created_at->format('F d, Y') }}
                                </div>
                                @if($news->updated_at != $news->created_at)
                                    <div>
                                        <i class="fas fa-edit"></i>
                                        Last updated {{ $news->updated_at->format('F d, Y') }}
                                    </div>
                                @endif
                                <div>
                                    <i class="fas fa-clock"></i>
                                    {{ $news->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Image -->
                    @if($news->image)
                        <div class="content-section">
                            <div class="section-title">
                                <i class="fas fa-image me-2"></i>Featured Image
                            </div>
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}"
                                 class="main-image">
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="content-section">
                        <div class="section-title">
                            <i class="fas fa-file-alt me-2"></i>Article Content
                        </div>
                        <div class="content-text">
                            {!! nl2br(e($news->news)) !!}
                        </div>
                    </div>

                    <!-- Additional Images -->
                    @if($news->image2 || $news->image3)
                        <div class="content-section">
                            <div class="section-title">
                                <i class="fas fa-images me-2"></i>Additional Images
                            </div>
                            <div class="additional-images">
                                <div class="image-gallery">
                                    @if($news->image2)
                                        <div>
                                            <img src="{{ Storage::url($news->image2) }}" alt="Additional Image"
                                                 class="additional-image">
                                        </div>
                                    @endif
                                    @if($news->image3)
                                        <div>
                                            <img src="{{ Storage::url($news->image3) }}" alt="Additional Image"
                                                 class="additional-image">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="action-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="timestamp-info">
                                <i class="fas fa-clock me-2"></i>
                                Created {{ $news->created_at->diffForHumans() }}
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-outline-warning">
                                    <i class="fas fa-edit me-2"></i> Edit News
                                </a>
                                <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display: inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this news? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash me-2"></i> Delete News
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection