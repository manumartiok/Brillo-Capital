@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando Producto')

@section('content')

<div class="row">
  <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif -->
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando producto</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-productos-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label class="form-label" for="basic-default-company">Imagen del producto</label>
            <input type="file" name="img_producto" class="form-control" id="basic-default-email"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Pieza</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="piezas_id">
              @forelse($piezas as $pieza)
               <option value="{{$pieza->id}}" >{{$pieza->tipo_pieza}}</option>

              @empty

              @endforelse
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Material</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="material_id">
              @forelse($materiales as $material)
               <option value="{{$material->id}}">{{$material->tipo_material}}</option>

              @empty

              @endforelse
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="nombre_producto" class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Precio</label>
            <input type="text" name="precio_producto" class="form-control" id="basic-default-fullname"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection
