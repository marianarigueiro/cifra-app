<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifras App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            font-family: Inter, Arial, sans-serif;
            background:#f5f7f5;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<!-- NAVBAR -->
<header class="bg-white shadow-md">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="/" class="text-2xl font-bold text-green-700">
            Cifras App
        </a>

        <nav class="flex items-center gap-3">

            <a href="/" class="text-gray-600 hover:text-green-700 transition">
                Sobre
            </a>

            @guest

                <a href="{{ route('register') }}"
                   class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition">
                    Criar conta
                </a>

                <a href="{{ route('login') }}"
                   class="text-gray-700 hover:text-green-700 transition">
                    Entrar
                </a>

            @endguest

            @auth

                <a href="#" class="text-gray-700 hover:text-green-700 transition">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600 transition">
                        Sair
                    </button>
                </form>

            @endauth

        </nav>
    </div>
</header>

<!-- CONTEÚDO -->
<main class="flex-1 max-w-6xl mx-auto w-full px-6 py-10">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-white shadow-inner mt-10">
    <div class="max-w-6xl mx-auto px-6 py-5 text-center text-gray-500 text-sm">
        © {{ date('Y') }} Cifras App. Todos os direitos reservados.
    </div>
</footer>

</body>
</html>