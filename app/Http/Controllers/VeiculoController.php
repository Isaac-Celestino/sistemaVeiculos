<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Http\Requests\VeiculoRequest;  // Request customizado para validação
use App\Models\Categoria;
use App\Models\Fabricante;

class VeiculoController extends Controller
{
    public function index()
    {
        // Carrega os veículos com suas categorias e fabricantes para evitar queries extras na view
        $veiculos = Veiculo::with(['categoria', 'fabricante'])->get();
        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $fabricantes = Fabricante::all();
        return view('veiculos.create', compact('categorias', 'fabricantes'));
    }

    public function store(VeiculoRequest $request)
    {
        Veiculo::create($request->validated());
        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    public function edit(Veiculo $veiculo)
    {
        $categorias = Categoria::all();
        $fabricantes = Fabricante::all();
        return view('veiculos.edit', compact('veiculo', 'categorias', 'fabricantes'));
    }

    public function update(VeiculoRequest $request, Veiculo $veiculo)
    {
        $veiculo->update($request->validated());
        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
    }
}
