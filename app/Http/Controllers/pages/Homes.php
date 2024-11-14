<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Homes extends Controller
{
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($casa_id = null)
    {
        // Busca la casa por ID
        $casa = Home::first();

    // Si no existe, crea un nuevo objeto Home
    if (!$casa) {
        $casa = new Home(); // Crear una nueva instancia sin guardarla en la base de datos
    }
        $piezas=Pieza::where('active', true)->get(); 
        return view('content.pages.casa-show' ,['casa'=>$casa, 'piezas'=>$piezas]);
      }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
         // Busca el registro de la casa por su ID
    $casa = Home::find($request->home_id);

    // Si no existe, crea uno nuevo
    if (!$casa) {
        $casa = new Home();
    }

        $casa->productos_titulo=$request->productos_titulo;
        $casa->producto1_titulo=$request->producto1_titulo;
        $casa->producto1_texto=$request->producto1_texto;
        $casa->producto1_link_boton=$request->producto1_link_boton;
        $casa->producto2_titulo=$request->producto2_titulo;
        $casa->producto2_texto=$request->producto2_texto;
        $casa->producto2_link_boton=$request->producto2_link_boton;
        $casa->producto3_titulo=$request->producto3_titulo;
        $casa->producto3_texto=$request->producto3_texto;
        $casa->producto3_link_boton=$request->producto3_link_boton;
        $casa->nosotros_texto1=$request->nosotros_texto1;
        $casa->nosotros_texto2=$request->nosotros_texto2;
        $casa->piezas_id=$request->piezas_id;
       
        

    // Cargar las imágenes y guardar sus rutas
    if ($request->hasFile('logo_url')) {
        $file = $request->file('logo_url');    
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; 
        Storage::put($filePath, file_get_contents($file));
        $casa->logo_url = Storage::url($filePath);  // Guarda la URL pública
    }

    if ($request->hasFile('producto1_foto')) {
        $file = $request->file('producto1_foto');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name;
        Storage::put($filePath, file_get_contents($file));
        $casa->producto1_foto = Storage::url($filePath);
    }

    if ($request->hasFile('producto2_foto')) {
        $file = $request->file('producto2_foto');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name;
        Storage::put($filePath, file_get_contents($file));
        $casa->producto2_foto = Storage::url($filePath);
    }

    if ($request->hasFile('producto3_foto')) {
        $file = $request->file('producto3_foto');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name;
        Storage::put($filePath, file_get_contents($file));
        $casa->producto3_foto = Storage::url($filePath);
    }

    if ($request->hasFile('nosotros_foto1')) {
        $file = $request->file('nosotros_foto1');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name;
        Storage::put($filePath, file_get_contents($file));
        $casa->nosotros_foto1 = Storage::url($filePath);
    }

    if ($request->hasFile('nosotros_foto2')) {
        $file = $request->file('nosotros_foto2');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name;
        Storage::put($filePath, file_get_contents($file));
        $casa->nosotros_foto2 = Storage::url($filePath);
    }

   
    // Guarda los cambios en la base de datos
    $casa->save();

  
    return redirect()->route('pages-casa-show', ['casa_id' => $casa->id]);
    }

   
}
