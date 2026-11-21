
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Katalog Farmasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Katalog Farmasi</h2>
            <p>Sistem Informasi Klinik Rawat Jalan</p>
        </div>

        <div class="content">
            <h3 class="page-title">Login</h3>

            <form action="{{ route('auth.login.submit') }}" method="POST" class="form-card">
                @csrf

                <div class="form-group full">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" required>
                    @error('username')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group full">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group full">
                    <label>
                        <input type="checkbox" name="remember" value="1">
                        Ingat saya
                    </label>
                </div>

                <div class="form-action">
                    <button type="submit" class="btn-simpan">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
