<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permite o uso do request
    }

    public function rules(): array
{
    return [
        'marca' => 'required|string|max:100',
        'modelo' => 'required|string|max:100',
        'ano' => 'required|integer|between:1900,' . date('Y'),
        'cor' => 'nullable|string|max:50',
        'placa' => 'nullable|string|max:10',
        'categoria_id' => 'required|exists:categorias,id',
        'fabricante_id' => 'required|exists:fabricantes,id',
    ];
}

public function messages(): array
{
    return [
        'marca.required' => 'A marca é obrigatória.',
        'modelo.required' => 'O modelo é obrigatório.',
        'ano.required' => 'O ano é obrigatório.',
        'ano.integer' => 'O ano deve ser um número inteiro.',
        'ano.between' => 'O ano deve estar entre 1900 e o ano atual.',
        'categoria_id.required' => 'A categoria é obrigatória.',
        'categoria_id.exists' => 'A categoria selecionada é inválida.',
    ];
}

}
