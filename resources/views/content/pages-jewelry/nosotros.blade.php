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
    background-image:linear-gradient(
        0deg,
        rgba(0,0,0,0.5),
        rgba(0,0,0,0.5)
    ), url({{$nosotro->fondo_url}});
    background-size: cover;
    background-position: center center;
     /* Estilo para el área de Summernote */
    }
  #summernote {
    background-color: transparent; /* Fondo transparente */
    border: none; /* Sin borde */
    color: white; /* Color de texto (ajusta según tu diseño) */
  }

  .contenedor-summernote{
    max-width: 1000px; /* Ancho fijo en pantallas grandes */
    margin: 0 auto; /* Centrar el contenedor */
  }

  .note-toolbar {
    display: block !important;
        z-index: 1001; /* Adjust as necessary */
    }

    /* En pantallas más pequeñas, ocupa el 100% */
@media (max-width: 768px) {
    .summernote-container {
        max-width: 100%; /* Ancho completo */
        padding: 0 10px; /* Añadir un poco de espacio a los lados */
    }
}

</style>

<section class="nosotros d-flex justify-content-center align-items-center">
    <form action="{{ route('pages-nosotros-update') }}" method="POST">
    
    @csrf
    <div class="contenedor-summernote">
    <textarea id="summernote" name="contenido">{{ $nosotro->contenido }}</textarea>
        <input type="hidden" name="nosotros_id" value="{{ $nosotro->id }}">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
</section>
    @endforeach

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 700, // Ajusta la altura según tus necesidades
        width:'100%',
        placeholder: 'Escribe aquí...',
        tabsize: 2,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture', 'link']],
            ['misc', ['undo', 'redo']]
        ],
        styleTags: ['h1', 'h2', 'h3', 'p'],
        fontSizes: ['10', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30', '32'],
        callbacks: {
            onInit: function() {
                $('.note-editable').css('background-color', 'transparent');
                $('.note-editable').css('color', 'white');
            }
        }
    });
});
</script>
@endsection