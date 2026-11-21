<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Rawat Jalan')</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background: #f0f4f8;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px 100px;
        }

        h1 { color: #0056b3; font-size: 2rem; margin: 0; }
        h2 { color: #0056b3; margin: 20px 0; }

        /* ===== HEADER ===== */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .user-info { display: flex; align-items: center; gap: 12px; font-size: 0.9rem; }
        .user-info form { margin: 0; }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-top: 4px solid #0056b3;
            border-radius: 8px;
            padding: 10px 20px 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        /* ===== FORM ===== */
        label { display: block; font-weight: bold; margin: 15px 0 6px; }

        input[type="text"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: inherit;
            font-size: 0.9rem;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #0056b3;
            box-shadow: 0 0 0 2px rgba(0, 86, 179, 0.15);
        }

        textarea { resize: vertical; min-height: 70px; }

        .is-invalid { border-color: #dc2626 !important; }
        .error-text { color: #dc2626; font-size: 0.82rem; margin-top: 4px; }

        /* ===== BUTTON ===== */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }
        .btn-primary { background: #0056b3; margin-top: 18px; }
        .btn-primary:hover { background: #004494; }
        .btn-secondary { background: #6b7280; margin-top: 18px; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-warning { background: #f59e0b; padding: 6px 12px; font-size: 0.8rem; }
        .btn-warning:hover { background: #d97706; }
        .btn-danger { background: #dc2626; padding: 6px 12px; font-size: 0.8rem; }
        .btn-danger:hover { background: #b91c1c; }

        .btn-reset {
            position: fixed;
            bottom: 24px;
            left: 24px;
            background: #ff0000;
            z-index: 10;
        }
        .btn-reset:hover { background: #cc0000; }

        /* ===== TABLE ===== */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        thead th {
            background: #0056b3;
            color: #fff;
            text-align: left;
            padding: 12px;
            border: 1px solid #0056b3;
        }
        tbody td { padding: 12px; border: 1px solid #e5e7eb; vertical-align: top; }
        tbody tr:hover { background: #f9fafb; }
        .empty { text-align: center; color: #374151; }
        .actions { display: flex; gap: 6px; }
        .actions form { margin: 0; }

        /* ===== ALERT ===== */
        .alert-success {
            background: #16a34a;
            color: #fff;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Klinik Rawat Jalan</h1>

            @auth
                <div class="user-info">
                    <span>Halo, <strong>{{ auth()->user()->name }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            @endauth
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')

    </div>
</body>
</html>