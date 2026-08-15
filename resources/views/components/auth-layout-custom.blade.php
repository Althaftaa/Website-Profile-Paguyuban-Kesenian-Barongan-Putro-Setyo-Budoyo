<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login Admin') - Putro Setyo Budoyo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #faf7f2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(75, 46, 30, 0.12);
        }

        .auth-header {
            background: #4b2e1e;
            padding: 40px 32px 32px;
            text-align: center;
        }

        .auth-header .logo-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #d4af37;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            overflow: hidden;
        }

        .auth-header .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-header .logo-circle i {
            font-size: 28px;
            color: #4b2e1e;
        }

        .auth-header h1 {
            color: #ffffff;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .auth-header p {
            color: #d4af37;
            font-size: 13px;
            margin: 0;
        }

        .auth-body {
            padding: 32px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #4b2e1e;
            margin-bottom: 6px;
        }

        .input-group-auth {
            position: relative;
            margin-bottom: 18px;
        }

        .input-group-auth i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #a3906a;
            font-size: 15px;
        }

        .input-group-auth input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1px solid #e0d9cb;
            border-radius: 10px;
            font-size: 14px;
            background: #fdfbf8;
            transition: border-color .2s, box-shadow .2s;
        }

        .input-group-auth input:focus {
            outline: none;
            border-color: #c89b3c;
            box-shadow: 0 0 0 3px rgba(200, 155, 60, 0.15);
            background: #ffffff;
        }

        .input-group-auth .toggle-password {
            left: auto;
            right: 14px;
            cursor: pointer;
        }

        .form-check-auth {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .form-check-auth label {
            color: #5a5650;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .form-check-auth a {
            color: #a77d2d;
            text-decoration: none;
        }

        .form-check-auth a:hover {
            text-decoration: underline;
        }

        .btn-auth {
            width: 100%;
            background: #c89b3c;
            color: #ffffff;
            border: none;
            border-radius: 30px;
            padding: 12px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .3px;
            transition: background .2s;
        }

        .btn-auth:hover {
            background: #a77d2d;
            color: #ffffff;
        }

        .back-home {
            text-align: center;
            margin-top: 22px;
        }

        .back-home a {
            font-size: 12.5px;
            color: #a3906a;
            text-decoration: none;
        }

        .back-home a:hover {
            color: #4b2e1e;
        }

        .alert-auth {
            background: #fbeaf0;
            color: #72243e;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            padding: 10px 14px;
            margin-bottom: 18px;
        }

        .invalid-feedback-auth {
            color: #a32d2d;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }
    </style>

    @stack('styles')
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <div class="logo-circle">
                @if(isset($profile) && $profile?->logo)
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo">
                @else
                    <i class="fa-solid fa-masks-theater"></i>
                @endif
            </div>
            <h1>{{ $profile?->name ?? 'Putro Setyo Budoyo' }}</h1>
            <p>Panel Administrator</p>
        </div>

        <div class="auth-body">
            {{ $slot }}

            <div class="back-home">
                <a href="{{ route('home') }}">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke beranda
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>