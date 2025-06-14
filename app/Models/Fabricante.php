<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'pais',
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
