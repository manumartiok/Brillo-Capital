<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\DetalleTexto;
use Illuminate\Http\Request;

class DetalleTextos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalletexto = DetalleTexto::all();
        return view('content.pages.detalletexto',['detalletexto'=>$detalletexto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productosDisponibles = Producto::whereDoesntHave('detalletexto')->get();
        return view('content.pages.detalletexto-create', compact('productosDisponibles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalletexto= new DetalleTexto();
    $detalletexto->texto=$request->texto;
    $detalletexto->producto_id = $request->producto_id;
    $detalletexto->save();             
    return redirect()->route('pages-detalletexto',);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($detalletexto_id)
    {
        $detalletexto = DetalleTexto::with('producto')->find($detalletexto_id);
        $productosDisponibles = Producto::whereDoesntHave('detalletexto')->get();
        return view('content.pages.detalletexto-show',['detalletexto'=>$detalletexto], compact('productosDisponibles'));
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
        $detalletexto = DetalleTexto::find($request->detalletexto_id);
        $detalletexto->texto=$request->texto;
        $detalletexto->producto_id = $request->producto_id;
        $detalletexto->save();               
        return redirect()->route('pages-detalletexto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($detalletexto_id){
        $detalletexto = DetalleTexto::find($detalletexto_id);
    
        $detalletexto->delete();
        
        return redirect()->route('pages-detalletexto');
    }
      

    public function switch($detalletexto_id){
        $detalletexto=DetalleTexto::find($detalletexto_id);
        $detalletexto->active= !$detalletexto->active;
        $detalletexto->save();
        return redirect()->route('pages-detalletexto');
      }
}
