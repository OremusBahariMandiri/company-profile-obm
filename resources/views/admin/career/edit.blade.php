@extends('layouts.admin.app')

@section('title', 'Edit Lowongan Karir')

@section('content')
<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-edit me-2"></i>
            Edit Lowongan Karir
        </h2>
        <a href="{{ route('career.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <i class="fas fa-edit me-2"></i>Form Edit Lowongan Karir
        </div>
        <div class="card-body">
            <form action="{{ route('career.update', $career) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Basic Career Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi Dasar
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="careers_name" class="form-label">Nama Karir <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('careers_name') is-invalid @enderror"
                               id="careers_name" name="careers_name" value="{{ old('careers_name', $career->careers_name) }}" required
                               placeholder="Contoh: Maritime Operations Manager">
                        @error('careers_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="position" class="form-label">Posisi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                               id="position" name="position" value="{{ old('position', $career->position) }}" required
                               placeholder="Contoh: Manager">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="working_area" class="form-label">Area Kerja <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('working_area') is-invalid @enderror"
                               id="working_area" name="working_area" value="{{ old('working_area', $career->working_area) }}" required
                               placeholder="Contoh: Surabaya">
                        @error('working_area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $career->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $career->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                            <option value="closed" {{ old('status', $career->status) == 'closed' ? 'selected' : '' }}>Tutup</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4" required
                                  placeholder="Tulis deskripsi lengkap lowongan karir...">{{ old('description', $career->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="photo" class="form-label">Foto Karir</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               id="photo" name="photo" accept="image/*">
                        <div class="form-text">Maksimal 5MB. Format: JPG, JPEG, PNG, GIF. Kosongkan jika tidak ingin mengubah foto.</div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($career->photo)
                        <div class="mt-3 text-center">
                            <p class="small text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ Storage::url($career->photo) }}" alt="Current Career Photo"
                                 class="rounded border" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Career Period -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-calendar me-2"></i>Periode Lowongan
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                               id="start_date" name="start_date" value="{{ old('start_date', $career->start_date) }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label">Tanggal Berakhir</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                               id="end_date" name="end_date" value="{{ old('end_date', $career->end_date) }}">
                        <div class="form-text">Kosongkan jika lowongan terbuka tanpa batas waktu</div>
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sallary" class="form-label">Gaji</label>
                        <input type="text" class="form-control @error('sallary') is-invalid @enderror"
                               id="sallary" name="sallary" value="{{ old('sallary', $career->sallary) }}"
                               placeholder="Contoh: 5-8 juta atau Negotiable">
                        @error('sallary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Contact Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-phone me-2"></i>Informasi Kontak
                        </h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                               id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $career->contact_phone) }}"
                               placeholder="Contoh: +62 31 355 7115">
                        @error('contact_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contact_email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('contact_email') is-invalid @enderror"
                               id="contact_email" name="contact_email" value="{{ old('contact_email', $career->contact_email) }}"
                               placeholder="Contoh: hr@oremus.co.id">
                        @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr>

                <!-- Job Specifications -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h5 class="text-primary border-bottom pb-2">
                            <i class="fas fa-list me-2"></i>Spesifikasi Pekerjaan
                        </h5>
                        <p class="text-muted">Masukkan persyaratan, kualifikasi, atau tanggung jawab pekerjaan (maksimal 10 poin)</p>
                    </div>
                    @for($i = 1; $i <= 10; $i++)
                    <div class="col-md-6 mb-3">
                        <label for="spesification_{{ $i }}" class="form-label">Spesifikasi {{ $i }}{{ $i <= 3 ? ' *' : '' }}</label>
                        <input type="text" class="form-control @error('spesification_'.$i) is-invalid @enderror"
                               id="spesification_{{ $i }}" name="spesification_{{ $i }}" value="{{ old('spesification_'.$i, $career->{'spesification_'.$i}) }}"
                               placeholder="Contoh: S1 Maritime Engineering atau 5+ tahun pengalaman"
                               {{ $i <= 3 ? 'required' : '' }}>
                        @error('spesification_'.$i)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endfor
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('career.index') }}" class="btn btn-secondary">
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
        const maxLength = 1000;

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

    // End date validation
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');

    if (startDate && endDate) {
        startDate.addEventListener('change', function() {
            endDate.min = this.value;
            if (endDate.value && endDate.value < this.value) {
                endDate.value = '';
            }
        });
    }
});
</script>
@endpush