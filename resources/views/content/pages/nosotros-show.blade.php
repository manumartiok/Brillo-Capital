@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Nosotros')

@section('content')
<div class="row">
  <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Datos de nosotros</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-nosotros-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="nosotros_id" value="{{ $nosotros->id ?? '' }}">
            <!-- Campo oculto para indicar que es de la vista de administrador -->
    <input type="hidden" name="from_admin" value="1">

            <div class="mb-3">
              <label class="form-label" for="fondo_url">Nosotros Fondo</label>
              @if ($nosotros->fondo_url)
                <img src="{{ $nosotros->fondo_url }}" alt="Nosotros 2" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="fondo_url" class="form-control" id="fondo_url"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="texto">Texto Nosotros</label>
              <input type="text" name="texto" value="{{ $nosotros->texto }}" class="form-control" id="texto" placeholder="Texto Nosotros"/>
            </div>
            <div class="mb-3">
                 <label class="form-label" for="contenido">Texto Summernote</label>
               <textarea id="summernote" name="contenido" class="form-control" placeholder="Texto Summernote">{{ $nosotros->contenido }}</textarea>
            </div>


            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div-col-lg-12>
</div>

@endsection
