<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Password Baru - Sibaganding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0" style="font-size: 1.2rem;">Buat Password Baru</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted" style="font-size: 0.9rem;">
                            Silakan masukkan password baru Anda untuk mengamankan akun kembali.
                        </p>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            
                            <!-- Data penting yang dibawa dari link reset -->
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-3">
                                <label class="form-label" style="font-size: 0.9rem;">Password Baru</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 8 karakter" required autofocus>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size: 0.9rem;">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Ketik ulang password" required>
                            </div>

                            <button type="submit" class="btn btn-dark w-100">Simpan & Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-muted" style="font-size: 0.85rem;">
                                Batal dan Kembali ke Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>