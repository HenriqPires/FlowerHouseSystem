<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema da Floricultura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://png.pngtree.com/background/20250417/original/pngtree-a-flower-shop-on-the-street-full-of-flowers-in-pots-picture-image_15746985.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.6);
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            z-index: 0;
        }

        .login-box {
            position: relative;
            z-index: 1;
            margin: auto;
            margin-top: 10vh;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .login-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #b185db;
            margin-bottom: 20px;
            animation: fadeInDown 1.2s ease-in-out;
        }

        .btn-lilas {
            background-color: #b185db;
            color: white;
            border: none;
        }

        .btn-lilas:hover {
            background-color: #a066d1;
            transform: scale(1.03);
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="login-box">
        <div class="login-title">LOGIN</div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-success text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Senha')" />
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">
                    {{ __('Lembrar de mim') }}
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-sm" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-primary-button class="btn btn-lilas">
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>
</html>
