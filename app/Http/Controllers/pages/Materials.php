<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Materials extends Controller
{
    public function index()
    {
        $material=Material::all();
    return view('content.pages.materiales',['materiales'=>$material]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.materiales-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material= new Material();
    $material->tipo_material=$request->tipo_material;
    $material->save();             
    return redirect()->route('pages-materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($material_id)
    {
        $material=Material::find($material_id);
        return view('content.pages.materiales-show' ,['materiales'=>$material]);
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
        $material = Material::find($request->material_id);
        $material->tipo_material=$request->tipo_material;
        $material->save();             
        return redirect()->route('pages-materiales');
    }

    public function destroy($material_id){
        $material = Material::find($material_id);
    
        $material->delete();
        
        return redirect()->route('pages-materiales');
    }
      

    public function switch($material_id){
        $material=Material::find($material_id);
        $material->active= !$material->active;
        $material->save();
        return redirect()->route('pages-materiales');
      }
}
