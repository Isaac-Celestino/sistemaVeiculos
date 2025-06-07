<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Permite atribuição em massa para o campo 'nome'
    protected $fillable = ['nome'];

    // Relacionamento 1:N (uma categoria tem muitos veículos)
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
