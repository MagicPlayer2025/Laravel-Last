<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веломагазин</title>
    <style>
        /* Уникальный неоново-фиолетовый стиль */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #0a0a0f 0%, #1a0b2e 100%);
            color: #e0b0ff;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Киборг-шапка */
        header {
            background: rgba(20, 5, 30, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid #8a2be2;
            box-shadow: 0 0 20px rgba(138, 43, 226, 0.5);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 2rem;
            font-weight: 800;
            text-transform: uppercase;
            background: linear-gradient(45deg, #ff00ff, #00ffff, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(255, 0, 255, 0.7);
            letter-spacing: 3px;
            animation: glitch 3s infinite;
            text-decoration: none;
        }

        .brand:hover {
            text-decoration: none;
        }

        @keyframes glitch {
            0%, 100% { transform: skew(0deg); }
            95% { transform: skew(0deg); }
            96% { transform: skew(10deg); }
            97% { transform: skew(-10deg); }
            98% { transform: skew(5deg); }
            99% { transform: skew(-5deg); }
        }

        .links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .links a:not(.btn) {
            color: #b87aff;
            text-decoration: none;
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            border: 1px solid transparent;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .links a:not(.btn)::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(138, 43, 226, 0.4), transparent);
            transition: left 0.5s;
        }

        .links a:not(.btn):hover::before {
            left: 100%;
        }

        .links a:not(.btn):hover {
            border-color: #ff00ff;
            box-shadow: 0 0 20px #ff00ff;
            text-shadow: 0 0 10px #ff00ff;
            color: #fff;
            text-decoration: none;
        }

        /* Неоновые кнопки */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.7rem 1.8rem;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            line-height: 1.2;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(45deg, #8a2be2, #ff00ff);
            color: white;
            box-shadow: 0 0 20px #8a2be2;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px #ff00ff;
            color: white;
            text-decoration: none;
        }

        .btn-ghost {
            background: transparent;
            color: #ff00ff;
            border: 2px solid #ff00ff;
            box-shadow: 0 0 15px rgba(255, 0, 255, 0.3);
        }

        .btn-ghost:hover {
            background: #ff00ff;
            color: #0a0a0f;
            box-shadow: 0 0 30px #ff00ff;
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Кнопка подробнее - специальные стили */
        .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.8rem 2rem;
            background: linear-gradient(135deg, #8a2be2, #ff00ff);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            border: 2px solid transparent;
            box-shadow: 0 0 20px rgba(138, 43, 226, 0.7);
            transition: all 0.3s;
            cursor: pointer;
            width: fit-content;
            min-width: 160px;
            border: none;
            position: relative;
            z-index: 10;
        }

        .btn-detail:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 0 40px #ff00ff;
            background: linear-gradient(135deg, #ff00ff, #8a2be2);
            color: white;
            text-decoration: none;
        }

        .btn-detail:active {
            transform: translateY(0) scale(0.98);
        }

        /* Основной контент */
        main {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        /* Сетка товаров */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .product-card {
            background: rgba(20, 5, 30, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid #8a2be2;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 0 30px rgba(138, 43, 226, 0.3);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .product-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 0, 255, 0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
            pointer-events: none;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) rotate(45deg); }
            20%, 100% { transform: translateX(100%) rotate(45deg); }
        }

        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: #ff00ff;
            box-shadow: 0 0 50px #ff00ff;
        }

        .product-card .content {
            padding: 1.5rem;
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 2px solid #8a2be2;
            filter: grayscale(30%) hue-rotate(250deg);
            transition: all 0.3s;
            display: block;
        }

        .product-card:hover .product-img {
            filter: grayscale(0%) hue-rotate(0deg);
            border-bottom-color: #ff00ff;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 0 10px #ff00ff;
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .product-description {
            color: #b87aff;
            margin-bottom: 1rem;
            line-height: 1.5;
            flex: 1;
        }

        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .price {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ff00ff;
            text-shadow: 0 0 20px #ff00ff;
            display: inline-block;
            padding: 0.3rem 1rem;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50px;
            border: 1px solid #8a2be2;
            line-height: 1.2;
        }

        /* Неоновые уведомления */
        .alert {
            padding: 1.2rem 1.8rem;
            margin-bottom: 2rem;
            border-radius: 15px;
            border-left: 8px solid;
            animation: pulse 2s infinite;
            backdrop-filter: blur(10px);
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .alert-success {
            background: rgba(0, 255, 0, 0.1);
            border-color: #00ff00;
            color: #00ff00;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.3);
        }

        .alert-error {
            background: rgba(255, 0, 0, 0.1);
            border-color: #ff0000;
            color: #ff6b6b;
            box-shadow: 0 0 30px rgba(255, 0, 0, 0.3);
        }

        .alert ul {
            margin-top: 0.5rem;
            margin-left: 1.5rem;
        }

        /* Формы */
        .field {
            margin-bottom: 1.5rem;
        }

        .field label {
            display: block;
            margin-bottom: 0.6rem;
            color: #b87aff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        input, textarea, select {
            width: 100%;
            padding: 1rem 1.5rem;
            background: rgba(0, 0, 0, 0.5);
            border: 2px solid #8a2be2;
            border-radius: 15px;
            font-size: 1rem;
            color: #fff;
            transition: all 0.3s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #ff00ff;
            box-shadow: 0 0 30px #ff00ff;
        }

        input:hover, textarea:hover, select:hover {
            border-color: #ff00ff;
        }

        /* Таблицы */
        .table {
            width: 100%;
            background: rgba(20, 5, 30, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            border: 2px solid #8a2be2;
        }

        .table th {
            background: rgba(138, 43, 226, 0.3);
            padding: 1rem;
            font-weight: 700;
            color: #ff00ff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid #8a2be2;
            color: #e0b0ff;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover td {
            background: rgba(255, 0, 255, 0.1);
        }

        /* Заголовки */
        h1 {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            animation: titlePulse 3s infinite;
        }

        @keyframes titlePulse {
            0%, 100% { filter: hue-rotate(0deg); }
            50% { filter: hue-rotate(30deg); }
        }

        h2 {
            font-size: 2.2rem;
            color: #b87aff;
            text-shadow: 0 0 15px #8a2be2;
            margin-bottom: 1rem;
            border-left: 8px solid #ff00ff;
            padding-left: 1.5rem;
        }

        /* Карточки */
        .card {
            background: rgba(20, 5, 30, 0.7);
            backdrop-filter: blur(10px);
            border: 2px solid #8a2be2;
            border-radius: 30px;
            padding: 2rem;
            box-shadow: 0 0 40px rgba(138, 43, 226, 0.5);
        }

        /* Детальная страница */
        .product-hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
            background: rgba(20, 5, 30, 0.9);
            backdrop-filter: blur(20px);
            border: 3px solid #ff00ff;
            border-radius: 40px;
            padding: 3rem;
            box-shadow: 0 0 70px rgba(255, 0, 255, 0.5);
        }

        /* Бейджи */
        .badge {
            display: inline-block;
            padding: 0.3rem 1.2rem;
            background: linear-gradient(45deg, #8a2be2, #ff00ff);
            border-radius: 50px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 0 20px #ff00ff;
        }

        /* Разделитель */
        .divider {
            margin: 3rem 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #ff00ff, #00ffff, #ff00ff, transparent);
            box-shadow: 0 0 30px #ff00ff;
        }

        /* Утилиты */
        .flex {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .space-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .mt {
            margin-top: 2rem;
        }
        
        .muted {
            color: #b87aff;
            opacity: 0.7;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .stack {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }
            
            .links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .product-hero {
                grid-template-columns: 1fr;
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }

            .product-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-detail {
                width: 100%;
            }
        }

        /* Кастомный скроллбар */
        ::-webkit-scrollbar {
            width: 12px;
            background: #0a0a0f;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #8a2be2, #ff00ff);
            border-radius: 10px;
            border: 2px solid #0a0a0f;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
        }

        /* Пример использования кнопки подробнее в карточке товара */
        .product-actions {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="nav">
            <a href="{{ route('home') }}" class="brand">VELO<span style="color: #00ffff;">SHOP</span></a>
            <div class="links">
                <a href="{{ route('home') }}">КАТАЛОГ</a>
                <a href="{{ route('services.index') }}">УСЛУГИ</a>
                @auth
                    <a href="{{ route('cart.index') }}">КОРЗИНА</a>
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.products.index') }}">ТОВАРЫ</a>
                        <a href="{{ route('admin.services.index') }}">УСЛУГИ</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
                        @csrf
                        <button class="btn btn-ghost" type="submit">ВЫХОД</button>
                    </form>
                @else
                    <a class="btn btn-ghost" href="{{ route('login') }}">ВХОД</a>
                    <a class="btn btn-primary" href="{{ route('register') }}">РЕГИСТРАЦИЯ</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-error">
                <div style="font-weight: 600; margin-bottom: 1rem;">⚠️ ОШИБКИ:</div>
                <ul style="margin-left: 2rem;">
                    @foreach ($errors->all() as $error)
                        <li>► {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>