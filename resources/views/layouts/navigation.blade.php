{{-- resources/views/layouts/navigation.blade.php --}}

<nav class="bg-white shadow-lg rounded-b-3xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-20">

            {{-- LOGO --}}
            <a href="{{ url('/') }}"
               class="text-2xl font-semibold tracking-tight text-emerald-600">
                CifrasApp
            </a>

            {{-- DESKTOP --}}
            <div class="hidden md:flex items-center gap-3">

                <a href="{{ url('/') }}"
                   class="px-5 py-2.5 rounded-2xl text-sm font-medium text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition">
                    Sobre
                </a>

                @guest

                    <a href="{{ route('register') }}"
                       class="px-5 py-2.5 rounded-2xl bg-emerald-500 text-white text-sm font-medium hover:bg-emerald-600 transition shadow">
                        Criar conta
                    </a>

                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 rounded-2xl text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                        Entrar
                    </a>

                @endguest

                @auth

                    <a href="{{ route('profile.edit') }}"
                       class="px-5 py-2.5 rounded-2xl text-sm font-medium text-gray-700 hover:bg-gray-100 transition">
                        Perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="px-5 py-2.5 rounded-2xl bg-emerald-500 text-white text-sm font-medium hover:bg-emerald-600 transition shadow">
                            Sair
                        </button>
                    </form>

                @endauth

            </div>

            {{-- MOBILE BUTTON --}}
            <button
                onclick="document.getElementById('mobileMenu').classList.toggle('hidden')"
                class="md:hidden p-2 rounded-xl hover:bg-gray-100 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6 text-gray-700"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>

            </button>

        </div>

        {{-- MOBILE MENU --}}
        <div id="mobileMenu" class="hidden md:hidden pb-6 space-y-2">

            <a href="{{ url('/') }}"
               class="block px-4 py-3 rounded-2xl text-sm text-gray-700 hover:bg-gray-100">
                Sobre
            </a>

            @guest

                <a href="{{ route('register') }}"
                   class="block px-4 py-3 rounded-2xl bg-emerald-500 text-white text-sm">
                    Criar conta
                </a>

                <a href="{{ route('login') }}"
                   class="block px-4 py-3 rounded-2xl text-sm text-gray-700 hover:bg-gray-100">
                    Entrar
                </a>

            @endguest

            @auth

                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-3 rounded-2xl text-sm text-gray-700 hover:bg-gray-100">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="w-full text-left px-4 py-3 rounded-2xl bg-emerald-500 text-white text-sm">
                        Sair
                    </button>
                </form>

            @endauth

        </div>

    </div>
</nav>