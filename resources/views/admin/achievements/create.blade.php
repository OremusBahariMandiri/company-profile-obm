@extends('layouts.admin.app')

@section('title', 'Tambah Achievement')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-plus me-2"></i>
            Tambah Achievement
        </h2>
        <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-12">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Form Tambah Achievement
                </div>
                <div class="card-body">
                    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data" id="achievementForm">
                        @csrf

                        <!-- Achievement 1 -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-primary border-bottom pb-2 mb-4">
                                <i class="fas fa-trophy me-2"></i>Achievement 1
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon_title_1" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" id="iconSearch1" placeholder="Cari icon...">
                                    <select class="form-select @error('icon_title_1') is-invalid @enderror"
                                            id="icon_title_1" name="icon_title_1" required>
                                        <option value="">-- Pilih Icon --</option>
                                        @foreach($iconOptions as $value => $label)
                                            <option value="{{ $value }}" {{ old('icon_title_1') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">Icon yang mewakili achievement ini</div>
                                    @error('icon_title_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_1" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_1') is-invalid @enderror"
                                           id="title_1" name="title_1" value="{{ old('title_1') }}" required
                                           placeholder="Contoh: Growth Trend in 2022">
                                    <div class="form-text">Judul singkat untuk achievement</div>
                                    @error('title_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description_1" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description_1') is-invalid @enderror"
                                          id="description_1" name="description_1" rows="3" required
                                          placeholder="Jelaskan detail achievement ini...">{{ old('description_1') }}</textarea>
                                <div class="form-text">
                                    <span id="charCount1">0</span>/300 karakter
                                </div>
                                @error('description_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Achievement 2 -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-success border-bottom pb-2 mb-4">
                                <i class="fas fa-trophy me-2"></i>Achievement 2
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon_title_2" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" id="iconSearch2" placeholder="Cari icon...">
                                    <select class="form-select @error('icon_title_2') is-invalid @enderror"
                                            id="icon_title_2" name="icon_title_2" required>
                                        <option value="">-- Pilih Icon --</option>
                                        @foreach($iconOptions as $value => $label)
                                            <option value="{{ $value }}" {{ old('icon_title_2') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('icon_title_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_2" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_2') is-invalid @enderror"
                                           id="title_2" name="title_2" value="{{ old('title_2') }}" required
                                           placeholder="Contoh: Market Leadership">
                                    @error('title_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description_2" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description_2') is-invalid @enderror"
                                          id="description_2" name="description_2" rows="3" required
                                          placeholder="Jelaskan detail achievement ini...">{{ old('description_2') }}</textarea>
                                <div class="form-text">
                                    <span id="charCount2">0</span>/300 karakter
                                </div>
                                @error('description_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Photo 1 Section -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-info border-bottom pb-2 mb-4">
                                <i class="fas fa-image me-2"></i>Foto Achievement 1
                            </h5>
                            <div class="mb-3">
                                <label for="photo_1" class="form-label">Upload Foto <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('photo_1') is-invalid @enderror"
                                       id="photo_1" name="photo_1" accept="image/*" required>
                                <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 5MB.</div>
                                @error('photo_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Achievement 3 -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-warning border-bottom pb-2 mb-4">
                                <i class="fas fa-trophy me-2"></i>Achievement 3
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon_title_3" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" id="iconSearch3" placeholder="Cari icon...">
                                    <select class="form-select @error('icon_title_3') is-invalid @enderror"
                                            id="icon_title_3" name="icon_title_3" required>
                                        <option value="">-- Pilih Icon --</option>
                                        @foreach($iconOptions as $value => $label)
                                            <option value="{{ $value }}" {{ old('icon_title_3') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('icon_title_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_3" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_3') is-invalid @enderror"
                                           id="title_3" name="title_3" value="{{ old('title_3') }}" required
                                           placeholder="Contoh: Global Operations">
                                    @error('title_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description_3" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description_3') is-invalid @enderror"
                                          id="description_3" name="description_3" rows="3" required
                                          placeholder="Jelaskan detail achievement ini...">{{ old('description_3') }}</textarea>
                                <div class="form-text">
                                    <span id="charCount3">0</span>/300 karakter
                                </div>
                                @error('description_3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Achievement 4 -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-secondary border-bottom pb-2 mb-4">
                                <i class="fas fa-trophy me-2"></i>Achievement 4
                            </h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon_title_4" class="form-label">Icon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" id="iconSearch4" placeholder="Cari icon...">
                                    <select class="form-select @error('icon_title_4') is-invalid @enderror"
                                            id="icon_title_4" name="icon_title_4" required>
                                        <option value="">-- Pilih Icon --</option>
                                        @foreach($iconOptions as $value => $label)
                                            <option value="{{ $value }}" {{ old('icon_title_4') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('icon_title_4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title_4" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_4') is-invalid @enderror"
                                           id="title_4" name="title_4" value="{{ old('title_4') }}" required
                                           placeholder="Contoh: Sustainability Focus">
                                    @error('title_4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description_4" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description_4') is-invalid @enderror"
                                          id="description_4" name="description_4" rows="3" required
                                          placeholder="Jelaskan detail achievement ini...">{{ old('description_4') }}</textarea>
                                <div class="form-text">
                                    <span id="charCount4">0</span>/300 karakter
                                </div>
                                @error('description_4')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Photo 2 Section -->
                        <div class="achievement-section mb-5">
                            <h5 class="text-info border-bottom pb-2 mb-4">
                                <i class="fas fa-image me-2"></i>Foto Achievement 2
                            </h5>
                            <div class="mb-3">
                                <label for="photo_2" class="form-label">Upload Foto <span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('photo_2') is-invalid @enderror"
                                       id="photo_2" name="photo_2" accept="image/*" required>
                                <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 5MB.</div>
                                @error('photo_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Achievement
                            </button>
                            <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.achievement-section {
    background: linear-gradient(135deg, #f8f9ff 0%, #e3f2fd 100%);
    border-radius: 10px;
    padding: 20px;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.achievement-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.achievement-image-preview {
    height: 120px;
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
    border: 2px dashed #007bff;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.achievement-image-preview.has-image {
    border-style: solid;
    padding: 5px;
}

.achievement-image-preview img {
    max-width: 100%;
    max-height: 110px;
    border-radius: 4px;
    object-fit: cover;
}

.achievement-preview-item {
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.achievement-preview-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.preview-icon {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.preview-title {
    color: #333;
    font-weight: 600;
}

.preview-desc {
    line-height: 1.4;
    font-size: 0.85rem;
}

.card-header.bg-info {
    background: linear-gradient(135deg, #17a2b8 0%, #007bff 100%) !important;
}

.sticky-top {
    z-index: 1020;
}

/* Character count styling */
.form-text .text-danger {
    font-weight: bold;
}

.form-text .text-warning {
    font-weight: bold;
}

.form-text .text-success {
    color: #28a745 !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Icon search functionality
    function setupIconSearch(searchId, selectId) {
        const searchInput = document.getElementById(searchId);
        const select = document.getElementById(selectId);

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const options = select.querySelectorAll('option');

            options.forEach(option => {
                if (option.value === '') return;

                const optionText = option.textContent.toLowerCase();
                const optionValue = option.value.toLowerCase();

                if (optionText.includes(searchTerm) || optionValue.includes(searchTerm)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        });
    }

    // Setup icon search for all selects
    setupIconSearch('iconSearch1', 'icon_title_1');
    setupIconSearch('iconSearch2', 'icon_title_2');
    setupIconSearch('iconSearch3', 'icon_title_3');
    setupIconSearch('iconSearch4', 'icon_title_4');

    // Preview functionality
    function updatePreview(num) {
        const iconSelect = document.getElementById(`icon_title_${num}`);
        const titleInput = document.getElementById(`title_${num}`);
        const descInput = document.getElementById(`description_${num}`);

        const previewElement = document.getElementById(`preview${num}`);
        const previewIcon = previewElement.querySelector('.preview-icon i');
        const previewTitle = previewElement.querySelector('.preview-title');
        const previewDesc = previewElement.querySelector('.preview-desc');

        // Update icon
        iconSelect.addEventListener('change', function() {
            const iconClass = this.value || 'fa-trophy';
            previewIcon.className = `fas ${iconClass} ${previewIcon.className.split(' ').pop()}`;
        });

        // Update title
        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value || `Achievement ${num}`;
        });

        // Update description
        descInput.addEventListener('input', function() {
            previewDesc.textContent = this.value || 'Deskripsi akan muncul di sini';

            // Update character count
            const charCount = document.getElementById(`charCount${num}`);
            const length = this.value.length;
            charCount.textContent = length;

            // Update character count color
            charCount.className = length > 300 ? 'text-danger' :
                                   length > 250 ? 'text-warning' : 'text-success';
        });
    }

    // Setup preview for all achievements
    for (let i = 1; i <= 4; i++) {
        updatePreview(i);
    }

    // Image preview functionality for photo_1
    const imageInput1 = document.getElementById('photo_1');
    const imagePreview1 = document.getElementById('imagePreview1');

    imageInput1.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview1.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 110px; object-fit: cover; border-radius: 4px;">
                `;
                imagePreview1.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }
    });

    // Image preview functionality for photo_2
    const imageInput2 = document.getElementById('photo_2');
    const imagePreview2 = document.getElementById('imagePreview2');

    imageInput2.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview2.innerHTML = `
                    <img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 110px; object-fit: cover; border-radius: 4px;">
                `;
                imagePreview2.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }
    });

    // Form validation enhancement
    const form = document.getElementById('achievementForm');
    form.addEventListener('submit', function(e) {
        let hasErrors = false;

        // Validate character limits
        for (let i = 1; i <= 4; i++) {
            const descInput = document.getElementById(`description_${i}`);
            if (descInput.value.length > 300) {
                hasErrors = true;
                descInput.classList.add('is-invalid');

                // Create or update error message
                let errorDiv = descInput.parentNode.querySelector('.char-limit-error');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback char-limit-error';
                    descInput.parentNode.appendChild(errorDiv);
                }
                errorDiv.textContent = 'Deskripsi tidak boleh lebih dari 300 karakter.';
            } else {
                descInput.classList.remove('is-invalid');
                const errorDiv = descInput.parentNode.querySelector('.char-limit-error');
                if (errorDiv) errorDiv.remove();
            }
        }

        if (hasErrors) {
            e.preventDefault();
            alert('Mohon periksa kembali form. Beberapa deskripsi melebihi batas karakter.');
        }
    });
});
</script>
@endpush