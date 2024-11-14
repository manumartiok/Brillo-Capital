<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Pieza;
use Illuminate\Http\Request;

class Piezas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieza=Pieza::all();
    return view('content.pages.piezas',['piezas'=>$pieza]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.piezas-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pieza= new Pieza();
    $pieza->tipo_pieza=$request->tipo_pieza;
    $pieza->save();             
    return redirect()->route('pages-piezas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pieza_id)
    {
        $pieza=Pieza::find($pieza_id);
        return view('content.pages.piezas-show' ,['piezas'=>$pieza]);
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
        $pieza = Pieza::find($request->piezas_id);
        $pieza->tipo_pieza=$request->tipo_pieza;
        $pieza->save();             
        return redirect()->route('pages-piezas');
    }

    public function destroy($pieza_id){
        $pieza = Pieza::find($pieza_id);
    
        $pieza->delete();
        
        return redirect()->route('pages-piezas');
    }
      

    public function switch($pieza_id){
        $pieza=Pieza::find($pieza_id);
        $pieza->active= !$pieza->active;
        $pieza->save();
        return redirect()->route('pages-piezas');
      }
}
