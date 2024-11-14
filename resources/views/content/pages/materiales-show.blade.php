@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar material')

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
        <h5 class="mb-0">Actualizando Material</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-materiales-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="material_id" value="{{$materiales->id}}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Pieza</label>
            <input type="text" name="tipo_material" value="{{$materiales->tipo_material}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
      
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection
