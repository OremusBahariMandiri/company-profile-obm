@extends('layouts.admin.app')

@section('title', 'Kelola Konten Utama')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-image me-2"></i>
            Kelola Konten Utama
        </h2>
        {{-- @if($canAdd)
        <a href="{{ route('main-content.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Konten
        </a>
        @endif --}}
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
            Maksimal 3 konten utama sudah tercapai. Hapus salah satu untuk menambah yang baru.
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Konten Utama
        </div>
        <div class="card-body">
            @if($mainContents->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="15%">Preview</th>
                                <th width="25%">Judul 1</th>
                                <th width="25%">Judul 2</th>
                                <th width="25%">Judul 3</th>
                                <th width="5%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mainContents as $index => $content)
                            <tr>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        @if($content->photo_1)
                                            {{-- BEFORE: Storage::url() --}}
                                            {{-- <img src="{{ Storage::url($content->photo_1) }}" alt="Photo 1" --}}

                                            {{-- AFTER: StorageHelper --}}
                                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($content->photo_1) }}" alt="Photo 1"
                                                 class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        @if($content->photo_2)
                                            {{-- BEFORE: Storage::url() --}}
                                            {{-- <img src="{{ Storage::url($content->photo_2) }}" alt="Photo 2" --}}

                                            {{-- AFTER: StorageHelper --}}
                                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($content->photo_2) }}" alt="Photo 2"
                                                 class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        @if($content->photo_3)
                                            {{-- BEFORE: Storage::url() --}}
                                            {{-- <img src="{{ Storage::url($content->photo_3) }}" alt="Photo 3" --}}

                                            {{-- AFTER: StorageHelper --}}
                                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($content->photo_3) }}" alt="Photo 3"
                                                 class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <strong>{{ Str::limit($content->title_1, 30) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($content->subtitle_1, 50) }}</small>
                                </td>
                                <td>
                                    <strong>{{ Str::limit($content->title_2, 30) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($content->subtitle_2, 50) }}</small>
                                </td>
                                <td>
                                    <strong>{{ Str::limit($content->title_3, 30) }}</strong><br>
                                    <small class="text-muted">{{ Str::limit($content->subtitle_3, 50) }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('main-content.show', $content) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('main-content.edit', $content) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $content->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-image text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada konten utama</h4>
                    <p class="text-muted">Klik tombol "Tambah Konten" untuk menambah konten utama pertama.</p>
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
                <p>Apakah Anda yakin ingin menghapus konten utama ini?</p>
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
    deleteForm.action = `/admin/main-content/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush