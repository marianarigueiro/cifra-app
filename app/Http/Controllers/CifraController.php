<?php

namespace App\Http\Controllers;

use App\Models\Cifra;
use Illuminate\Http\Request;

class CifraController extends Controller
{
    public function index()
    {
        $cifras = Cifra::where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        return view('cifras.index', compact('cifras'));
    }

    public function create()
    {
        return view('cifras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'conteudo' => 'required',
        ]);

        Cifra::create([
            'titulo' => $validated['titulo'],
            'conteudo' => $validated['conteudo'],
            'artista' => $request->artista,
            'tom' => $request->tom,
            'categoria' => $request->categoria,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('cifras.index');
    }

    public function show(Cifra $cifra)
    {
        if ($cifra->user_id != auth()->user()->id) {
            abort(403);
        }

        return view('cifras.show', compact('cifra'));
    }

    public function edit(Cifra $cifra)
    {
        if ($cifra->user_id != auth()->user()->id) {
            abort(403);
        }

        return view('cifras.edit', compact('cifra'));
    }

    public function update(Request $request, Cifra $cifra)
    {
        if ($cifra->user_id != auth()->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'conteudo' => 'required',
        ]);

        $cifra->update([
            'titulo' => $validated['titulo'],
            'conteudo' => $validated['conteudo'],
            'artista' => $request->artista,
            'tom' => $request->tom,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('cifras.index');
    }

    public function destroy(Cifra $cifra)
    {
        if ($cifra->user_id != auth()->user()->id) {
            abort(403);
        }

        $cifra->delete();

        return redirect()->route('cifras.index');
    }
}