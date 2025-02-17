@php
    $fcarro = App\Models\Carrousel::all();
    $piezas = App\Models\Pieza::all();
    $casas = App\Models\Home::all();
@endphp

@extends('layouts.app')

@section('title', 'Casa')

@section('content')
     <!-- carrousel  -->
    <section>
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
        @foreach($fcarro as $key => $carro)
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
      </div>
        <div class="carousel-inner">
        @foreach($fcarro as $key => $carro)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset($carro->image_url) }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h4>{{$carro->texto_mayor}}</h5>
              <p class="fw-semibold">{{$carro->texto_menor}}</p>
            </div>
          </div> 
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <!-- Productos  -->

    @foreach ($casas as $casa)
    <section class="productos seccion-clara">
      <div class="container text-center">
      <h1 class="display-4 mb-4">{{$casa->productos_titulo}}</h1>
        <div class="row justify-content-center p-2">
            <div class="col-12 col-md-6 col-lg-4 mb-4 contenedor-productos ">
                <div class="shadow-sm border-0 p-2 ">
                    <h4>{{$casa->producto1_titulo}}</h2>
                    <a href="joyeria">
                    <img src="{{$casa->producto1_foto}}" alt="" class="mb-2">
                    </a>
                    <h6 class="mb-2">{{$casa->producto1_texto}}</h5>
                    
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 contenedor-productos">
                <div class="shadow-sm border-0 p-2">
                    <h4>{{$casa->producto2_titulo}}</h2>
                    <a href="joyeria">
                    <img src="{{$casa->producto2_foto}}" alt="" class="mb-2">
                    </a>
                    <h6 class="mb-2">{{$casa->producto2_texto}}</h5>
                    
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 contenedor-productos">
                <div class="shadow-sm border-0 p-2">
                    <h4>{{$casa->producto3_titulo}}</h2>
                    <a href="joyeria">
                    <img src="{{$casa->producto3_foto}}" alt="" class="mb-2">
                    </a>
                    <h6 class="mb-2">{{$casa->producto3_texto}}</h5>
              
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!-- Presentacion  -->

    <section class="container-fluid presentacion seccion-oscura py-3">
      <div>
        <div class="d-flex presentacion-jaula ">
          <img class="d-none d-md-block" src="{{$casa->nosotros_foto1}}" alt="" style="height:300px; width:300px;">
          <p class="fs-5 p-3">{{$casa->nosotros_texto1}}</p>
        </div>
        <div class="d-flex presentacion-jaula">
          <p class="d-none d-md-block fs-5 p-3">{{$casa->nosotros_texto2}}</p>
          <img src="{{$casa->nosotros_foto2}}" alt="" style="height:300px; width:300px;">
        </div>
      </div>
    </section>
    @endforeach

    <!-- Contacto rápido -->
    <section class="container text-center py-5">
        <h2 class="display-4 mb-4">Contacto</h2>
        <div class="d-flex row justify-content-around contacto-rapido">
            <!-- Formulario Consultas -->
                <div class="col-12 col-lg-6 mb-4">
        <h3 class="h4">Consultas</h3>
        <form method="post" action="">
            <div class="mb-3">
                <input class="form-control" type="text" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="number" placeholder="Teléfono" required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="email" placeholder="Correo electrónico" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" maxlength="200" cols="60" rows="3" placeholder="Mensaje" style="width:100%" required></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>

            <!-- Formulario Personalizado rápido -->
            <div class="col-12 col-lg-6 mb-4">
                <h3 class="h4">Personalizado rápido</h3>
                <form method="post" action="">
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <input class="form-control" type="number" placeholder="Teléfono" required>
        </div>
        <div class="mb-3">
            <input class="form-control" type="email" placeholder="Correo electrónico" required>
        </div>
        <div class="mb-3">
            <select class="form-control" name="" id="" required>
                <option value="" disabled selected>Tipo de pieza</option>
                @foreach ($piezas as $pieza)
                    <option value="{{ $pieza->id }}">{{ $pieza->tipo_pieza }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <textarea class="form-control" maxlength="200" cols="60" rows="3" placeholder="Mensaje" style="width:100%" required></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
            </div>
        </div>
    </section>
@endsection