<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;

class Articulo extends Model
{
   protected $table = 'articulo';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id'];

   public function categoria(){
    return $this ->belongsTo(categoria::class);
   }
}


