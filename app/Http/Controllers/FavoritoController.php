<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorito;
use App\Models\WebUser;  // Importar WebUser
use App\Models\Producto; // Importar Producto
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    
        public function toggle($producto_id)
    {
        // Verificar si el usuario está autenticado
    $user = Auth::guard('web_user')->user();

    if (!$user) {
        // Redirigir al usuario a la página de inicio de sesión si no está autenticado
        return redirect()->route('cuenta');
    }

    // Verificar si el producto ya está en favoritos
    $favorito = $user->favoritos()->where('producto_id', $producto_id)->first();

    if ($favorito) {
        // Eliminar si ya está en favoritos
        $favorito->delete();
    } else {
        // Agregar a favoritos
        $user->favoritos()->create(['producto_id' => $producto_id]);
    }

    return redirect()->back();
    }
}
