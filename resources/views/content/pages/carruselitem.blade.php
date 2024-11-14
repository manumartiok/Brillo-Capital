@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Carrusel Item')

@section('content')
<h4>Carrusel Item</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-carruselitem-create')}}" class="btn btn-primary">Añadir nuevo item</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Producto</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        {{-- Agrupamos los items por producto --}}
        @foreach($carruselitem->groupBy('producto.nombre_producto') as $productoNombre => $items)
          <tr>
            <td colspan="7"><strong>{{ $productoNombre }}</strong></td>
          </tr>
          {{-- Listamos los items dentro del grupo de cada producto --}}
          @foreach($items as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->producto->nombre_producto }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->description }}</td>
              <td>
                @if ($item->photo_path)
                  <img src="{{ asset($item->photo_path) }}" alt="{{ $item->title }}" style="max-width: 150px; max-height: 100px;">
                @else
                  <p>No hay imagen disponible.</p>
                @endif
              </td>
              <td>
                @if ($item->active)
                  <a href="{{ route('pages-carruselitem-switch', $item->id) }}">
                    <span class="badge bg-primary">Activo</span>
                  </a>
                @else
                  <a href="{{ route('pages-carruselitem-switch', $item->id) }}">
                    <span class="badge bg-danger">Inactivo</span>
                  </a>
                @endif
              </td>
              <td>
                <a href="{{ route('pages-carruselitem-show', $item->id) }}">Editar</a> | 
                <a href="{{ route('pages-carruselitem-destroy', $item->id) }}">Borrar</a>
              </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection