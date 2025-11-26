@extends('layouts.admin.app')

@section('title', 'Edit Achievement')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Achievement
        </h2>
        <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Achievement
        </div>
        <div class="card-body">
            <form action="{{ route('achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Achievement 1 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-trophy me-2"></i>Achievement 1
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="icon_title_1" class="form-label">Icon 1 <span class="text-danger">*</span></label>
                        <select class="form-select @error('icon_title_1') is-invalid @enderror"
                                id="icon_title_1" name="icon_title_1" required>
                            <option value="">Pilih Icon</option>
                            @foreach($iconOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('icon_title_1', $achievement->icon_title_1) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('icon_title_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="title_1" class="form-label">Judul 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_1') is-invalid @enderror"
                               id="title_1" name="title_1" value="{{ old('title_1', $achievement->title_1) }}" required>
                        @error('title_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description_1" class="form-label">Deskripsi 1 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description_1') is-invalid @enderror"
                                  id="description_1" name="description_1" rows="3" required>{{ old('description_1', $achievement->description_1) }}</textarea>
                        @error('description_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Achievement 2 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-trophy me-2"></i>Achievement 2
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="icon_title_2" class="form-label">Icon 2 <span class="text-danger">*</span></label>
                        <select class="form-select @error('icon_title_2') is-invalid @enderror"
                                id="icon_title_2" name="icon_title_2" required>
                            <option value="">Pilih Icon</option>
                            @foreach($iconOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('icon_title_2', $achievement->icon_title_2) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('icon_title_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="title_2" class="form-label">Judul 2 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_2') is-invalid @enderror"
                               id="title_2" name="title_2" value="{{ old('title_2', $achievement->title_2) }}" required>
                        @error('title_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description_2" class="form-label">Deskripsi 2 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description_2') is-invalid @enderror"
                                  id="description_2" name="description_2" rows="3" required>{{ old('description_2', $achievement->description_2) }}</textarea>
                        @error('description_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Photo 1 Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Foto Achievement 1
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo_1" class="form-label">Foto Achievement 1</label>
                        <input type="file" class="form-control @error('photo_1') is-invalid @enderror"
                               id="photo_1" name="photo_1" accept="image/*">
                        <small class="text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 5MB. Kosongkan jika tidak ingin mengganti foto.</small>
                        @error('photo_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        @if($achievement->photo_1)
                        <label class="form-label">Foto Saat Ini</label>
                        <div>
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($achievement->photo_1) }}" alt="Current Photo 1" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($achievement->photo_1) }}" alt="Current Photo 1"
                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Achievement 3 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-trophy me-2"></i>Achievement 3
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="icon_title_3" class="form-label">Icon 3 <span class="text-danger">*</span></label>
                        <select class="form-select @error('icon_title_3') is-invalid @enderror"
                                id="icon_title_3" name="icon_title_3" required>
                            <option value="">Pilih Icon</option>
                            @foreach($iconOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('icon_title_3', $achievement->icon_title_3) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('icon_title_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="title_3" class="form-label">Judul 3 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_3') is-invalid @enderror"
                               id="title_3" name="title_3" value="{{ old('title_3', $achievement->title_3) }}" required>
                        @error('title_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description_3" class="form-label">Deskripsi 3 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description_3') is-invalid @enderror"
                                  id="description_3" name="description_3" rows="3" required>{{ old('description_3', $achievement->description_3) }}</textarea>
                        @error('description_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Achievement 4 -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-trophy me-2"></i>Achievement 4
                        </h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="icon_title_4" class="form-label">Icon 4 <span class="text-danger">*</span></label>
                        <select class="form-select @error('icon_title_4') is-invalid @enderror"
                                id="icon_title_4" name="icon_title_4" required>
                            <option value="">Pilih Icon</option>
                            @foreach($iconOptions as $value => $label)
                                <option value="{{ $value }}" {{ old('icon_title_4', $achievement->icon_title_4) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('icon_title_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="title_4" class="form-label">Judul 4 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title_4') is-invalid @enderror"
                               id="title_4" name="title_4" value="{{ old('title_4', $achievement->title_4) }}" required>
                        @error('title_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description_4" class="form-label">Deskripsi 4 <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description_4') is-invalid @enderror"
                                  id="description_4" name="description_4" rows="3" required>{{ old('description_4', $achievement->description_4) }}</textarea>
                        @error('description_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Photo 2 Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-image me-2"></i>Foto Achievement 2
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="photo_2" class="form-label">Foto Achievement 2</label>
                        <input type="file" class="form-control @error('photo_2') is-invalid @enderror"
                               id="photo_2" name="photo_2" accept="image/*">
                        <small class="text-muted">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 5MB. Kosongkan jika tidak ingin mengganti foto.</small>
                        @error('photo_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        @if($achievement->photo_2)
                        <label class="form-label">Foto Saat Ini</label>
                        <div>
                            {{-- BEFORE: Storage::url() --}}
                            {{-- <img src="{{ Storage::url($achievement->photo_2) }}" alt="Current Photo 2" --}}

                            {{-- AFTER: StorageHelper --}}
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($achievement->photo_2) }}" alt="Current Photo 2"
                                 class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
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
    // Preview image functionality for photo_1
    const imageInput1 = document.getElementById('photo_1');
    if (imageInput1) {
        imageInput1.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Create preview container if it doesn't exist
                let preview = document.getElementById('preview_photo_1');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'preview_photo_1';
                    preview.className = 'mt-2';
                    imageInput1.parentNode.appendChild(preview);
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <strong class="text-muted small">Preview Foto Baru:</strong><br>
                        <img src="${e.target.result}" alt="Preview"
                             class="img-thumbnail mt-1" style="max-width: 200px; max-height: 200px;">
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Preview image functionality for photo_2
    const imageInput2 = document.getElementById('photo_2');
    if (imageInput2) {
        imageInput2.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Create preview container if it doesn't exist
                let preview = document.getElementById('preview_photo_2');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.id = 'preview_photo_2';
                    preview.className = 'mt-2';
                    imageInput2.parentNode.appendChild(preview);
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <strong class="text-muted small">Preview Foto Baru:</strong><br>
                        <img src="${e.target.result}" alt="Preview"
                             class="img-thumbnail mt-1" style="max-width: 200px; max-height: 200px;">
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Icon preview functionality for select dropdowns
    const iconSelects = ['icon_title_1', 'icon_title_2', 'icon_title_3', 'icon_title_4'];

    iconSelects.forEach(selectId => {
        const select = document.getElementById(selectId);
        if (select) {
            // Create preview icon
            const previewIcon = document.createElement('i');
            previewIcon.className = 'ms-2';
            previewIcon.style.fontSize = '1.2em';
            select.parentNode.appendChild(previewIcon);

            // Update icon when selection changes
            select.addEventListener('change', function() {
                if (this.value) {
                    previewIcon.className = `${this.value} ms-2`;
                } else {
                    previewIcon.className = 'ms-2';
                }
            });

            // Show initial icon if value exists
            if (select.value) {
                previewIcon.className = `${select.value} ms-2`;
            }
        }
    });
});
</script>
@endpush