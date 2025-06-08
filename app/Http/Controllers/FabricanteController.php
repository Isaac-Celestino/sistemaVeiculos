<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Http\Requests\FabricanteRequest;

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
    public function store(FabricanteRequest $request)
    {
        Fabricante::create($request->validated());

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante cadastrado com sucesso!');
    }

    // Mostrar detalhes do fabricante
    public function show(Fabricante $fabricante)
    {
        $fabricante->load('veiculos');
        return view('fabricantes.show', compact('fabricante'));
    }

    // Mostrar formulário para editar fabricante
    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.edit', compact('fabricante'));
    }

    // Atualizar fabricante
    public function update(FabricanteRequest $request, Fabricante $fabricante)
    {
        $fabricante->update($request->validated());

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante atualizado com sucesso!');
    }

    // Excluir fabricante
    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante excluído com sucesso!');
    }
}