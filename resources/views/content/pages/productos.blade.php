@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Productos')

@section('content')
<h4>Productos</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-productos-create')}}" class="btn btn-primary">Añadir nuevo producto</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Pieza</th>
          <th>Material</th>
          <th>Nombre</th> 
          <th>Precio</th>
          <th>Imagen</th>
          <th>Texto</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{ $producto->pieza ? $producto->pieza->tipo_pieza : 'Sin pieza' }}</td>
                <td>{{ $producto->material ? $producto->material->tipo_material : 'Sin material' }}</td>
                <td>{{$producto->nombre_producto}}</td>
                <td>${{$producto->precio_producto}}</td>
                <td>@if ($producto->img_producto)
            <img src="{{ asset($producto->img_producto) }}" alt="{{ $producto->name }}" style="max-width:500px; max-height:300px;">
        @else
            <p>No hay imagen disponible.</p>
        @endif</td>
        <td>{{$producto->descripcion}}</td>
                <td>
                  @if ($producto->active)
                  <a href="{{route('pages-productos-switch', $producto->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-productos-switch', $producto->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-productos-show', $producto->id)}}">Editar</a> | <a href="{{route('pages-productos-destroy', $producto->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
