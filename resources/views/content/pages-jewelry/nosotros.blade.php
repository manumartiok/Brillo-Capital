@php
    $nosotros = App\Models\Nosotro::all();
@endphp

@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')
@foreach ($nosotros as $nosotro)
<style>
  .nosotros {
    height: 800px;
    background-image: linear-gradient(
        0deg,
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)
    ), url({{ $nosotro->fondo_url }});
    background-size: cover;
    background-position: center center;
  }

  .contenedor-texto {
    max-width: 1000px; /* Ancho máximo */
    color: white; /* Color del texto */

   
 
  }
</style>

<section class="nosotros d-flex justify-content-center align-items-center">
  <div class="contenedor-texto">
    {!! $nosotro->contenido !!} <!-- Renderiza el contenido editado en Summernote -->
  </div>
</section>
@endforeach
@endsection