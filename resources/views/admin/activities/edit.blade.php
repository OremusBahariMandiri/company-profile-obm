@extends('layouts.admin.app')

@section('title', 'Edit Aktivitas')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Aktivitas
        </h2>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Aktivitas
        </div>
        <div class="card-body">
            <form action="{{ route('activities.update', $activity) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Activity Info Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi Aktivitas
                        </h5>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="title" class="form-label">Judul Aktivitas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $activity->title) }}" required
                               placeholder="Contoh: Comprehensive Ship Agency Services">
                        <div class="form-text">Masukkan judul yang deskriptif untuk aktivitas ini</div>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $key => $value)
                                <option value="{{ $key }}" {{ old('category', $activity->category) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Pilih kategori yang sesuai dengan jenis aktivitas</div>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Current Photo Display -->
                @if($activity->photo)
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Foto Saat Ini
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="current-photo text-center">
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($activity->photo) }}" alt="Current Photo" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($activity->photo) }}" alt="Current Photo"
                                 class="rounded border" style="max-width: 400px; max-height: 300px; object-fit: cover;">
                            <p class="small text-muted mt-2">Foto yang sedang digunakan</p>
                        </div>
                    </div>
                </div>

                <hr>
                @endif

                <!-- Photo Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-camera me-2"></i>{{ $activity->photo ? 'Ganti Foto' : 'Upload Foto' }}
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo" class="form-label">
                            {{ $activity->photo ? 'Upload Foto Baru (Opsional)' : 'Upload Foto' }}
                            @if(!$activity->photo)<span class="text-danger">*</span>@endif
                        </label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               id="photo" name="photo" accept="image/*" {{ !$activity->photo ? 'required' : '' }}>
                        <div class="form-text">
                            {{ $activity->photo ? 'Biarkan kosong jika tidak ingin mengganti foto. ' : '' }}
                            Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Disarankan ukuran 800x600 pixel untuk hasil optimal.
                        </div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Category Preview -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-eye me-2"></i>Preview Kategori
                        </h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Kategori Saat Ini:</strong>
                            <span class="badge bg-primary ms-1">{{ App\Http\Controllers\Admin\OurActivityController::getCategoryName($activity->category) }}</span>
                        </div>
                        <div class="category-preview">
                            <div class="row">
                                @php
                                    $categoryIcons = [
                                        'agency' => 'fa-ship',
                                        'cable-laying' => 'fa-cable-car',
                                        'ship-to-ship' => 'fa-exchange-alt',
                                        'provision-supply' => 'fa-box',
                                        'medivac' => 'fa-ambulance',
                                        'crew-change' => 'fa-users'
                                    ];
                                    $categoryColors = [
                                        'agency' => 'primary',
                                        'cable-laying' => 'success',
                                        'ship-to-ship' => 'info',
                                        'provision-supply' => 'warning',
                                        'medivac' => 'danger',
                                        'crew-change' => 'secondary'
                                    ];
                                @endphp
                                @foreach($categories as $key => $value)
                                <div class="col-md-2 mb-3">
                                    <div class="card border-{{ $categoryColors[$key] ?? 'secondary' }} h-100 {{ $activity->category == $key ? 'border-2 shadow' : '' }}">
                                        <div class="card-body text-center p-2">
                                            <i class="fas {{ $categoryIcons[$key] ?? 'fa-folder' }} fa-2x text-{{ $categoryColors[$key] ?? 'secondary' }} mb-2"></i>
                                            <h6 class="card-title small">{{ $value }}</h6>
                                            <small class="text-muted">{{ $key }}</small>
                                            @if($activity->category == $key)
                                                <div class="mt-2">
                                                    <span class="badge bg-success">Aktif</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('activities.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview image functionality
    const photoInput = document.getElementById('photo');

    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Create preview container if it doesn't exist
                let preview = document.getElementById('photo_preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'photo_preview';
                    preview.className = 'mt-3 text-center';
                    photoInput.parentNode.appendChild(preview);
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="d-inline-block">
                            <img src="${e.target.result}" alt="Preview"
                                 class="rounded border" style="max-width: 300px; max-height: 200px; object-fit: cover;">
                            <p class="small text-success mt-2">
                                <i class="fas fa-check-circle me-1"></i>Foto baru dipilih
                            </p>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Category selection highlighting
    const categorySelect = document.getElementById('category');
    const categoryCards = document.querySelectorAll('.category-preview .card');

    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            const selectedCategory = this.value;

            categoryCards.forEach(card => {
                card.classList.remove('border-2', 'shadow');
                const badge = card.querySelector('.badge');
                if (badge) badge.remove();

                if (selectedCategory && card.querySelector('.text-muted').textContent === selectedCategory) {
                    card.classList.add('border-2', 'shadow');
                    const cardBody = card.querySelector('.card-body');
                    if (cardBody && !card.querySelector('.badge')) {
                        cardBody.innerHTML += '<div class="mt-2"><span class="badge bg-success">Dipilih</span></div>';
                    }
                }
            });
        });
    }
});
</script>
@endpush