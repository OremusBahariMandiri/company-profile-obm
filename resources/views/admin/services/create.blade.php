@extends('layouts.admin.app')

@section('title', 'Tambah Layanan')


@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-plus me-2"></i>
            Tambah Layanan
        </h2>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row">
        <!-- Form Section -->
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-edit me-2"></i>Form Tambah Layanan
                </div>
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST" id="serviceForm">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required
                                   placeholder="Contoh: Ship Handling">
                            <div class="form-text">Nama layanan yang akan ditampilkan di website</div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="icon" class="form-label">Icon Layanan <span class="text-danger">*</span></label>
                            <select class="form-select @error('icon') is-invalid @enderror"
                                    id="icon" name="icon" required>
                                <option value="">-- Pilih Icon --</option>
                                @foreach($iconOptions as $iconClass => $iconName)
                                    <option value="{{ $iconClass }}" {{ old('icon') == $iconClass ? 'selected' : '' }}>
                                        {{ $iconName }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Pilih icon yang sesuai dengan layanan</div>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="color" class="form-label">Warna Tema <span class="text-danger">*</span></label>
                            <select class="form-select @error('color') is-invalid @enderror"
                                    id="color" name="color" required>
                                <option value="">-- Pilih Warna --</option>
                                @foreach($colorOptions as $colorValue => $colorName)
                                    <option value="{{ $colorValue }}" {{ old('color') == $colorValue ? 'selected' : '' }}>
                                        {{ $colorName }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Pilih warna tema untuk layanan ini</div>
                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="6" required
                                      placeholder="Tulis deskripsi lengkap tentang layanan ini...">{{ old('description') }}</textarea>
                            <div class="form-text">
                                <span id="charCount">0</span>/500 karakter. Jelaskan detail layanan yang disediakan.
                            </div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan
                            </button>
                            <a href="{{ route('services.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-eye me-2"></i>Preview Layanan
                </div>
                <div class="card-body text-center">
                    <!-- Icon Preview -->
                    <div class="service-icon-preview mb-3">
                        <i id="previewIcon" class="fas fa-cog text-muted" style="font-size: 3rem;"></i>
                    </div>

                    <!-- Name Preview -->
                    <h5 id="previewName" class="text-primary mb-3">Nama Layanan</h5>

                    <!-- Description Preview -->
                    <p id="previewDescription" class="text-muted small">
                        Deskripsi layanan akan muncul di sini...
                    </p>

                    <hr>

                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Preview akan update otomatis saat Anda mengisi form
                    </small>
                </div>
            </div>

            <!-- Icon Categories -->
            <div class="dashboard-card mt-4">
                <div class="card-header bg-secondary text-white">
                    <i class="fas fa-icons me-2"></i>Kategori Icon
                </div>
                <div class="card-body">
                    <div class="icon-categories">
                        <div class="mb-3">
                            <h6 class="text-primary">Maritime & Shipping:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark"><i class="fas fa-ship me-1"></i>Ship</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-anchor me-1"></i>Anchor</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-compass me-1"></i>Compass</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-success">Logistics & Supply:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark"><i class="fas fa-box me-1"></i>Box</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-truck me-1"></i>Truck</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-dolly me-1"></i>Dolly</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-danger">Medical & Emergency:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark"><i class="fas fa-ambulance me-1"></i>Ambulance</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-heartbeat me-1"></i>Heartbeat</span>
                            </div>
                        </div>

                        <div>
                            <h6 class="text-warning">Crew & People:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark"><i class="fas fa-users me-1"></i>Users</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-hard-hat me-1"></i>Worker</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.service-icon-preview {
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
    border-radius: 50%;
    width: 100px;
    margin: 0 auto;
    border: 2px solid #1a4b78;
    transition: all 0.3s ease;
}

.icon-categories .badge {
    font-size: 0.8rem;
    border: 1px solid #dee2e6;
}

.card-header.bg-info {
    background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
}

.card-header.bg-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%) !important;
}

#previewDescription {
    min-height: 60px;
    max-height: 120px;
    overflow-y: auto;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const iconSelect = document.getElementById('icon');
    const colorSelect = document.getElementById('color');
    const descriptionTextarea = document.getElementById('description');

    const previewIcon = document.getElementById('previewIcon');
    const previewName = document.getElementById('previewName');
    const previewDescription = document.getElementById('previewDescription');
    const charCount = document.getElementById('charCount');

    // Update preview on input changes
    nameInput.addEventListener('input', function() {
        previewName.textContent = this.value || 'Nama Layanan';
    });

    iconSelect.addEventListener('change', function() {
        updatePreviewIcon();
    });

    colorSelect.addEventListener('change', function() {
        updatePreviewIcon();
    });

    function updatePreviewIcon() {
        const iconClass = iconSelect.value || 'fa-cog';
        const colorClass = colorSelect.value ? `text-${colorSelect.value}` : 'text-muted';
        previewIcon.className = `fas ${iconClass} ${colorClass}`;
    }

    descriptionTextarea.addEventListener('input', function() {
        const text = this.value || 'Deskripsi layanan akan muncul di sini...';
        previewDescription.textContent = text;

        // Update character count
        charCount.textContent = this.value.length;

        // Change color based on length
        if (this.value.length > 500) {
            charCount.className = 'text-danger fw-bold';
        } else if (this.value.length > 400) {
            charCount.className = 'text-warning fw-bold';
        } else {
            charCount.className = 'text-success';
        }
    });

    // Icon search functionality
    const iconSearchInput = document.createElement('input');
    iconSearchInput.type = 'text';
    iconSearchInput.className = 'form-control mb-2';
    iconSearchInput.placeholder = 'Cari icon...';

    // Insert search input before select
    iconSelect.parentNode.insertBefore(iconSearchInput, iconSelect);

    iconSearchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const options = iconSelect.querySelectorAll('option');

        options.forEach(option => {
            if (option.value === '') return; // Skip empty option

            const optionText = option.textContent.toLowerCase();
            const optionValue = option.value.toLowerCase();

            if (optionText.includes(searchTerm) || optionValue.includes(searchTerm)) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        });
    });
});
</script>
@endpush