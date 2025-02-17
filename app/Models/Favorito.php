<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = ['web_user_id', 'producto_id'];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el modelo WebUser
    public function webUser()
    {
        return $this->belongsTo(WebUser::class, 'web_user_id');
    }
}
