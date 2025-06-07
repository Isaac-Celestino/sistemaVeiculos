<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricanteRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer essa requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
        ];
    }

    /**
     * Mensagens personalizadas (opcional).
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'pais.required' => 'O campo país é obrigatório.',
        ];
    }
}
