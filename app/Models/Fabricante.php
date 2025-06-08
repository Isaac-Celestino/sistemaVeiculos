<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'pais', // Adicionado o campo pais que estava no Request
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}