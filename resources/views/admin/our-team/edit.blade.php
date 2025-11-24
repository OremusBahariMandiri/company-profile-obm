@extends('layouts.admin.app')

@section('title', 'Edit Konfigurasi Tim')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Konfigurasi Tim
        </h2>
        <a href="{{ route('our-team.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Konfigurasi Tim
        </div>
        <div class="card-body">
            <form action="{{ route('our-team.update', $ourTeam) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Team Photo 1 Section (Required) -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-star me-2"></i>Tim Utama (Wajib)
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_photo_1" class="form-label">Judul Tim Utama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_photo_1') is-invalid @enderror"
                               id="title_photo_1" name="title_photo_1" value="{{ old('title_photo_1', $ourTeam->title_photo_1) }}" required
                               placeholder="Contoh: PT. Oremus Bahari Mandiri Team">
                        @error('title_photo_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subtitle_photo_1" class="form-label">Subtitle Tim Utama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('subtitle_photo_1') is-invalid @enderror"
                               id="subtitle_photo_1" name="subtitle_photo_1" value="{{ old('subtitle_photo_1', $ourTeam->subtitle_photo_1) }}" required
                               placeholder="Contoh: Comprehensive Maritime Solutions Team">
                        @error('subtitle_photo_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo_1" class="form-label">Foto Tim Utama</label>
                        <input type="file" class="form-control @error('photo_1') is-invalid @enderror"
                               id="photo_1" name="photo_1" accept="image/*">
                        <div class="form-text">Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengubah foto.</div>
                        @error('photo_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($ourTeam->photo_1)
                        <div class="mt-3 text-center">
                            <p class="small text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($ourTeam->photo_1) }}" alt="Current Team Photo 1"
                                 class="rounded border" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Team Photo 2 Section (Optional) -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-users me-2"></i>Tim Kedua (Opsional)
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_photo_2" class="form-label">Judul Tim Kedua</label>
                        <input type="text" class="form-control @error('title_photo_2') is-invalid @enderror"
                               id="title_photo_2" name="title_photo_2" value="{{ old('title_photo_2', $ourTeam->title_photo_2) }}"
                               placeholder="Contoh: East Kalimantan Operations">
                        @error('title_photo_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subtitle_photo_2" class="form-label">Subtitle Tim Kedua</label>
                        <input type="text" class="form-control @error('subtitle_photo_2') is-invalid @enderror"
                               id="subtitle_photo_2" name="subtitle_photo_2" value="{{ old('subtitle_photo_2', $ourTeam->subtitle_photo_2) }}"
                               placeholder="Contoh: Regional Maritime Service Center">
                        @error('subtitle_photo_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo_2" class="form-label">Foto Tim Kedua</label>
                        <input type="file" class="form-control @error('photo_2') is-invalid @enderror"
                               id="photo_2" name="photo_2" accept="image/*">
                        <div class="form-text">Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengubah foto.</div>
                        @error('photo_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($ourTeam->photo_2)
                        <div class="mt-3 text-center">
                            <p class="small text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($ourTeam->photo_2) }}" alt="Current Team Photo 2"
                                 class="rounded border" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Team Photo 3 Section (Optional) -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-user-friends me-2"></i>Tim Ketiga (Opsional)
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_photo_3" class="form-label">Judul Tim Ketiga</label>
                        <input type="text" class="form-control @error('title_photo_3') is-invalid @enderror"
                               id="title_photo_3" name="title_photo_3" value="{{ old('title_photo_3', $ourTeam->title_photo_3) }}"
                               placeholder="Contoh: Central Operations Team">
                        @error('title_photo_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subtitle_photo_3" class="form-label">Subtitle Tim Ketiga</label>
                        <input type="text" class="form-control @error('subtitle_photo_3') is-invalid @enderror"
                               id="subtitle_photo_3" name="subtitle_photo_3" value="{{ old('subtitle_photo_3', $ourTeam->subtitle_photo_3) }}"
                               placeholder="Contoh: Headquarters Service Division">
                        @error('subtitle_photo_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo_3" class="form-label">Foto Tim Ketiga</label>
                        <input type="file" class="form-control @error('photo_3') is-invalid @enderror"
                               id="photo_3" name="photo_3" accept="image/*">
                        <div class="form-text">Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengubah foto.</div>
                        @error('photo_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($ourTeam->photo_3)
                        <div class="mt-3 text-center">
                            <p class="small text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($ourTeam->photo_3) }}" alt="Current Team Photo 3"
                                 class="rounded border" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('our-team.index') }}" class="btn btn-secondary">
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
    // Preview image functionality for all photo inputs
    const photoInputs = ['photo_1', 'photo_2', 'photo_3'];

    photoInputs.forEach(function(inputId) {
        const photoInput = document.getElementById(inputId);
        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Create preview container if it doesn't exist
                    let preview = document.getElementById(inputId + '_preview');
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.id = inputId + '_preview';
                        preview.className = 'mt-3 text-center';
                        photoInput.parentNode.appendChild(preview);
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `
                            <div class="d-inline-block">
                                <p class="small text-muted mb-2">Foto baru yang dipilih:</p>
                                <img src="${e.target.result}" alt="Preview"
                                     class="rounded border" style="max-width: 200px; max-height: 150px; object-fit: cover;">
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
    });
});
</script>
@endpush