@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resultados de búsqueda para: "{{ $query }}"</h2>
    @if($resultados->isEmpty())
        <p>No se encontraron resultados.</p>
    @else
        <ul class="list-group">
            @foreach($resultados as $resultado)
                <li class="list-group-item">
                    <a href="{{ route('producto.detalle', $resultado->id) }}">
                    <img src="{{$resultado->img_producto }}" alt="{{ $resultado->nombre_producto }}" style="width:300px; height:300px;">
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection