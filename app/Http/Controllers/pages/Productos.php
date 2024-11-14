<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Pieza;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Productos extends Controller
{
    public function index()
    {
        $producto = Producto::with(['pieza', 'material'])->get();
    return view('content.pages.productos',['productos'=>$producto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieza=Pieza::where('active', true)->get(); 
        $material=Material::where('active', true)->get();
        return view('content.pages.productos-create', ['piezas'=>$pieza, 'materiales'=>$material]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto= new Producto();
    $producto->nombre_producto=$request->nombre_producto;
    $producto->precio_producto=$request->precio_producto;
    $producto->piezas_id=$request->piezas_id;
    $producto->material_id=$request->material_id;
    $producto->descripcion=$request->descripcion;
    if ($request->hasFile('img_producto')) {
        $file = $request->file('img_producto');
        $name = time() . '.' . $file->getClientOriginalName();
        $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
        Storage::put($filePath, file_get_contents($file));
    
        // Genera la URL pública directamente
        $url = Storage::url($filePath);
        
        // Asigna la URL directamente al modelo
        $producto->img_producto = $url; // No es necesario dividir la URL
    }

    $producto->save();             
    return redirect()->route('pages-productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producto_id){
        $producto=Producto::find($producto_id);
        $pieza=Pieza::where('active', true)->get(); 
        $material=Material::where('active', true)->get();
        return view('content.pages.productos-show' ,['productos'=>$producto,'piezas'=>$pieza, 'materiales'=>$material]);
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
        $producto = Producto::find($request->productos_id);
        $producto->nombre_producto=$request->nombre_producto;
        $producto->precio_producto=$request->precio_producto;
        $producto->piezas_id=$request->piezas_id;
        $producto->material_id=$request->material_id;
        $producto->descripcion=$request->descripcion;
        if ($request->hasFile('img_producto')) {
            $file = $request->file('img_producto');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; // Asegúrate de que esté en la carpeta 'public/images'
            Storage::put($filePath, file_get_contents($file));
        
            // Genera la URL pública directamente
            $url = Storage::url($filePath);
            
            // Asigna la URL directamente al modelo
            $producto->img_producto = $url; // No es necesario dividir la URL
        }
        $producto->save();             
        return redirect()->route('pages-productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto_id){
        $producto = Producto::find($producto_id);
    
    if ($producto) {
        // Obtener la ruta de la imagen
        $imagePath = str_replace('/storage/', 'public/', $producto->img_producto); // Convierte la URL a la ruta de almacenamiento
        
        // Eliminar la imagen del sistema de archivos
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Eliminar el registro de la base de datos
        $producto->delete();
    }
    
    return redirect()->route('pages-productos');
      }

    public function switch($producto_id){
        $producto=Producto::find($producto_id);
        $producto->active= !$producto->active;
        $producto->save();
        return redirect()->route('pages-productos');
      }
}
