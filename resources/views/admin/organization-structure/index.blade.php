@extends('layouts.admin.app')

@section('title', 'Kelola Struktur Organisasi')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-sitemap me-2"></i>
            Kelola Struktur Organisasi
        </h2>
        @if($canAdd)
        <a href="{{ route('organization-structure.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Struktur Organisasi
        </a>
        @endif
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
            Hanya boleh ada 1 struktur organisasi. Edit yang sudah ada atau hapus untuk membuat yang baru.
        </div>
    @endif

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Struktur Organisasi
        </div>
        <div class="card-body">
            @if($organizationStructures->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="20%">Foto Struktur</th>
                                <th width="35%">Pratinjau</th>
                                <th width="25%">Informasi File</th>
                                <th width="10%">Terakhir Update</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizationStructures as $structure)
                            <tr>
                                <td>
                                    @if($structure->photo)
                                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($structure->photo) }}" alt="Organization Structure"
                                             class="rounded border" style="width: 120px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                             style="width: 120px; height: 80px;">
                                            <i class="fas fa-sitemap text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($structure->photo)
                                        {{-- BEFORE: Storage::url() --}}
                                        {{-- <a href="{{ Storage::url($structure->photo) }}" target="_blank" class="text-decoration-none"> --}}
                                        {{--     <img src="{{ Storage::url($structure->photo) }}" alt="Organization Structure Preview" --}}

                                        {{-- AFTER: StorageHelper --}}
                                        <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($structure->photo) }}" target="_blank" class="text-decoration-none">
                                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($structure->photo) }}" alt="Organization Structure Preview"
                                                 class="rounded border shadow-sm" style="max-width: 200px; max-height: 120px; object-fit: contain;">
                                        </a>
                                        <div class="mt-2">
                                            {{-- BEFORE: Storage::url() --}}
                                            {{-- <a href="{{ Storage::url($structure->photo) }}" target="_blank" class="btn btn-sm btn-outline-primary"> --}}

                                            {{-- AFTER: StorageHelper --}}
                                            <a href="{{ \App\Helpers\StorageHelper::getStorageUrl($structure->photo) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt me-1"></i>Lihat Full Size
                                            </a>
                                        </div>
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    @if($structure->photo)
                                        @php
                                            // BEFORE: storage_path('app/public/' . $structure->photo);
                                            // AFTER: Use StorageHelper methods
                                            $fileSize = \App\Helpers\StorageHelper::getFileSize($structure->photo);
                                            $fileExtension = strtoupper(pathinfo($structure->photo, PATHINFO_EXTENSION));
                                        @endphp
                                        <div class="mb-2">
                                            <strong>Format:</strong> <span class="badge bg-info">{{ $fileExtension }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <strong>Ukuran:</strong> {{ number_format($fileSize / 1024, 1) }} KB
                                        </div>
                                        <div>
                                            <strong>Nama File:</strong><br>
                                            <small class="text-muted">{{ basename($structure->photo) }}</small>
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $structure->updated_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('organization-structure.show', $structure) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('organization-structure.edit', $structure) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $structure->id }})" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-sitemap text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada struktur organisasi</h4>
                    <p class="text-muted">Klik tombol "Tambah Struktur Organisasi" untuk menambah bagan struktur organisasi.</p>
                    <a href="{{ route('organization-structure.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Struktur Organisasi
                    </a>
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
                <p>Apakah Anda yakin ingin menghapus struktur organisasi ini?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan dan akan menghapus foto struktur organisasi yang terkait.</p>
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
    deleteForm.action = `/organization-structure/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush