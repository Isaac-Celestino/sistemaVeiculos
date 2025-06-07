<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VeiculoApiController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'cor' => 'nullable|string|max:50',
            'placa' => 'nullable|string|max:20',
            'categoria_id' => 'required|exists:categorias,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
        ]);

        if ($validator->fails()) {
            // Se houver erro, retorna código 422 com as mensagens
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Cria o veículo no banco
        $veiculo = Veiculo::create($validator->validated());

        // Retorna a resposta JSON com sucesso
        return response()->json([
            'message' => 'Veículo criado com sucesso!',
            'data' => $veiculo
        ], 201);
    }
}
