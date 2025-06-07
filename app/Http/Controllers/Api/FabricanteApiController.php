<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fabricantes = Fabricante::all();
        
        return response()->json([
            'message' => 'Fabricantes listados com sucesso!',
            'data' => $fabricantes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255|unique:fabricantes,nome',
        ]);

        $fabricante = Fabricante::create($validatedData);

        return response()->json([
            'message' => 'Fabricante criado com sucesso!',
            'data' => $fabricante
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fabricante $fabricante)
    {
        return response()->json([
            'message' => 'Fabricante encontrado!',
            'data' => $fabricante
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255|unique:fabricantes,nome,' . $fabricante->id,
        ]);

        $fabricante->update($validatedData);

        return response()->json([
            'message' => 'Fabricante atualizado com sucesso!',
            'data' => $fabricante
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();

        return response()->json([
            'message' => 'Fabricante deletado com sucesso!'
        ]);
    }
}