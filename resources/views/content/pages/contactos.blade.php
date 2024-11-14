@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Redes')

@section('content')
<h4>Redes</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-contactos-create')}}" class="btn btn-primary">Añadir nueva red</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Icono</th>
          <th>Texto</th>
          <th>Link</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($contacto as $contacto)
            <tr>
                <td>{{$contacto->id}}</td>
                <td>{{$contacto->redsocial_icono}}</td>
                <td>{{$contacto->redsocial_texto}}</td>
                <td>{{$contacto->redsocial_link}}</td>
                <td>
                  @if ($contacto->active)
                  <a href="{{route('pages-contactos-switch', $contacto->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-contactos-switch', $contacto->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-contactos-show', $contacto->id)}}">Editar</a> | <a href="{{route('pages-contactos-destroy', $contacto->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
