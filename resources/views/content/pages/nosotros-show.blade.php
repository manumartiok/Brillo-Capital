@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Nosotros')

@section('content')

<style>

 

    /* En pantallas más pequeñas, ocupa el 100% */
@media (max-width: 768px) {
   
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
          
            <!-- Texto TinyMCEe -->
            <div class="mb-3">
                 <label class="form-label" for="contenido">Texto</label>
               <textarea  name="contenido" class="form-control editor" placeholder="Texto">{{ $nosotros->contenido ?? '' }}</textarea>
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


@endsection

