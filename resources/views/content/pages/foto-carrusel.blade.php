@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Foto Carrusel')

@section('content')
<h4>Fotos carrusel</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-foto-carrusel-create')}}" class="btn btn-primary">Añadir nueva foto</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th> 
          <th>Texto-Ma</th>
          <th>Texto-Me</th>
          <th>Imagen</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($fcarro as $carro)
            <tr>
                <td>{{$carro->id}}</td>
                <td>{{$carro->name}}</td>
                <td>{{$carro->texto_mayor}}</td>
                <td>{{$carro->texto_menor}}</td>
                <td>@if ($carro->image_url)
            <img src="{{ asset($carro->image_url) }}" alt="{{ $carro->name }}" style="max-width:500px; max-height:300px;">
        @else
            <p>No hay imagen disponible.</p>
        @endif</td>
                <td>
                  @if ($carro->active)
                  <a href="{{route('pages-foto-carrusel-switch', $carro->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-foto-carrusel-switch', $carro->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-foto-carrusel-show', $carro->id)}}">Editar</a> | <a href="{{route('pages-foto-carrusel-destroy', $carro->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
