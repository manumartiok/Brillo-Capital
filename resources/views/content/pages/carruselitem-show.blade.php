@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizando Item')

@section('content')
<div class="row" id="app">
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
        <h5 class="mb-0">Actualizando item</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-carruselitem-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="carruselitem_id" value="{{$carruselitem->id}}">
            <div class="mb-3">
            <label class="form-label" for="basic-default-company">Imagen del item</label>
            <img :src=" foto.photo_path || '{{$carruselitem->photo_path}}'" alt="" style="width:20%" class="form-control">
            <input type="file" name="photo_path"  class="form-control" id="basic-default-email" @change="subirFoto"/>
          </div>
          <div>
          <label class="form-label" for="selectpickerIcons">Producto</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="producto_id">
              @forelse($productos as $producto)
               <option value="{{$producto->id}}" @if($carruselitem->id==$carruselitem->producto_id) selected @endif>{{$producto->nombre_producto}}</option>

              @empty

              @endforelse
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="title" value="{{$carruselitem->title}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Descripcion</label>
            <input type="text" name="description" value="{{$carruselitem->description}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div>
</div>
@endsection
