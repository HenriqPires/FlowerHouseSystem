<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo à Floricultura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .hero {
            background: url('https://png.pngtree.com/background/20250417/original/pngtree-a-flower-shop-on-the-street-full-of-flowers-in-pots-picture-image_15746985.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding-top: 20%;
            color: white;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 3px 3px 6px rgba(128, 0, 128, 0.6);
            animation: fadeInDown 1.5s ease-in-out;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 30px;
            color: #e6d4f6;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
            animation: fadeInUp 2s ease-in-out;
        }

        .btn-custom {
            margin: 10px;
            padding: 12px 25px;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-lilas {
            background-color: #b185db;
            color: white;
            border: none;
        }

        .btn-lilas:hover {
            background-color: #a066d1;
            transform: scale(1.05);
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="overlay"></div>
        <div class="container hero-content">
            <h1 class="hero-title"> A Casa das Flores </h1>
            <p class="hero-subtitle">Gestão eficiente de produtos, entregas e vendas</p>

            <div class="d-flex justify-content-center flex-wrap">
                <a href="{{ route('login') }}" class="btn btn-lilas btn-custom">Login Administrador</a>
                <a href="{{ route('login') }}" class="btn btn-lilas btn-custom">Login Funcionário</a>
                <a href="{{ route('login') }}" class="btn btn-lilas btn-custom">Login Entregador</a>
            </div>
        </div>
    </div>
</body>
</html>
