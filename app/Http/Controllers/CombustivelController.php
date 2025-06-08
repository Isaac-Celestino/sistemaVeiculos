<?php

namespace App\Http\Controllers;

use App\Models\Combustivel;
use App\Http\Requests\StoreCombustivelRequest;
use Illuminate\Http\Request;

class CombustivelController extends Controller
{
    public function index()
    {
        return view('combustivel.index', ['combustiveis' => Combustivel::all()]);
    }

    public function create()
    {
        return view('combustivel.create');
    }

    public function store(StoreCombustivelRequest $request)
    {
        Combustivel::create($request->validated());
        return redirect()->route('combustivel.index')->with('success', 'Combustível cadastrado!');
    }

    public function show(Combustivel $combustivel)
    {
        return view('combustivel.show', compact('combustivel'));
    }

    public function edit(Combustivel $combustivel)
    {
        return view('combustivel.edit', compact('combustivel'));
    }

    public function update(StoreCombustivelRequest $request, Combustivel $combustivel)
    {
        $combustivel->update($request->validated());
        return redirect()->route('combustivel.index')->with('success', 'Combustível atualizado!');
    }

    public function destroy(Combustivel $combustivel)
    {
        $combustivel->delete();
        return redirect()->route('combustivel.index')->with('success', 'Combustível removido!');
    }
}
