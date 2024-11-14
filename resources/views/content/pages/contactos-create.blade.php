@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear red')

@section('content')
<div class="row">
  <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando red</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-contactos-store') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="redsocial_icono">Ícono de red social</label>
            <input type="text" name="redsocial_icono" class="form-control" id="redsocial_icono" placeholder="Ícono de red social" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="redsocial_texto">Texto de red social</label>
            <input type="text" name="redsocial_texto" class="form-control" id="redsocial_texto" placeholder="Texto de red social" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="redsocial_link">Enlace de red social</label>
            <input type="text" name="redsocial_link" class="form-control" id="redsocial_link" placeholder="Enlace de red social" required />
          </div>

          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>  
  </div-col-lg-12>
</div>
@endsection