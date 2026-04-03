<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    protected $fillable = [
    'nombre',
    'categoria_id',
    'color',
    'talla',
    'precio',
    'stock'
];

public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
