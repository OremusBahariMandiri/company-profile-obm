@extends('layouts.admin.app')

@section('title', 'Tambah Kantor')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-plus me-2"></i>
            Tambah Kantor
        </h2>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Tambah Kantor
        </div>
        <div class="card-body">
            <form action="{{ route('branches.store') }}" method="POST">
                @csrf

                <!-- Branch Info Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi Kantor
                        </h5>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="branch_name" class="form-label">Nama Kantor <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('branch_name') is-invalid @enderror"
                               id="branch_name" name="branch_name" value="{{ old('branch_name') }}" required
                               placeholder="Contoh: Headquarters - Surabaya Maritime Center">
                        <div class="form-text">Masukkan nama lengkap kantor atau cabang</div>
                        @error('branch_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status" class="form-label">Status Kantor <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="main_office" {{ old('status') == 'main_office' ? 'selected' : '' }}>
                                Kantor Pusat
                            </option>
                            <option value="branch" {{ old('status') == 'branch' ? 'selected' : '' }}>
                                Kantor Cabang
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                                  id="address" name="address" rows="4" required
                                  placeholder="Masukkan alamat lengkap kantor...">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Contact Info Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-address-book me-2"></i>Informasi Kontak
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pic" class="form-label">PIC (Person In Charge) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pic') is-invalid @enderror"
                               id="pic" name="pic" value="{{ old('pic') }}" required
                               placeholder="Contoh: Mr. Alexander">
                        @error('pic')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile_phone_number" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('mobile_phone_number') is-invalid @enderror"
                               id="mobile_phone_number" name="mobile_phone_number" value="{{ old('mobile_phone_number') }}" required
                               placeholder="Contoh: +62 31 355 7115">
                        @error('mobile_phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_1" class="form-label">Email Utama <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email_1') is-invalid @enderror"
                               id="email_1" name="email_1" value="{{ old('email_1') }}" required
                               placeholder="Contoh: commercial@oremus.co.id">
                        @error('email_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_2" class="form-label">Email Kedua (Opsional)</label>
                        <input type="email" class="form-control @error('email_2') is-invalid @enderror"
                               id="email_2" name="email_2" value="{{ old('email_2') }}"
                               placeholder="Contoh: agency@oremus.co.id">
                        <div class="form-text">Email tambahan (bisa dikosongkan)</div>
                        @error('email_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Preview Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-desktop me-2"></i>Preview Website
                        </h5>
                        <div class="alert alert-info">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-info-circle me-2"></i>Cara Tampil di Website:
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-success">
                                        <i class="fas fa-home me-1"></i>Kantor Pusat:
                                    </h6>
                                    <ul class="small mb-0">
                                        <li>Ditampilkan di bagian atas dengan foto kantor</li>
                                        <li>Layout khusus dengan gambar dan informasi lengkap</li>
                                        <li>Hanya boleh ada satu kantor pusat</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-info">
                                        <i class="fas fa-code-branch me-1"></i>Kantor Cabang:
                                    </h6>
                                    <ul class="small mb-0">
                                        <li>Ditampilkan dalam bentuk card grid</li>
                                        <li>Informasi kontak lengkap dalam card</li>
                                        <li>Bisa ada beberapa kantor cabang</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="preview-container" id="previewContainer" style="display: none;">
                            <!-- Preview will be generated here -->
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                    <a href="{{ route('branches.index') }}" class="btn btn-secondary">
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
    const form = document.querySelector('form');
    const previewContainer = document.getElementById('previewContainer');
    const statusSelect = document.getElementById('status');

    // Update preview when form data changes
    form.addEventListener('input', updatePreview);
    form.addEventListener('change', updatePreview);

    function updatePreview() {
        const formData = new FormData(form);
        const data = {
            branch_name: formData.get('branch_name'),
            address: formData.get('address'),
            pic: formData.get('pic'),
            mobile_phone_number: formData.get('mobile_phone_number'),
            email_1: formData.get('email_1'),
            email_2: formData.get('email_2'),
            status: formData.get('status')
        };

        if (data.branch_name && data.address && data.pic && data.mobile_phone_number && data.email_1 && data.status) {
            generatePreview(data);
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }

    function generatePreview(data) {
        let previewHtml = '';

        if (data.status === 'main_office') {
            previewHtml = `
                <div class="alert alert-success">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-home me-2"></i>Preview Kantor Pusat:
                    </h6>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('images/kantor.jpeg') }}" alt="Main Office"
                                         class="img-fluid h-100 w-100" style="object-fit: cover; height: 200px;">
                                </div>
                                <div class="col-md-7">
                                    <div class="p-3">
                                        <h5 class="mb-3 text-primary">
                                            <i class="fas fa-building me-2"></i>${data.branch_name}
                                        </h5>
                                        <div class="contact-item mb-2">
                                            <i class="fas fa-map-marker-alt me-2 text-success"></i>
                                            <small>${data.address}</small>
                                        </div>
                                        <div class="contact-item mb-2">
                                            <i class="fas fa-user me-2 text-success"></i>
                                            <small>${data.pic} (PIC)</small>
                                        </div>
                                        <div class="contact-item mb-2">
                                            <i class="fas fa-phone me-2 text-success"></i>
                                            <small>${data.mobile_phone_number}</small>
                                        </div>
                                        <div class="contact-item mb-2">
                                            <i class="fas fa-envelope me-2 text-success"></i>
                                            <small>${data.email_1}</small>
                                        </div>
                                        ${data.email_2 ? `
                                        <div class="contact-item">
                                            <i class="fas fa-envelope me-2 text-success"></i>
                                            <small>${data.email_2}</small>
                                        </div>
                                        ` : ''}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        } else {
            previewHtml = `
                <div class="alert alert-info">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-code-branch me-2"></i>Preview Kantor Cabang:
                    </h6>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-primary">
                                    <i class="fas fa-anchor me-2"></i>${data.branch_name}
                                </h6>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-map-marker-alt text-muted"></i>
                                    <small class="ms-2">${data.address}</small>
                                </div>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-user text-muted"></i>
                                    <small class="ms-2">${data.pic} (PIC)</small>
                                </div>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-phone text-muted"></i>
                                    <small class="ms-2">${data.mobile_phone_number}</small>
                                </div>
                                <div class="contact-item mb-2">
                                    <i class="fas fa-envelope text-muted"></i>
                                    <small class="ms-2">${data.email_1}</small>
                                </div>
                                ${data.email_2 ? `
                                <div class="contact-item">
                                    <i class="fas fa-envelope text-muted"></i>
                                    <small class="ms-2">${data.email_2}</small>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        previewContainer.innerHTML = previewHtml;
    }

    // Status change validation
    statusSelect.addEventListener('change', function() {
        if (this.value === 'main_office') {
            // Could add AJAX check for existing main office here
            console.log('Main office selected');
        }
    });
});
</script>
@endpush