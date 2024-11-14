<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrousel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Carrousels extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carro=Carrousel::all();
    return view('content.pages.foto-carrusel',['fcarro'=>$carro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.foto-carrusel-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carro= new Carrousel();
    $carro->name=$request->name;
    $carro->texto_mayor=$request->texto_mayor;
    $carro->texto_menor=$request->texto_menor;
    if ($request->hasFile('image_url')) {
        $file = $request->file('image_url');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
        Storage::put($filePath, file_get_contents($file));
    
        // Genera la URL pública directamente
        $url = Storage::url($filePath);
        
        // Asigna la URL directamente al modelo
        $carro->image_url = $url; // No es necesario dividir la URL
    }

    $carro->save();             
    return redirect()->route('pages-foto-carrusel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($carro_id){
        $carro=Carrousel::find($carro_id);
        return view('content.pages.foto-carrusel-show' ,['fcarro'=>$carro]);
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
        $carro = Carrousel::find($request->fcarro_id);
        $carro->name=$request->name;
        $carro->texto_mayor=$request->texto_mayor;
        $carro->texto_menor=$request->texto_menor;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
            Storage::put($filePath, file_get_contents($file));
        
            // Genera la URL pública directamente
            $url = Storage::url($filePath);
            
            // Asigna la URL directamente al modelo
            $carro->image_url = $url; // No es necesario dividir la URL
        }
        $carro->save();             
        return redirect()->route('pages-foto-carrusel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($carro_id){
        $carro = Carrousel::find($carro_id);
    
    if ($carro) {
        // Obtener la ruta de la imagen
        $imagePath = str_replace('/storage/', 'public/', $carro->image_url); // Convierte la URL a la ruta de almacenamiento
        
        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Eliminar el registro de la base de datos
        $carro->delete();
    }
    
    return redirect()->route('pages-foto-carrusel');
      }

    public function switch($carro_id){
        $carro=Carrousel::find($carro_id);
        $carro->active= !$carro->active;
        $carro->save();
        return redirect()->route('pages-foto-carrusel');
      }
}
