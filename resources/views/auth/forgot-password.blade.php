<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - GeoToba Sibaganding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card { border-radius: 16px; border: none; }
        .btn-gold { background: #c6a43b; color: #003366; font-weight: 600; border: none; }
        .btn-gold:hover { background: #003366; color: white; }
        .letter-spacing-lg {
            letter-spacing: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="mb-0">🔑 Lupa Password</h4>
                    </div>
                    <div class="card-body">
                        @php
                            $isStep3 = session('otp_verified');
                            $isStep2 = session('otp_sent') && !$isStep3;
                            $emailVal = session('reset_email');
                        @endphp

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($isStep3)
                            <!-- STEP 3: Reset Password -->
                            @if($errors->has('password') || $errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') ?: $errors->first('email') }}
                                </div>
                            @endif

                            <p class="text-muted mb-3">Masukkan password baru untuk akun Anda.</p>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $emailVal }}">
                                
                                <div class="mb-3">
                                    <label class="form-label d-flex justify-content-between">
                                        <span>Email</span>
                                        <a href="{{ route('password.request', ['clear' => 1]) }}" class="text-decoration-none text-muted small">← Ubah Email</a>
                                    </label>
                                    <input type="email" class="form-control bg-light" value="{{ $emailVal }}" disabled readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" name="password" class="form-control" required placeholder="Minimal 6 karakter" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Ulangi password baru">
                                </div>

                                <button type="submit" class="btn btn-gold w-100 mt-2">Reset Password</button>
                            </form>

                        @elseif($isStep2)
                            <!-- STEP 2: Verifikasi OTP -->
                            @if($errors->has('otp'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('otp') }}
                                </div>
                            @endif

                            <p class="text-muted mb-3">Masukkan kode OTP 6 digit yang dikirim ke email Anda.</p>
                            <form method="POST" action="{{ route('password.verify-otp') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ $emailVal }}">
                                
                                <div class="mb-3">
                                    <label class="form-label d-flex justify-content-between">
                                        <span>Email</span>
                                        <a href="{{ route('password.request', ['clear' => 1]) }}" class="text-decoration-none text-muted small">← Ubah Email</a>
                                    </label>
                                    <input type="email" class="form-control bg-light" value="{{ $emailVal }}" disabled readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Input Kode</label>
                                    <input type="text" name="otp" class="form-control text-center fs-5" required placeholder="Masukkan Kode" maxlength="6" value="{{ old('otp') }}" autocomplete="off" autofocus>
                                </div>

                                <button type="submit" class="btn btn-gold w-100 mt-2">Berikutnya</button>
                            </form>

                        @else
                            <!-- STEP 1: Kirim OTP -->
                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                            
                            <p class="text-muted mb-3">Masukkan email Anda untuk menerima kode OTP reset password.</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required placeholder="nama@email.com" value="{{ old('email') }}" autofocus autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-gold w-100 mt-2">Kirim Kode OTP</button>
                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}" class="text-decoration-none">← Kembali ke Login</a>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>