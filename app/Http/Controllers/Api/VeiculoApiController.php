<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use App\Http\Requests\StoreVeiculoRequest;
use Illuminate\Http\Request;

class VeiculoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::with(['categoria', 'fabricante'])->get();
        
        return response()->json([
            'message' => 'Veículos listados com sucesso!',
            'data' => $veiculos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVeiculoRequest $request)
    {
        $veiculo = Veiculo::create($request->validated());
        $veiculo->load(['categoria', 'fabricante']);

        return response()->json([
            'message' => 'Veículo criado com sucesso!',
            'data' => $veiculo
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        $veiculo->load(['categoria', 'fabricante']);
        
        return response()->json([
            'message' => 'Veículo encontrado!',
            'data' => $veiculo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $validatedData = $request->validate([
            'marca' => 'sometimes|required|string|max:255',
            'modelo' => 'sometimes|required|string|max:255',
            'ano' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
            'cor' => 'nullable|string|max:50',
            'placa' => 'nullable|string|max:20',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
            'fabricante_id' => 'sometimes|required|exists:fabricantes,id',
        ]);

        $veiculo->update($validatedData);
        $veiculo->load(['categoria', 'fabricante']);

        return response()->json([
            'message' => 'Veículo atualizado com sucesso!',
            'data' => $veiculo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return response()->json([
            'message' => 'Veículo deletado com sucesso!'
        ]);
    }
}