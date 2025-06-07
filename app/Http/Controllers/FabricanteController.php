<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    // Mostrar todos fabricantes
    public function index()
    {
        $fabricantes = Fabricante::all();
        return view('fabricantes.index', compact('fabricantes'));
    }

    // Mostrar formulário para criar novo fabricante
    public function create()
    {
        return view('fabricantes.create');
    }

    // Salvar novo fabricante
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Fabricante::create($request->all());

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante cadastrado com sucesso!');
    }

    // Mostrar formulário para editar fabricante
    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.edit', compact('fabricante'));
    }

    // Atualizar fabricante
    public function update(Request $request, Fabricante $fabricante)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $fabricante->update($request->all());

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante atualizado com sucesso!');
    }

    // Excluir fabricante
    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante excluído com sucesso!');
    }
}
