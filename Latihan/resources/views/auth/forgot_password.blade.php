<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0" style="font-size: 1.2rem;">Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted" style="font-size: 0.9rem;">
                            Masukkan email Anda dan kami akan mengirimkan instruksi untuk reset password ke sistem log.
                        </p>

                        <!-- Pesan Sukses -->
                        @if (session('status'))
                            <div class="alert alert-success" style="font-size: 0.85rem;">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Pesan Error -->
                        @if($errors->any())
                            <div class="alert alert-danger" style="font-size: 0.85rem;">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
                            </div>
                            
                            <button type="submit" class="btn btn-dark w-100">Kirim Link Reset</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-muted" style="font-size: 0.85rem;">
                                Kembali ke Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>