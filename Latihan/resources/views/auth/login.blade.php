<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Login Admin</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-2"> <!-- Margin bawah dikurangi sedikit biar link lupa password agak naik -->
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            
                            <!-- TAMBAHAN LINK LUPA PASSWORD DI SINI -->
                            <div class="text-end mb-3">
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-muted" style="font-size: 0.85rem;">
                                    Lupa Password?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>