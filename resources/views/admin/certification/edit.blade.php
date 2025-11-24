@extends('layouts.admin.app')

@section('title', 'Edit Sertifikat')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Sertifikat
        </h2>
        <a href="{{ route('certification.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Sertifikat
        </div>
        <div class="card-body">
            <form action="{{ route('certification.update', $certification) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Certificate Info Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-certificate me-2"></i>Informasi Sertifikat
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Judul Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $certification->title) }}" required
                               placeholder="Contoh: ISO 9001:2015">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo" class="form-label">Foto Sertifikat</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               id="photo" name="photo" accept="image/*">
                        <div class="form-text">Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengubah foto.</div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($certification->photo)
                        <div class="mt-3 text-center">
                            <p class="small text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($certification->photo) }}" alt="Current Certificate Photo"
                                 class="rounded border" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Certificate Description Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-file-alt me-2"></i>Deskripsi Sertifikat
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="6" required
                                  placeholder="Tulis deskripsi lengkap sertifikat, termasuk detail seperti penerbit, tanggal berlaku, cakupan, dll...">{{ old('description', $certification->description) }}</textarea>
                        <div class="form-text">Berikan deskripsi yang komprehensif tentang sertifikat ini</div>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('certification.index') }}" class="btn btn-secondary">
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
                            <p class="small text-muted mb-2">Foto baru yang dipilih:</p>
                            <img src="${e.target.result}" alt="Preview"
                                 class="rounded border" style="max-width: 200px; max-height: 200px; object-fit: cover;">
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

    // Character count for description
    const descriptionTextarea = document.getElementById('description');
    if (descriptionTextarea) {
        const maxLength = 1000; // Set your desired max length

        // Create character counter
        const counter = document.createElement('div');
        counter.className = 'form-text text-end';
        counter.innerHTML = `<span class="text-muted">${descriptionTextarea.value.length}/${maxLength} karakter</span>`;
        descriptionTextarea.parentNode.appendChild(counter);

        descriptionTextarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            counter.innerHTML = `<span class="${currentLength > maxLength ? 'text-danger' : 'text-muted'}">${currentLength}/${maxLength} karakter</span>`;
        });
    }
});
</script>
@endpush