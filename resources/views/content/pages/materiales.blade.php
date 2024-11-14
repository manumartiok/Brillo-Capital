@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Materiales')

@section('content')
<h4>Materiales</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-materiales-create')}}" class="btn btn-primary">Añadir nuevo material</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Material</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($materiales as $material)
            <tr>
                <td>{{$material->id}}</td>
                <td>{{$material->tipo_material}}</td>
                <td>
                  @if ($material->active)
                  <a href="{{route('pages-materiales-switch', $material->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-materiales-switch', $material->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-materiales-show', $material->id)}}">Editar</a> | <a href="{{route('pages-materiales-destroy', $material->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
