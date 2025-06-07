<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVeiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'cor' => 'nullable|string|max:50',
            'placa' => 'nullable|string|max:20',
            'categoria_id' => 'required|exists:categorias,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
        ];
    }
}