<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Nosotro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Nosotros extends Controller
{
    public function show($nosotros_id = null)
    {
        // Busca la casa por ID
        $nosotros = Nosotro::first();

    // Si no existe, crea un nuevo objeto Home
    if (!$nosotros) {
        $nosotros = new Nosotro(); // Crear una nueva instancia sin guardarla en la base de datos
    }
        return view('content.pages.nosotros-show' ,['nosotros'=>$nosotros]);
      }

  

    public function update(Request $request)
    {

        
         // Busca el registro de la casa por su ID
    $nosotros = Nosotro::find($request->nosotros_id);

    // Si no existe, crea uno nuevo
    if (!$nosotros) {
        $nosotros = new Nosotro();
    }

        $nosotros->texto=$request->texto;
        $nosotros->contenido=$request->contenido;

    // Cargar las imágenes y guardar sus rutas
    if ($request->hasFile('fondo_url')) {
        $file = $request->file('fondo_url');    
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; 
        Storage::put($filePath, file_get_contents($file));
        $nosotros->fondo_url = Storage::url($filePath);  // Guarda la URL pública
    }

    
    // Guarda los cambios en la base de datos
    $nosotros->save();

  
    if ($request->input('from_admin')) {
        return redirect()->route('pages-nosotros-show', ['nosotros_id' => $nosotros->id]);
    } else {
        return redirect()->route('nosotros');
    }
   

}
}