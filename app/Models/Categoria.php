<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function Articulo(){
    return $this ->hasMany(Articulo::class);
   }
}
