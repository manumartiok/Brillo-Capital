@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Piezas')

@section('content')
<h4>Piezas</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-piezas-create')}}" class="btn btn-primary">Añadir nueva pieza</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Pieza</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($piezas as $pieza)
            <tr>
                <td>{{$pieza->id}}</td>
                <td>{{$pieza->tipo_pieza}}</td>
                <td>
                  @if ($pieza->active)
                  <a href="{{route('pages-piezas-switch', $pieza->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-piezas-switch', $pieza->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-piezas-show', $pieza->id)}}">Editar</a> | <a href="{{route('pages-piezas-destroy', $pieza->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
