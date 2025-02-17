<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorito;

class MiCuentaController extends Controller
{
    public function favoritos()
    {
       
        
        if (Auth::guard('web_user')->check()) {
            $favoritos = Auth::guard('web_user')->user()->favoritos()->with('producto')->get();
            return view('content.pages-jewelry.favoritos', compact('favoritos'));
        }
    
        // Si el usuario no está autenticado, redirigir a la página de cuenta con un mensaje
        return redirect()->route('index')->with('message', 'Por favor, inicia sesión para ver tus favoritos.');
    }

}
