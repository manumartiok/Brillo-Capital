@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Red')

@section('content')
<div class="row">
  <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Datos de Redes</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-contactos-update') }}" enctype="multipart/form-data">
        @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="contacto_id" value="{{ $contacto->id ?? '' }}">

            <div class="mb-3">
              <label class="form-label" for="redsocial_icono">Ícono de Red Social</label>
              <input type="text" name="redsocial_icono" value="{{ $contacto->redsocial_icono }}" class="form-control" id="redsocial_icono" placeholder="Ícono de Red Social"/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="redsocial_texto">Texto de Red Social</label>
              <input type="text" name="redsocial_texto" value="{{ $contacto->redsocial_texto }}" class="form-control" id="redsocial_texto" placeholder="Texto de Red Social"/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="redsocial_link">Link de Red Social</label>
              <input type="text" name="redsocial_link" value="{{ $contacto->redsocial_link }}" class="form-control" id="redsocial_link" placeholder="Link de Red Social"/>
            </div>


            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div-col-lg-12>
</div>

@endsection
