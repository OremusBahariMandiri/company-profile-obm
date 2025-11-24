@extends('layouts.admin.app')

@section('title', 'Edit Sambutan Direktur')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Sambutan Direktur
        </h2>
        <a href="{{ route('director-welcome.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Sambutan Direktur
        </div>
        <div class="card-body">
            <form action="{{ route('director-welcome.update', $directorWelcome) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Director Info Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-user-tie me-2"></i>Informasi Direktur
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="director_name" class="form-label">Nama Direktur <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('director_name') is-invalid @enderror"
                               id="director_name" name="director_name" value="{{ old('director_name', $directorWelcome->director_name) }}" required
                               placeholder="Contoh: Niko Kristanto">
                        @error('director_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="director_photo" class="form-label">Foto Direktur</label>
                        <input type="file" class="form-control @error('director_photo') is-invalid @enderror"
                               id="director_photo" name="director_photo" accept="image/*">
                        <div class="form-text">Maksimal 2MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengganti foto.</div>

                        @if($directorWelcome->director_photo)
                            <div class="mt-3 text-center">
                                <div class="d-inline-block">
                                    <img src="{{ Storage::url($directorWelcome->director_photo) }}" alt="Current Director Photo"
                                         class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
                                    <p class="small text-muted mt-2">Foto saat ini</p>
                                </div>
                            </div>
                        @endif

                        @error('director_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Welcome Message Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-comments me-2"></i>Pesan Sambutan
                        </h5>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="title_highlight" class="form-label">Judul Highlight <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_highlight') is-invalid @enderror"
                               id="title_highlight" name="title_highlight" value="{{ old('title_highlight', $directorWelcome->title_highlight) }}" required
                               placeholder="Contoh: Dear Valued Agents">
                        <div class="form-text">Kalimat pembuka yang menarik perhatian</div>
                        @error('title_highlight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="content_1" class="form-label">Paragraf Pembuka <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content_1') is-invalid @enderror"
                                  id="content_1" name="content_1" rows="4" required
                                  placeholder="Tulis paragraf pembuka sambutan...">{{ old('content_1', $directorWelcome->content_1) }}</textarea>
                        @error('content_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="content_2" class="form-label">Paragraf Kedua <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content_2') is-invalid @enderror"
                                  id="content_2" name="content_2" rows="4" required
                                  placeholder="Tulis paragraf kedua tentang pencapaian atau komitmen...">{{ old('content_2', $directorWelcome->content_2) }}</textarea>
                        @error('content_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="content_3" class="form-label">Paragraf Ketiga <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content_3') is-invalid @enderror"
                                  id="content_3" name="content_3" rows="4" required
                                  placeholder="Tulis paragraf ketiga tentang layanan atau visi...">{{ old('content_3', $directorWelcome->content_3) }}</textarea>
                        @error('content_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="content_4" class="form-label">Paragraf Penutup (Opsional)</label>
                        <textarea class="form-control @error('content_4') is-invalid @enderror"
                                  id="content_4" name="content_4" rows="3"
                                  placeholder="Tulis paragraf penutup (opsional)...">{{ old('content_4', $directorWelcome->content_4) }}</textarea>
                        <div class="form-text">Paragraf ini bersifat opsional, bisa dikosongi</div>
                        @error('content_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('director-welcome.index') }}" class="btn btn-secondary">
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
    // Preview image functionality for new uploads
    const photoInput = document.getElementById('director_photo');

    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Find existing preview or create new one
                const currentPhotoDiv = photoInput.parentNode.querySelector('.mt-3.text-center');
                let preview;

                if (currentPhotoDiv) {
                    preview = currentPhotoDiv;
                } else {
                    preview = document.createElement('div');
                    preview.className = 'mt-3 text-center';
                    photoInput.parentNode.appendChild(preview);
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="d-inline-block">
                            <img src="${e.target.result}" alt="New Preview"
                                 class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
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

    // Character count for textareas
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        const maxLength = 1000; // Set your desired max length

        // Create character counter
        const counter = document.createElement('div');
        counter.className = 'form-text text-end';
        counter.innerHTML = `<span class="text-muted">${textarea.value.length}/${maxLength} karakter</span>`;
        textarea.parentNode.appendChild(counter);

        textarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            counter.innerHTML = `<span class="${currentLength > maxLength ? 'text-danger' : 'text-muted'}">${currentLength}/${maxLength} karakter</span>`;
        });
    });
});
</script>
@endpush