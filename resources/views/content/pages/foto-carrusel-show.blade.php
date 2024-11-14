@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizando foto carrusel')

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
        <h5 class="mb-0">Actualizando foto de carrusel</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-foto-carrusel-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="fcarro_id" value="{{$fcarro->id}}">
            <div class="mb-3">
            <label class="form-label" for="basic-default-company">Imagen del carrusel</label>
            <img src="{{$fcarro->image_url}}" alt="" style="width:20%" class="form-control">
            <input type="file" name="image_url" value="{{$fcarro->image_url}}" class="form-control" id="basic-default-email"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="name" value="{{$fcarro->name}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Texto Mayor</label>
            <input type="text" name="texto_mayor" value="{{$fcarro->texto_mayor}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Texto Menor</label>
            <input type="text" name="texto_menor" value="{{$fcarro->texto_menor}}" class="form-control" id="basic-default-fullname"/>

          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection
