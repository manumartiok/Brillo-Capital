@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar')

@section('content')

<div class="row">
  <div class="col-lg-12"> <!-- Corregido el tag de columna -->
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Editando texto</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-detalletexto-update') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="detalletexto_id" value="{{$detalletexto->id}}">

          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Producto</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="producto_id">
              @forelse($productosDisponibles as $detalle)
                <option value="{{$detalle->id}}">{{$detalle->nombre_producto}}</option>
              @empty
                <option disabled>No hay productos disponibles</option>
              @endforelse
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="texto">Texto</label>
            <input type="text" value="{{$detalletexto->texto}}" name="texto" class="form-control" id="texto" placeholder="Texto" />
          </div>

          <!-- Botón para enviar el formulario -->
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>  
  </div>
</div>

@endsection
