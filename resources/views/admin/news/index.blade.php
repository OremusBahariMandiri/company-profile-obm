@extends('layouts.admin.app')

@section('title', 'News Management - Maritime Dashboard')

@push('styles')
<style>
    .news-table th {
        font-weight: 600;
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        color: white;
        border: none;
    }

    .news-table .badge {
        font-size: 0.85rem;
        padding: 0.35rem 0.65rem;
        background-color: #1a4b78;
    }

    .news-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(26, 75, 120, 0.1);
        border: none;
        overflow: hidden;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
        border-radius: 6px;
    }

    .btn-add-news {
        background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-add-news:hover {
        box-shadow: 0 4px 10px rgba(26, 75, 120, 0.3);
        transform: translateY(-2px);
    }

    .empty-news-container {
        padding: 60px 0;
        text-align: center;
    }

    .empty-news-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .empty-news-icon i {
        font-size: 2rem;
        color: #1a4b78;
    }

    .news-img-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e3f2fd;
    }

    .news-img-placeholder {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination {
        --bs-pagination-active-bg: #1a4b78;
        --bs-pagination-active-border-color: #1a4b78;
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
                        <i class="fas fa-newspaper me-2"></i> News Management
                    </div>
                    <a href="{{ route('news.create') }}" class="btn btn-add-news text-white">
                        <i class="fas fa-plus me-2"></i> Add New News
                    </a>
                </div>

                <div class="card-body">
                    @if($news->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover news-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Topic</th>
                                        <th>Content Preview</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $index => $item)
                                        <tr>
                                            <td>{{ $news->firstItem() + $index }}</td>
                                            <td>
                                                @if($item->image)
                                                    <img src="{{ Storage::url($item->image) }}" alt="News Image"
                                                         class="news-img-thumbnail">
                                                @else
                                                    <div class="news-img-placeholder">
                                                        <i class="fas fa-image text-primary"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ Str::limit($item->title, 30) }}</strong>
                                            </td>
                                            <td>
                                                <span class="badge">{{ $item->topic }}</span>
                                            </td>
                                            <td>{{ Str::limit($item->news, 50) }}</td>
                                            <td>{{ $item->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('news.show', $item->id) }}"
                                                       class="btn btn-action btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('news.edit', $item->id) }}"
                                                       class="btn btn-action btn-outline-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('news.destroy', $item->id) }}"
                                                          method="POST" style="display: inline;"
                                                          onsubmit="return confirm('Are you sure you want to delete this news?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-action btn-outline-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $news->links() }}
                        </div>
                    @else
                        <div class="empty-news-container">
                            <div class="empty-news-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h4 class="text-primary mb-2">No News Found</h4>
                            <p class="text-muted mb-4">Start by creating your first news article.</p>
                            <a href="{{ route('news.create') }}" class="btn btn-add-news text-white">
                                <i class="fas fa-plus me-2"></i> Create News
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection