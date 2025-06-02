@extends('layouts.app')

@section('content')
<style>
    .container {
      min-height: 700px;
    }

    .card-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
            }
     
</style>
<div class="container">
    <h2 class="text-center mb-4">Resultados de búsqueda para: "{{ $query }}"</h2>

    @if($resultados->isEmpty())
        <div class="alert alert-warning text-center">No se encontraron resultados.</div>
    @else
        <div class="row">
            @foreach($resultados as $resultado)
                <div class="col-md-4 mb-4  card-hover">
                    <div class="card shadow-sm">
                        <a href="{{ route('producto.detalle', $resultado->id) }}" class="text-decoration-none">
                            <img src="{{ $resultado->img_producto }}" class="card-img-top rounded" alt="{{ $resultado->nombre_producto }}" style="height: 300px; object-fit: cover;">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $resultado->nombre_producto }}</h5>
                            <a href="{{ route('producto.detalle', $resultado->id) }}" class="btn btn-primary mt-2">Ver Detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection