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
              <h5>{{$carro->texto_mayor}}</h5>
              <p>{{$carro->texto_menor}}</p>
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
      <div class="container-fluid text-center">
      <h1>{{$casa->productos_titulo}}</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 contenedor-productos">
                <h2>{{$casa->producto1_titulo}}</h2>
                <img src="{{$casa->producto1_foto}}" alt="">
                <h5>{{$casa->producto1_texto}}</h5>
                <button class="btn btn-primary" type="button">{{$casa->producto1_link_boton}}</button>
            </div>
            <div class="col-12 col-md-6 col-lg-4 contenedor-productos">
                <h2>{{$casa->producto2_titulo}}</h2>
                <img src="{{$casa->producto2_foto}}" alt="">
                <h5>{{$casa->producto2_texto}}</h5>
                <button class="btn btn-primary" type="button">{{$casa->producto2_link_boton}}</button>
            </div>
            <div class="col-12 col-md-6 col-lg-4 contenedor-productos">
                <h2>{{$casa->producto3_titulo}}</h2>
                <img src="{{$casa->producto3_foto}}" alt="">
                <h5>{{$casa->producto3_texto}}</h5>
                <button class="btn btn-primary" type="button">{{$casa->producto3_link_boton}}</button>
            </div>
        </div>
    </div>
</section>
    
    <!-- Presentacion  -->

    <section class="container-fluid presentacion seccion-oscura">
      <div>
        <div class="d-flex presentacion-jaula">
          <img src="{{$casa->nosotros_foto1}}" alt="" style="height:300px; width:300px;">
          <p>{{$casa->nosotros_texto1}}</p>
        </div>
        <div class="d-flex presentacion-jaula">
          <p>{{$casa->nosotros_texto2}}</p>
          <img src="{{$casa->nosotros_foto2}}" alt="" style="height:300px; width:300px;">
        </div>
      </div>
    </section>
    @endforeach

    <!-- Contacto rapido  -->

    <section class="container-fluid text-center">
      <h2>Contacto</h2>
    <div class="d-flex justify-content-around contacto-rapido">
      <div >
        <h3>Consultas</h3>
        <form method="post" action="">
        <div >
          <input class="mail-item" type="text" placeholder="Nombre">
          <input type="number" placeholder="Telefono">
          <input type="text" placeholder="Correo electronico">
        </div>
        <div>
          <textarea class="mail-item" maxlength="200" type="text" name="" id="" cols="60" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="button">Button</button>
      </form>
      </div>
      <div>
        <h3>Personalizado rapido</h3>
        <form method="post" action="">
        <div>
          <input class="mail-item" type="text" placeholder="Nombre">
          <input class="mail-item" type="number" placeholder="Telefono">
          <input class="mail-item" type="text" placeholder="Correo electronico">
          <select class="mail-item" name="" id="" >
            <option value="" disabled selected>Tipo de pieza</option>
            @foreach ($piezas as $pieza)
              <option value="{{$pieza->id}}">{{$pieza->tipo_pieza}}</option>
              @endforeach
          </select>
        </div>
        <div class="container-fluid">
          <textarea class="mail-item" maxlength="200" type="text" name="" id="" cols="60" rows="3"></textarea>
        </div>
        <button class="btn btn-primary" type="button">Button</button>
      </div>
    </form>
    </div>
    </section>
@endsection