<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Contactos extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacto=Contacto::all();
    return view('content.pages.contactos',['contacto'=>$contacto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.contactos-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto= new Contacto();
        $contacto->redsocial_icono = $request->redsocial_icono;
        $contacto->redsocial_texto = $request->redsocial_texto;
        $contacto->redsocial_link = $request->redsocial_link;
    $contacto->save();             
    return redirect()->route('pages-contactos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($contacto_id)
    {
        $contacto=Contacto::find($contacto_id);
        return view('content.pages.contactos-show' ,['contacto'=>$contacto]);
      }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contacto = Contacto::find($request->contacto_id);
        $contacto->redsocial_icono = $request->redsocial_icono;
        $contacto->redsocial_texto = $request->redsocial_texto;
        $contacto->redsocial_link = $request->redsocial_link;
        $contacto->save();             
        return redirect()->route('pages-contactos');
    }

    public function destroy($contacto_id){
        $contacto = Contacto::find($contacto_id);
    
        $contacto->delete();
        
        return redirect()->route('pages-contactos');
    }

    public function switch($contacto_id){
        $contacto=Contacto::find($contacto_id);
        $contacto->active= !$contacto->active;
        $contacto->save();
        return redirect()->route('pages-contactos');
      }
   
}

