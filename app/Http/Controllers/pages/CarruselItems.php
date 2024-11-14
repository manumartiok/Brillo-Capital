<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\CarruselItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarruselItems extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carruselitem = CarruselItem::with('producto')
        ->orderBy('producto_id')  // Ordena por producto
        ->orderBy('created_at', 'asc') // Opcional: también ordena por fecha de creación
        ->get();
        return view('content.pages.carruselitem',['carruselitem'=>$carruselitem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto=Producto::where('active', true)->get();
        return view('content.pages.carruselitem-create', ['productos'=>$producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carruselitem= new CarruselItem();
    $carruselitem->description=$request->description;
    $carruselitem->title=$request->title;
    $carruselitem->producto_id=$request->producto_id;
    if ($request->hasFile('photo_path')) {
        $file = $request->file('photo_path');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
        Storage::put($filePath, file_get_contents($file));
    
        // Genera la URL pública directamente
        $url = Storage::url($filePath);
        
        // Asigna la URL directamente al modelo
        $carruselitem->photo_path = $url; // No es necesario dividir la URL
    }

    $carruselitem->save();             
    return redirect()->route('pages-carruselitem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($carruselitem_id)
    {
        $carruselitem =CarruselItem::find($carruselitem_id);
        $producto = Producto::all();
        return view('content.pages.carruselitem-show',['carruselitem'=>$carruselitem, 'productos'=>$producto]);
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
        $carruselitem= CarruselItem::find($request->carruselitem_id);
    $carruselitem->description=$request->description;
    $carruselitem->title=$request->title;
    $carruselitem->producto_id=$request->producto_id;
    if ($request->hasFile('photo_path')) {
        $file = $request->file('photo_path');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
        Storage::put($filePath, file_get_contents($file));
    
        // Genera la URL pública directamente
        $url = Storage::url($filePath);
        
        // Asigna la URL directamente al modelo
        $carruselitem->photo_path = $url; // No es necesario dividir la URL
    }

    $carruselitem->save();             
    return redirect()->route('pages-carruselitem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($carruselitem_id){
        $carruselitem = CarruselItem::find($carruselitem_id);
    
    if ($carruselitem) {
        // Obtener la ruta de la imagen
        $imagePath = str_replace('/storage/', 'public/', $carruselitem->photo_path); // Convierte la URL a la ruta de almacenamiento
        
        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Eliminar el registro de la base de datos
        $carruselitem->delete();
    }
    
    return redirect()->route('pages-carruselitem');
      }

    public function switch($carruselitem_id){
        $carruselitem=CarruselItem::find($carruselitem_id);
        $carruselitem->active= !$carruselitem->active;
        $carruselitem->save();
        return redirect()->route('pages-carruselitem');
      }
}
