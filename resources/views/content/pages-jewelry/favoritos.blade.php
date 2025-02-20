@extends('layouts.app')

@section('content')
@auth('web_user')

<div class="container-fluid">
    <h2 class="text-center">Mis Favoritos</h2>
    <div class="row">
        @foreach ($favoritos as $favorito)
            <div class="col-md-4 p-3">
                <div class="card shadow-sm border-light rounded">
                    <!-- Enlace para redirigir al detalle de la pieza -->
                    <a href="{{ route('producto.detalle', $favorito->producto->id) }}" class="text-decoration-none">
                        <!-- Foto de la pieza obtenida desde la relación del producto -->
                        <img src="{{ asset($favorito->producto->img_producto) }}" class="card-img-top" alt="{{ $favorito->producto->nombre }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $favorito->producto->nombre }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($favorito->producto->descripcion, 100) }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
    <p class="text-center">Por favor, <a href="{{ route('inicia-sesion') }}">inicia sesión</a> para ver tus favoritos.</p>
@endauth
@endsection
