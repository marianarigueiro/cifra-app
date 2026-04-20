@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <div>
        <h2 class="text-3xl font-semibold text-gray-800">
            Minhas Cifras
        </h2>

        <p class="text-gray-500 text-sm mt-1">
            Organize seu repertório.
        </p>
    </div>

    <!-- FORM -->
    <div class="bg-white p-6 rounded-3xl shadow-lg">

        <form method="POST" action="{{ route('cifras.store') }}">
            @csrf

            <div class="grid md:grid-cols-3 gap-4 mb-4">

                <input type="text" name="titulo"
                    placeholder="Título"
                    required
                    class="w-full bg-gray-100 rounded-xl p-3">

                <input type="text" name="artista"
                    placeholder="Artista"
                    class="w-full bg-gray-100 rounded-xl p-3">

                <input type="text" name="tom"
                    placeholder="Tom"
                    class="w-full bg-gray-100 rounded-xl p-3">

            </div>

            <textarea
                name="conteudo"
                rows="6"
                placeholder="Digite a cifra..."
                required
                class="w-full bg-gray-100 rounded-xl p-4"
            ></textarea>

            <div class="mt-4 text-right">

                <button type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition">
                    Salvar Cifra
                </button>

            </div>

        </form>

    </div>

    <!-- LISTA -->
    <div class="space-y-4">

        @foreach($cifras as $cifra)

        <div class="bg-white p-5 rounded-3xl shadow-md">

            <h3 class="font-bold text-lg">
                {{ $cifra->titulo }}
            </h3>

            <p class="text-sm text-gray-500 mb-3">
                {{ $cifra->artista }} | {{ $cifra->tom }}
            </p>

            <pre class="whitespace-pre-wrap">{{ $cifra->conteudo }}</pre>

        </div>

        @endforeach

    </div>

</div>

@endsection