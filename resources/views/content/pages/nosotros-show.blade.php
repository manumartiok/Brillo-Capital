@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Nosotros')

@section('content')

<style>
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

<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Datos de Nosotros</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-nosotros-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="nosotros_id" value="{{ $nosotros->id ?? '' }}">
            <!-- Campo oculto para indicar que es de la vista de administrador -->
            <input type="hidden" name="from_admin" value="1">

            <!-- Fondo -->
            <div class="mb-3">
              <label class="form-label" for="fondo_url">Nosotros Fondo</label>
              @if (!empty($nosotros->fondo_url))
                <img src="{{ $nosotros->fondo_url }}" alt="Fondo Nosotros" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="fondo_url" class="form-control" id="fondo_url"/>
            </div>
          
            <!-- Texto Summernote -->
            <div class="mb-3 ">
                 <label class="form-label" for="contenido">Texto Summernote</label>
               <textarea id="summernote" name="contenido" class="form-control " placeholder="Texto Summernote">{{ $nosotros->contenido ?? '' }}</textarea>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
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

