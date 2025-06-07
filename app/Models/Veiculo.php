<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'ano', 'cor', 'placa', 'categoria_id', 'fabricante_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

}
