@extends('layouts.admin.app')

@section('title', 'Edit Kantor')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Kantor
        </h2>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Kantor - {{ $branch->branch_name }}
        </div>
        <div class="card-body">
            <form action="{{ route('branches.update', $branch) }}" method="POST">
                @csrf
                @method('PUT')

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
                               id="branch_name" name="branch_name" value="{{ old('branch_name', $branch->branch_name) }}" required
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
                            <option value="main_office" {{ old('status', $branch->status) == 'main_office' ? 'selected' : '' }}>
                                Kantor Pusat
                            </option>
                            <option value="branch" {{ old('status', $branch->status) == 'branch' ? 'selected' : '' }}>
                                Kantor Cabang
                            </option>
                        </select>
                        <div class="form-text">
                            Status saat ini:
                            <span class="badge {{ $branch->status === 'main_office' ? 'bg-success' : 'bg-info' }}">
                                {{ App\Http\Controllers\Admin\BranchController::getStatusName($branch->status) }}
                            </span>
                        </div>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                                  id="address" name="address" rows="4" required
                                  placeholder="Masukkan alamat lengkap kantor...">{{ old('address', $branch->address) }}</textarea>
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
                               id="pic" name="pic" value="{{ old('pic', $branch->pic) }}" required
                               placeholder="Contoh: Mr. Alexander">
                        @error('pic')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mobile_phone_number" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('mobile_phone_number') is-invalid @enderror"
                               id="mobile_phone_number" name="mobile_phone_number" value="{{ old('mobile_phone_number', $branch->mobile_phone_number) }}" required
                               placeholder="Contoh: +62 31 355 7115">
                        @error('mobile_phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_1" class="form-label">Email Utama <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email_1') is-invalid @enderror"
                               id="email_1" name="email_1" value="{{ old('email_1', $branch->email_1) }}" required
                               placeholder="Contoh: commercial@oremus.co.id">
                        @error('email_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_2" class="form-label">Email Kedua (Opsional)</label>
                        <input type="email" class="form-control @error('email_2') is-invalid @enderror"
                               id="email_2" name="email_2" value="{{ old('email_2', $branch->email_2) }}"
                               placeholder="Contoh: agency@oremus.co.id">
                        <div class="form-text">Email tambahan (bisa dikosongkan)</div>
                        @error('email_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Current Status Info -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi Status
                        </h5>
                        <div class="alert alert-light">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Status Saat Ini:</h6>
                                    <p class="mb-0">
                                        <span class="badge {{ $branch->status === 'main_office' ? 'bg-success' : 'bg-info' }} fs-6">
                                            {{ App\Http\Controllers\Admin\BranchController::getStatusName($branch->status) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Terakhir Update:</h6>
                                    <p class="mb-0 text-muted">{{ $branch->updated_at->format('d F Y, H:i') }} WIB</p>
                                </div>
                            </div>
                        </div>

                        @if($branch->status === 'main_office')
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Perhatian:</strong> Ini adalah Kantor Pusat. Perubahan status akan mempengaruhi tampilan utama website.
                            </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Preview Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-desktop me-2"></i>Preview Website
                        </h5>
                        <div class="preview-container" id="previewContainer">
                            <!-- Current preview -->
                            @if($branch->status === 'main_office')
                                <div class="alert alert-success">
                                    <h6 class="fw-bold mb-3">
                                        <i class="fas fa-home me-2"></i>Tampilan Kantor Pusat Saat Ini:
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
                                                            <i class="fas fa-building me-2"></i>{{ $branch->branch_name }}
                                                        </h5>
                                                        <div class="contact-item mb-2">
                                                            <i class="fas fa-map-marker-alt me-2 text-success"></i>
                                                            <small>{{ $branch->address }}</small>
                                                        </div>
                                                        <div class="contact-item mb-2">
                                                            <i class="fas fa-user me-2 text-success"></i>
                                                            <small>{{ $branch->pic }} (PIC)</small>
                                                        </div>
                                                        <div class="contact-item mb-2">
                                                            <i class="fas fa-phone me-2 text-success"></i>
                                                            <small>{{ $branch->mobile_phone_number }}</small>
                                                        </div>
                                                        <div class="contact-item mb-2">
                                                            <i class="fas fa-envelope me-2 text-success"></i>
                                                            <small>{{ $branch->email_1 }}</small>
                                                        </div>
                                                        @if($branch->email_2)
                                                        <div class="contact-item">
                                                            <i class="fas fa-envelope me-2 text-success"></i>
                                                            <small>{{ $branch->email_2 }}</small>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <h6 class="fw-bold mb-3">
                                        <i class="fas fa-code-branch me-2"></i>Tampilan Kantor Cabang Saat Ini:
                                    </h6>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-primary">
                                                    <i class="fas fa-anchor me-2"></i>{{ $branch->branch_name }}
                                                </h6>
                                                <div class="contact-item mb-2">
                                                    <i class="fas fa-map-marker-alt text-muted"></i>
                                                    <small class="ms-2">{{ $branch->address }}</small>
                                                </div>
                                                <div class="contact-item mb-2">
                                                    <i class="fas fa-user text-muted"></i>
                                                    <small class="ms-2">{{ $branch->pic }} (PIC)</small>
                                                </div>
                                                <div class="contact-item mb-2">
                                                    <i class="fas fa-phone text-muted"></i>
                                                    <small class="ms-2">{{ $branch->mobile_phone_number }}</small>
                                                </div>
                                                <div class="contact-item mb-2">
                                                    <i class="fas fa-envelope text-muted"></i>
                                                    <small class="ms-2">{{ $branch->email_1 }}</small>
                                                </div>
                                                @if($branch->email_2)
                                                <div class="contact-item">
                                                    <i class="fas fa-envelope text-muted"></i>
                                                    <small class="ms-2">{{ $branch->email_2 }}</small>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
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