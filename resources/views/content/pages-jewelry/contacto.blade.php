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
    <section class=" contacto ">
    <div class="container py-4 my-md-5" >
  <div class="row justify-content-around g-5" style="margin-top:20px">
    <div class="col-12 col-md-4 mb-4">
      <h2>Contáctanos</h2>
      @foreach($redes as $red)
      <div>
        <i class="{{$red->redsocial_icono}}"></i><a href="{{$red->redsocial_link}}">{{$red->redsocial_texto}}</a>
      </div>
      @endforeach
      @foreach($pagcontactos as $pagcontacto)
      <div>
        <p><i class="bi bi-envelope"></i> {{$pagcontacto->mail}}</p>
      </div>
      <div>
        <p><i class="bi bi-geo-alt"></i> {{$pagcontacto->direccion}}</p>
      </div>
      <div>
        <iframe src="{{$pagcontacto->iframe}}" frameborder="0" style="width: 100%; height: 200px;"></iframe>
      </div>
      @endforeach
    </div>
    
    <div class="col-12 col-md-4 mb-4">
      <h2>Consultas</h2>
      <form action="">
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
        <div class="mb-3">
          <label class="form-label" for="">Detalle</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="button">Enviar</button>
      </form>
    </div>

    <div class="col-12 col-md-4 mb-4">
      <h2>Personalizado</h2>
      <form action="">
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
        <div class="mb-3">
          <label class="form-label" for="">Detalle</label>
          <textarea class="form-control" rows="3"></textarea>
          <select class="form-select mt-2" name="pieza_id">
            <option value="" disabled selected>Tipo de pieza</option>
            @foreach ($piezas as $pieza)
            <option value="{{$pieza->id}}">{{$pieza->tipo_pieza}}</option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-primary" type="button">Enviar</button>
      </form>
    </div>
  </div>
</div>
    </section>
@endsection

