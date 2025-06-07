<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        
        return response()->json([
            'message' => 'Categorias listadas com sucesso!',
            'data' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome',
        ]);

        $categoria = Categoria::create($validatedData);

        return response()->json([
            'message' => 'Categoria criada com sucesso!',
            'data' => $categoria
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return response()->json([
            'message' => 'Categoria encontrada!',
            'data' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update($validatedData);

        return response()->json([
            'message' => 'Categoria atualizada com sucesso!',
            'data' => $categoria
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json([
            'message' => 'Categoria deletada com sucesso!'
        ]);
    }
}