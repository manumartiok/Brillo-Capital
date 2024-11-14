@php
    $nosotros = App\Models\Nosotro::all();
    $piezas = App\Models\Pieza::all();
    $pagcontactos = App\Models\PagContacto::all();
    $redes = App\Models\Contacto::all();
@endphp

@extends('layouts.app')

@section('title', 'Contacto')
@section('content')
    <!-- contacto  -->
    <section class="container-fluid contacto d-flex justify-content-around">

      <div>
        
        <h2>Contactanos</h2>
        @foreach($redes as $red)
        <div>
          <i class="{{$red->redsocial_icono}}"></i><a href="{{$red->redsocial_link}}">{{$red->redsocial_texto}}</a>
        </div>
        @endforeach
        @foreach($pagcontactos as $pagcontacto)
        <div>
        <p><i class="bi bi-envelope"></i>{{$pagcontacto->mail}}</p>
        </div>
        <div>
        <p><i class="bi bi-geo-alt"></i>{{$pagcontacto->direccion}}</p>
        </div>
        <div>
          <iframe src="{{$pagcontacto->iframe}}" frameborder="0"></iframe>
        </div>
        @endforeach
      </div>  
      <div class="contacto-container">
        <h2>Consultas</h2>
        <form action="">
        <div class="mb-3">
          <label class="form-label" for="">Nombre</label>
          <input type="text" name="" class="form-control" id="" placeholder="Nombre" required/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="">Mail</label>
            <input type="text" name="" class="form-control" id="" placeholder="Email" required/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="">Telefono</label>
            <input type="number" name="" class="form-control" id="" placeholder="1123456789"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="">Detalle</label>
          <textarea class="form-control" type="text" name="" id="" cols="60" rows="3"></textarea>
        </div> 
        <button class="btn btn-primary" type="button">Button</button>
        </form>
      </div>
      <div class="contacto-container">
        <h2>Personalizado</h2>
        <form action="">
          <div class="mb-3">
            <label class="form-label" for="">Nombre</label>
            <input type="text" name="" class="form-control" id="" placeholder="Nombre" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="">Mail</label>
              <input type="text" name="" class="form-control" id="" placeholder="Email" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="">Telefono</label>
              <input type="number" name="" class="form-control" id="" placeholder="1123456789"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="">Detalle</label>
            <textarea class="form-control" type="text" name="" id="" cols="60" rows="3"></textarea>
            
            <select class="mail-item" name="pieza_id" id="" >
              <option value="" disabled selected>Tipo de pieza</option>
              @foreach ($piezas as $pieza)
              <option value="{{$pieza->id}}">{{$pieza->tipo_pieza}}</option>
              @endforeach
            </select>
          </div> 
          <button class="btn btn-primary" type="button">Button</button>
          </form>
      </div>
    </section>
@endsection

