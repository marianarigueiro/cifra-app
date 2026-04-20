{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    <div class="min-h-screen bg-gray-100 border-t">

        <div class="max-w-6xl mx-auto px-6 py-10">

            {{-- TÍTULO --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900">
                    Últimas Cifras
                </h1>

                <p class="text-gray-500 mt-2 text-lg">
                    Organize suas músicas e repertórios rapidamente.
                </p>
            </div>

            {{-- BOX NOVA CIFRA --}}
            <div class="bg-white rounded-3xl shadow-md p-6 mb-8">

                <form method="GET" action="{{ route('cifras.create') }}">

                    <textarea
                        rows="5"
                        placeholder="Digite o nome da música ou comece uma nova cifra..."
                        class="w-full border-0 bg-gray-50 rounded-2xl p-5 text-lg text-gray-700 focus:ring-2 focus:ring-blue-500 resize-none"
                    ></textarea>

                    <div class="flex justify-between items-center mt-6">

                        <span class="text-gray-400">
                            Crie sua próxima música
                        </span>

                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-2xl font-semibold transition"
                        >
                            Nova Cifra
                        </button>

                    </div>

                </form>

            </div>

            {{-- LISTA --}}
            <div class="space-y-5">

                @forelse($cifras as $cifra)

                    <div class="bg-white rounded-3xl shadow-md p-6">

                        <div class="flex justify-between items-start mb-4">

                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    {{ $cifra->titulo }}
                                </h2>

                                <p class="text-gray-500">
                                    {{ $cifra->artista ?: 'Artista não informado' }}
                                </p>
                            </div>

                            <span class="text-sm text-gray-400">
                                {{ $cifra->created_at->diffForHumans() }}
                            </span>

                        </div>

                        <p class="text-gray-700 whitespace-pre-line mb-5">
                            {{ Str::limit($cifra->conteudo, 180) }}
                        </p>

                        <div class="flex gap-3">

                            <a href="{{ route('cifras.show', $cifra) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-xl text-sm font-semibold">
                                Ver
                            </a>

                            <a href="{{ route('cifras.edit', $cifra) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-xl text-sm font-semibold">
                                Editar
                            </a>

                            <form method="POST" action="{{ route('cifras.destroy', $cifra) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Deseja excluir esta cifra?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-sm font-semibold">
                                    Excluir
                                </button>
                            </form>

                        </div>

                    </div>

                @empty

                    <div class="bg-white rounded-3xl shadow-md p-10 text-center">

                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            Nenhuma cifra cadastrada
                        </h2>

                        <p class="text-gray-500 mb-6">
                            Comece criando sua primeira música.
                        </p>

                        <a href="{{ route('cifras.create') }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-2xl font-semibold">
                            Criar Agora
                        </a>

                    </div>

                @endforelse

            </div>

        </div>

    </div>
</x-app-layout>