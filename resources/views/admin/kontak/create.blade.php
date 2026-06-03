@extends('layouts.admin')

@section('title', 'Tambah Info Kontak')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.kontak-info.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Tambah Info Kontak</h5>
</div>

<div class="form-card" style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px;">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- FORM UTAMA -->
        <div class="col-lg-8">
            <form action="{{ route('admin.kontak-info.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tipe Informasi Kontak <span class="text-danger">*</span></label>
                        <select name="tipe" class="form-select" required id="tipeSelect" style="padding: 12px; border-radius: 8px;">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="alamat" {{ old('tipe') == 'alamat' ? 'selected' : '' }}>Alamat</option>
                            <option value="telepon" {{ old('tipe') == 'telepon' ? 'selected' : '' }}>Telepon</option>
                            <option value="email" {{ old('tipe') == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="sosial_media" {{ old('tipe') == 'sosial_media' ? 'selected' : '' }}>Sosial Media</option>
                            <option value="jam_operasional" {{ old('tipe') == 'jam_operasional' ? 'selected' : '' }}>Jam Operasional</option>
                        </select>
                        <small class="text-muted">Pilih kategori informasi yang ingin Anda tambahkan.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold" id="labelName">Label / Keterangan <small class="text-muted">(opsional)</small></label>
                        <input type="text" name="label" class="form-control" value="{{ old('label') }}" placeholder="Contoh: Kantor Utama, Instagram, Senin - Jumat" id="labelInput" style="padding: 12px; border-radius: 8px;">
                        <small class="text-muted" id="labelHint">Label opsional untuk memperjelas informasi ini.</small>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold" id="nilaiName">Nilai Utama <span class="text-danger">*</span></label>
                        <input type="text" name="nilai" class="form-control" value="{{ old('nilai') }}" placeholder="Contoh: +62 812 3456 7890, info@geotoba.com" required id="nilaiInput" style="padding: 12px; border-radius: 8px;">
                        <small class="text-muted d-block mt-1" id="nilaiHint"></small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Urutan Tampilan</label>
                        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0" style="padding: 12px; border-radius: 8px;">
                        <small class="text-muted">Angka lebih kecil akan ditampilkan lebih dahulu.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="isActive">Aktifkan (Tampilkan di Website)</label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4" style="border-radius: 8px; padding: 10px 20px;">Simpan Informasi</button>
                    <a href="{{ route('admin.kontak-info.index') }}" class="btn btn-secondary px-4" style="border-radius: 8px; padding: 10px 20px;">Batal</a>
                </div>
            </form>
        </div>

        <!-- PANDUAN PENGISIAN DINAMIS -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; background-color: #f8fafc; border: 1px solid #e2e8f0 !important;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-primary mb-3"><i class="fas fa-lightbulb me-2"></i> Petunjuk Pengisian</h6>
                    <div id="guideContent">
                        <p class="text-muted small mb-0">Silakan pilih <strong>Tipe Informasi Kontak</strong> terlebih dahulu untuk melihat panduan pengisian form yang tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('tipeSelect').addEventListener('change', function() {
        const tipe = this.value;
        const labelName = document.getElementById('labelName');
        const labelInput = document.getElementById('labelInput');
        const labelHint = document.getElementById('labelHint');
        const nilaiName = document.getElementById('nilaiName');
        const nilaiInput = document.getElementById('nilaiInput');
        const nilaiHint = document.getElementById('nilaiHint');
        const guideContent = document.getElementById('guideContent');

        if (!tipe) {
            labelName.innerHTML = 'Label / Keterangan <small class="text-muted">(opsional)</small>';
            labelInput.placeholder = 'Contoh: Kantor Utama, Instagram, Senin - Jumat';
            labelHint.textContent = 'Label opsional untuk memperjelas informasi ini.';
            nilaiName.innerHTML = 'Nilai Utama <span class="text-danger">*</span>';
            nilaiInput.placeholder = 'Masukkan nilai informasi...';
            nilaiHint.textContent = '';
            guideContent.innerHTML = '<p class="text-muted small mb-0">Silakan pilih <strong>Tipe Informasi Kontak</strong> terlebih dahulu untuk melihat panduan pengisian form yang tepat.</p>';
            return;
        }

        const config = {
            'alamat': {
                label: 'Nama Lokasi <small class="text-muted">(opsional)</small>',
                labelPlaceholder: 'Contoh: Kantor Pusat, Geosite Sibaganding',
                labelHint: 'Masukkan nama/keterangan lokasi jika perlu.',
                nilai: 'Alamat Lengkap <span class="text-danger">*</span>',
                nilaiPlaceholder: 'Contoh: Jl. Danau Toba No. 12, Sibaganding, Sumatera Utara',
                nilaiHint: 'Pastikan alamat lengkap ditulis dengan jelas agar mudah dicari.',
                guide: `
                    <div class="small">
                        <p class="mb-2"><strong>Untuk Alamat:</strong></p>
                        <ul class="ps-3 mb-0" style="padding-left: 20px;">
                            <li class="mb-2"><strong>Label</strong> diisi nama tempatnya (misal: <em>Kantor Pusat</em> atau <em>Pusat Informasi</em>).</li>
                            <li class="mb-2"><strong>Nilai Utama</strong> diisi alamat lengkap tempat tersebut.</li>
                            <li>Tipe alamat ini akan otomatis tampil dengan ikon <i class="fas fa-map-marker-alt text-primary"></i> di website.</li>
                        </ul>
                    </div>
                `
            },
            'telepon': {
                label: 'Nama Pemilik Nomor <small class="text-muted">(opsional)</small>',
                labelPlaceholder: 'Contoh: Pak Andi, Customer Service, Hotline',
                labelHint: 'Tulis nama kontak atau divisi pemilik nomor ini.',
                nilai: 'Nomor Telepon <span class="text-danger">*</span>',
                nilaiPlaceholder: 'Contoh: +62 852-6485-9766',
                nilaiHint: 'Masukkan nomor telepon lengkap beserta kode negaranya jika perlu.',
                guide: `
                    <div class="small">
                        <p class="mb-2"><strong>Untuk Telepon:</strong></p>
                        <ul class="ps-3 mb-0" style="padding-left: 20px;">
                            <li class="mb-2"><strong>Label</strong> diisi nama penanggung jawab atau bagian (misal: <em>Pak Andi (Pengelola)</em>).</li>
                            <li class="mb-2"><strong>Nilai Utama</strong> diisi nomor HP/Telepon aktif.</li>
                            <li>Tipe telepon akan otomatis tampil dengan ikon <i class="fas fa-phone-alt text-success"></i> di website.</li>
                        </ul>
                    </div>
                `
            },
            'email': {
                label: 'Tujuan Email <small class="text-muted">(opsional)</small>',
                labelPlaceholder: 'Contoh: Hubungan Media, Kerjasama, Dukungan Teknis',
                labelHint: 'Tulis keterangan peruntukan email ini.',
                nilai: 'Alamat Email <span class="text-danger">*</span>',
                nilaiPlaceholder: 'Contoh: info@geotoba.com, reservasi@geotoba.com',
                nilaiHint: 'Gunakan alamat email resmi instansi/wisata.',
                guide: `
                    <div class="small">
                        <p class="mb-2"><strong>Untuk Email:</strong></p>
                        <ul class="ps-3 mb-0" style="padding-left: 20px;">
                            <li class="mb-2"><strong>Label</strong> diisi keterangan (misal: <em>Layanan Pengunjung</em>).</li>
                            <li class="mb-2"><strong>Nilai Utama</strong> diisi email tujuan dengan format valid.</li>
                            <li>Tipe email akan otomatis tampil dengan ikon <i class="fas fa-envelope text-info"></i> di website.</li>
                        </ul>
                    </div>
                `
            },
            'sosial_media': {
                label: 'Nama Platform Media Sosial <span class="text-danger">*</span>',
                labelPlaceholder: 'Contoh: Instagram, Facebook, TikTok, YouTube, WhatsApp',
                labelHint: 'Tulis nama platform media sosial dengan benar untuk mempermudah identifikasi.',
                nilai: 'Link URL Profil / Nomor WhatsApp <span class="text-danger">*</span>',
                nilaiPlaceholder: 'Contoh: https://instagram.com/geotoba, https://wa.me/62812...',
                nilaiHint: 'Masukkan link tautan lengkap menuju akun media sosial Anda.',
                guide: `
                    <div class="small">
                        <p class="mb-2"><strong>Untuk Sosial Media:</strong></p>
                        <ul class="ps-3 mb-0" style="padding-left: 20px;">
                            <li class="mb-2"><strong>Label</strong> diisi nama media sosial (misal: <em>Instagram</em> atau <em>Facebook</em>).</li>
                            <li class="mb-2"><strong>Nilai Utama</strong> diisi URL lengkap akun profil sosial media Anda atau nomor WA.</li>
                            <li>Ikon akan dideteksi secara otomatis oleh sistem (contoh: jika menulis "Instagram" atau mengandung link instagram, maka ikon otomatis berubah menjadi logo <i class="fab fa-instagram text-danger"></i>).</li>
                        </ul>
                    </div>
                `
            },
            'jam_operasional': {
                label: 'Hari Operasional <span class="text-danger">*</span>',
                labelPlaceholder: 'Contoh: Senin - Jumat, Sabtu - Minggu',
                labelHint: 'Masukkan rentang hari operasional.',
                nilai: 'Waktu Operasional <span class="text-danger">*</span>',
                nilaiPlaceholder: 'Contoh: 08:00 - 17:00',
                nilaiHint: 'Masukkan jam mulai hingga tutup.',
                guide: `
                    <div class="small">
                        <p class="mb-2"><strong>Untuk Jam Operasional:</strong></p>
                        <ul class="ps-3 mb-0" style="padding-left: 20px;">
                            <li class="mb-2"><strong>Label</strong> diisi nama hari operasional (misal: <em>Senin - Jumat</em>).</li>
                            <li class="mb-2"><strong>Nilai Utama</strong> diisi waktu operasional (misal: <em>08:00 - 17:00</em> atau <em>Tutup</em>).</li>
                            <li>Tipe jam operasional akan otomatis tampil dengan ikon <i class="fas fa-clock text-warning"></i> di website.</li>
                        </ul>
                    </div>
                `
            }
        };

        const activeConfig = config[tipe];
        if (activeConfig) {
            labelName.innerHTML = activeConfig.label;
            labelInput.placeholder = activeConfig.labelPlaceholder;
            labelHint.textContent = activeConfig.labelHint;
            nilaiName.innerHTML = activeConfig.nilai;
            nilaiInput.placeholder = activeConfig.nilaiPlaceholder;
            nilaiHint.textContent = activeConfig.nilaiHint;
            guideContent.innerHTML = activeConfig.guide;
        }
    });

    // Trigger on load
    document.getElementById('tipeSelect').dispatchEvent(new Event('change'));
</script>
@endpush
@endsection
