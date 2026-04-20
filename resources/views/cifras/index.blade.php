{{-- resources/views/cifras/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    {{-- Cabeçalho --}}
    <div>
        <h2 class="text-3xl font-semibold text-gray-900">
            Últimas Cifras
        </h2>

        <p class="text-gray-500 text-sm mt-1">
            Organize e edite suas músicas rapidamente.
        </p>
    </div>

    {{-- Criar Cifra --}}
    <div class="bg-white p-6 rounded-3xl shadow-lg">

        <form method="GET" action="{{ route('cifras.create') }}">

            <textarea
                class="w-full bg-gray-50 border-0 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 resize-none"
                rows="4"
                readonly
                placeholder="Digite o nome da música ou comece uma nova cifra..."
            ></textarea>

            <div class="flex justify-between items-center mt-4">

                <span class="text-sm text-gray-400">
                    Crie uma nova música
                </span>

                <button
                    class="bg-emerald-500 text-white px-5 py-2.5 rounded-2xl hover:bg-emerald-600 transition font-medium shadow">
                    Nova Cifra
                </button>

            </div>

        </form>

    </div>

    {{-- Feed --}}
    <div class="space-y-4">

        @forelse ($cifras as $cifra)

            <div class="bg-white p-5 rounded-3xl shadow-md">

                <div class="flex justify-between items-center mb-2">

                    <div>
                        <span class="font-semibold text-sm text-gray-900 block">
                            {{ $cifra->titulo }}
                        </span>

                        <span class="text-xs text-gray-400">
                            {{ $cifra->artista ?: 'Sem artista informado' }}
                        </span>
                    </div>

                    <span class="text-xs text-gray-400">
                        {{ $cifra->created_at->diffForHumans() }}
                    </span>

                </div>

                <p class="text-gray-700 whitespace-pre-line leading-7">
                    {{ Str::limit($cifra->conteudo, 180) }}
                </p>

                @if ($cifra->user_id === auth()->id())

                    <div class="flex gap-4 mt-4 text-sm">

                        <a href="{{ route('cifras.show', $cifra) }}"
                           class="text-gray-500 hover:text-emerald-500 transition font-medium">
                            Ver
                        </a>

                        <a href="{{ route('cifras.edit', $cifra) }}"
                           class="text-gray-500 hover:text-blue-500 transition font-medium">
                            Editar
                        </a>

                        <form method="POST" action="{{ route('cifras.destroy', $cifra) }}">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Deseja excluir esta cifra?')"
                                class="text-gray-500 hover:text-red-500 transition font-medium">
                                Excluir
                            </button>

                        </form>

                    </div>

                @endif

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow-md text-center py-12 text-gray-500">
                Ainda não existem cifras cadastradas...
            </div>

        @endforelse

    </div>

</div>

@endsection