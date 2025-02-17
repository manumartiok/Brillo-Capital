<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    public function pieza()
    {
        return $this->belongsTo(Pieza::class, 'piezas_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

//     public function detalletexto()
// {
//     return $this->hasOne(DetalleTexto::class, 'producto_id');
// }

    public function carruselItems()
    {
        return $this->hasMany(CarruselItem::class);
    }

    public function favoritos() {
        return $this->hasMany(Favorito::class, 'producto_id');
    }
    
}
