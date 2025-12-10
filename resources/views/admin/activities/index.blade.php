@extends('layouts.admin.app')

@section('title', 'Kelola Aktivitas')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-images me-2"></i>
            Kelola Aktivitas
        </h2>
        <a href="{{ route('activities.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Aktivitas
        </a>
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

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-2">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-ship fa-2x mb-2"></i>
                    <h6>Agency</h6>
                    <h4>{{ $groupedActivities->get('agency', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-tools fa-2x mb-2"></i>
                    <h6>Cable Laying</h6>
                    <h4>{{ $groupedActivities->get('cable-laying', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <i class="fas fa-exchange-alt fa-2x mb-2"></i>
                    <h6>Ship to Ship</h6>
                    <h4>{{ $groupedActivities->get('ship-to-ship', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-2x mb-2"></i>
                    <h6>Provision Supply</h6>
                    <h4>{{ $groupedActivities->get('provision-supply', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <i class="fas fa-ambulance fa-2x mb-2"></i>
                    <h6>Medivac</h6>
                    <h4>{{ $groupedActivities->get('medivac', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-secondary text-white">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <h6>Crew Change</h6>
                    <h4>{{ $groupedActivities->get('crew-change', collect())->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2 mt-2">
            <div class="card bg-dark text-white">
                <div class="card-body text-center">
                    <i class="fas fa-oil-can fa-2x mb-2"></i>
                    <h6>Oil & Gas Support</h6>
                    <h4>{{ $groupedActivities->get('oil-gas-support', collect())->count() }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-list me-2"></i>Daftar Aktivitas
        </div>
        <div class="card-body">
            @if($activities->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="15%">Foto</th>
                                <th width="35%">Judul</th>
                                <th width="20%">Kategori</th>
                                <th width="20%">Terakhir Update</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td>
                                    @if($activity->photo)
                                        {{-- BEFORE: Storage::url() --}}
                                        {{-- <img src="{{ Storage::url($activity->photo) }}" alt="Activity Photo" --}}

                                        {{-- AFTER: StorageHelper --}}
                                        <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($activity->photo) }}" alt="Activity Photo"
                                             class="rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                             style="width: 80px; height: 60px;">
                                            <i class="fas fa-image text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $activity->title }}</strong>
                                </td>
                                <td>
                                    @php
                                        $categoryColors = [
                                            'agency' => 'primary',
                                            'cable-laying' => 'success',
                                            'ship-to-ship' => 'info',
                                            'provision-supply' => 'warning',
                                            'medivac' => 'danger',
                                            'crew-change' => 'secondary',
                                            'oil-gas-support' => 'dark',
                                        ];
                                        $color = $categoryColors[$activity->category] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $color }}">
                                        {{ App\Http\Controllers\Admin\OurActivityController::getCategoryName($activity->category) }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $activity->updated_at->format('d/m/Y H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('activities.show', $activity) }}"
                                           class="btn btn-sm btn-info" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('activities.edit', $activity) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $activity->id }})" title="Hapus">
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
                    <i class="fas fa-images text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">Belum ada aktivitas</h4>
                    <p class="text-muted">Klik tombol "Tambah Aktivitas" untuk menambah galeri aktivitas.</p>
                    <a href="{{ route('activities.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-2"></i>Tambah Aktivitas
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
                <p>Apakah Anda yakin ingin menghapus aktivitas ini?</p>
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
    deleteForm.action = `/activities/${id}`;

    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>
@endpush