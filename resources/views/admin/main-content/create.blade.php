@extends('layouts.admin.app')

@section('title', 'Tambah Konten Utama')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-plus me-2"></i>
            Tambah Konten Utama
        </h2>
        <a href="{{ route('main-content.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Tambah Konten Utama
        </div>
        <div class="card-body">
            <form action="{{ route('main-content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Section 1 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Konten 1
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_1" class="form-label">Judul 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_1') is-invalid @enderror"
                               id="title_1" name="title_1" value="{{ old('title_1') }}" required>
                        @error('title_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo_1" class="form-label">Foto 1 <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('photo_1') is-invalid @enderror"
                               id="photo_1" name="photo_1" accept="image/*" required>
                        <small class="text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 5MB.</small>
                        @error('photo_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="subtitle_1" class="form-label">Subtitle 1 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('subtitle_1') is-invalid @enderror"
                                  id="subtitle_1" name="subtitle_1" rows="3" required>{{ old('subtitle_1') }}</textarea>
                        @error('subtitle_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Section 2 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Konten 2
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_2" class="form-label">Judul 2 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_2') is-invalid @enderror"
                               id="title_2" name="title_2" value="{{ old('title_2') }}" required>
                        @error('title_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo_2" class="form-label">Foto 2 <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('photo_2') is-invalid @enderror"
                               id="photo_2" name="photo_2" accept="image/*" required>
                        <small class="text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 5MB.</small>
                        @error('photo_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="subtitle_2" class="form-label">Subtitle 2 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('subtitle_2') is-invalid @enderror"
                                  id="subtitle_2" name="subtitle_2" rows="3" required>{{ old('subtitle_2') }}</textarea>
                        @error('subtitle_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Section 3 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Konten 3
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_3" class="form-label">Judul 3 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_3') is-invalid @enderror"
                               id="title_3" name="title_3" value="{{ old('title_3') }}" required>
                        @error('title_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo_3" class="form-label">Foto 3 <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('photo_3') is-invalid @enderror"
                               id="photo_3" name="photo_3" accept="image/*" required>
                        <small class="text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 5MB.</small>
                        @error('photo_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="subtitle_3" class="form-label">Subtitle 3 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('subtitle_3') is-invalid @enderror"
                                  id="subtitle_3" name="subtitle_3" rows="3" required>{{ old('subtitle_3') }}</textarea>
                        @error('subtitle_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                    <a href="{{ route('main-content.index') }}" class="btn btn-secondary">
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
    const imageInputs = ['photo_1', 'photo_2', 'photo_3'];

    imageInputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Create preview container if it doesn't exist
                    let preview = document.getElementById(`preview_${inputId}`);
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.id = `preview_${inputId}`;
                        preview.className = 'mt-2';
                        input.parentNode.appendChild(preview);
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview"
                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            <p class="small text-success mt-1">
                                <i class="fas fa-check me-1"></i>Foto berhasil dipilih
                            </p>
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