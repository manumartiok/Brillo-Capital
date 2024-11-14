<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\PagContacto;
use Illuminate\Http\Request;

class PagContactos extends Controller
{
   
    public function show($pagcontacto_id = null)
    {
        // Busca la casa por ID
        $pagcontacto = PagContacto::first();

    // Si no existe, crea un nuevo objeto Home
    if (!$pagcontacto) {
        $pagcontacto = new PagContacto(); // Crear una nueva instancia sin guardarla en la base de datos
    }

        return view('content.pages.pagcontacto-show' ,['pagcontacto'=>$pagcontacto]);
      }

      public function update(Request $request){
        
         // Busca el registro de la casa por su ID
    $pagcontacto = PagContacto::find($request->pagcontacto_id);

    // Si no existe, crea uno nuevo
    if (!$pagcontacto) {
        $pagcontacto = new PagContacto();
    }

        $pagcontacto->telefono=$request->telefono;
        $pagcontacto->mail=$request->mail;
        $pagcontacto->direccion=$request->direccion;
        $pagcontacto->iframe=$request->iframe;
   
    // Guarda los cambios en la base de datos
    $pagcontacto->save();

  
    return redirect()->route('pages-pagcontacto-show', ['pagcontacto_id' => $pagcontacto->id]);
    }
}
