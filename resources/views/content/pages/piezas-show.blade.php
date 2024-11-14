@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar pieza')

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
        <h5 class="mb-0">Actualizando Pieza</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-piezas-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="piezas_id" value="{{$piezas->id}}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Pieza</label>
            <input type="text" name="tipo_pieza" value="{{$piezas->tipo_pieza}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
      
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection
