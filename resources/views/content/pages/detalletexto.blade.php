@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Detalle Texto')

@section('content')
<h4>Detalle Texto</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-detalletexto-create')}}" class="btn btn-primary">Añadir texto</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Producto</th>
          <th>Texto</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($detalletexto as $detalle)
            <tr>
                <td>{{$detalle->id}}</td>
                <td>{{$detalle->producto->nombre_producto}}</td>
                <td>{{$detalle->texto}}</td>
                <td>
                  @if ($detalle->active)
                  <a href="{{route('pages-detalletexto-switch', $detalle->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-detalletexto-switch', $detalle->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-detalletexto-show', $detalle->id)}}">Editar</a> | <a href="{{route('pages-detalletexto-destroy', $detalle->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
