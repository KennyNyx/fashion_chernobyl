<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    protected $fillable = ['nombre','categoria','color','talla','precio','stock'];
}
