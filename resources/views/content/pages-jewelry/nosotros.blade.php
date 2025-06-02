@php
    $nosotros = App\Models\Nosotro::all();
@endphp

@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')
@foreach ($nosotros as $nosotro)
<style>
  .nosotros {
    min-height: 100vh; /* Ocupa al menos el 100% de la altura de la pantalla */
    max-width: 100%;
    max-height: 100%;
    background-image: linear-gradient(
        0deg,
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)
    ), url("{{ $nosotro->fondo_url }}");
    background-size: cover;
    background-position: center center;
  }

  .contenedor-texto {
    max-width: 1000px; /* Ancho máximo */
    max-height: 100%; /* Evita que el contenido se desborde */
    padding: 100px 0 100px 0;
  }
</style>

<section class="container-fluid nosotros d-flex justify-content-center align-items-center">
  <div class="contenedor-texto">
    {!! $nosotro->contenido !!} <!-- Renderiza el contenido editado en Summernote -->
  </div>
</section>
@endforeach
@endsection