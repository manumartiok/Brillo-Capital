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
    <section class="p-5 my-5" >
    <div class="container-fluid" >
  <div class="row g-5" >
    <div class="col-12 col-md-4 mb-4">
      <h2>Contáctanos</h2>
      @foreach($redes as $red)
      <div class="p-1">
        <i class="pe-1 {{$red->redsocial_icono}}"></i><a href="{{$red->redsocial_link}}">{{$red->redsocial_texto}}</a>
      </div>
      @endforeach
      @foreach($pagcontactos as $pagcontacto)
      <div class="p-1">
        <p class="m-0"><i class="bi bi-envelope"></i> {{$pagcontacto->mail}}</p>
      </div>
      <div class="p-1">
        <p class="m-0"><i class="bi bi-geo-alt"></i> {{$pagcontacto->direccion}}</p>
      </div>
      <div class="p-1 d-flex flex-column flex-grow-1">
        <iframe class="flex-grow-1 w-100" src="{{$pagcontacto->iframe}}" frameborder="0" style="min-height: 200px; height: 35vh;"></iframe>
      </div>
      @endforeach
    </div>
    
    <div class="col-12 col-md-4 mb-4">
  <h2>Consultas</h2>
  <form action="" class="d-flex flex-column h-100">
    <div class="mb-3">
      <label class="form-label" for="">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre" required />
    </div>
    <div class="mb-3">
      <label class="form-label" for="">Mail</label>
      <input type="email" class="form-control" placeholder="Email" required />
    </div>
    <div class="mb-3">
      <label class="form-label" for="">Teléfono</label>
      <input type="number" class="form-control" placeholder="1123456789" />
    </div>
    <div class="mb-3 flex-grow-1 d-flex flex-column">
      <label class="form-label" for="">Detalle</label>
      <textarea class="form-control flex-grow-1" rows="3"></textarea>
    </div>
    <button class="btn w-100 mt-auto" type="button">Enviar</button>
  </form>
</div>

<div class="col-12 col-md-4 mb-4">
  <h2>Personalizado</h2>
  <form action="" class="d-flex flex-column h-100">
    <div class="mb-3">
      <label class="form-label" for="">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre" required />
    </div>
    <div class="mb-3">
      <label class="form-label" for="">Mail</label>
      <input type="email" class="form-control" placeholder="Email" required />
    </div>
    <div class="mb-3">
      <label class="form-label" for="">Teléfono</label>
      <input type="number" class="form-control" placeholder="1123456789" />
    </div>
    <div class="mb-3 flex-grow-1 d-flex flex-column">
      <label class="form-label" for="">Detalle</label>
      <textarea class="form-control flex-grow-1" rows="3"></textarea>
      <select class="form-select mt-2" name="pieza_id">
        <option value="" disabled selected>Tipo de pieza</option>
        @foreach ($piezas as $pieza)
        <option value="{{$pieza->id}}">{{$pieza->tipo_pieza}}</option>
        @endforeach
      </select>
    </div>
    <button class="btn w-100 mt-auto" type="button">Enviar</button>
  </form>
</div>



  </div>
</div>
    </section>
@endsection

