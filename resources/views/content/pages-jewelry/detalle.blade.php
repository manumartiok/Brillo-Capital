@php
    $materiales = App\Models\Material::all();
    $piezas = App\Models\Pieza::all();
    $productos = App\Models\Producto::with('pieza', 'material', 'carruselItems')->get();
    $item = App\Models\CarruselItem::all();
@endphp

@extends('layouts.app')

@section('title', 'Producto')

@section('content')

    <section>
        <div class="row">
            <div class="col-12 col-md-6">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($producto->carruselItems as $key => $item)
                        <div class="carousel-item @if($key === 0) active @endif">
                            <img src="{{ asset($item->photo_path) }}" class="d-block w-100" alt="{{ $item->title }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
            <div class="col-12 col-md-6">
                <form id="productForm">
                    <span id="producto-tipo">{{ $producto->pieza->tipo_pieza }} - {{ $producto->material->tipo_material }}</span>
                    <h2 id="producto-nombre">{{ $producto->nombre_producto }}</h2>
                    <div class="d-flex">
                        <label for="">$</label>
                        <label id="producto-precio">{{ $producto->precio_producto }}</label>
                    </div>
                    <h3>{{ $producto->descripcion }}</h3>
                    <div>
                        <select id="producto-talle" required>
                            <option value="" disabled selected>Seleccionar talle</option>
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" id="consultarBtn">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    document.getElementById('consultarBtn').addEventListener('click', function() {
        const tipoPieza = document.getElementById('producto-tipo').innerText;
        const precioProducto = document.getElementById('producto-precio').innerText;
        const talleProducto = document.getElementById('producto-talle').value;

        if (!talleProducto) {
            alert('Por favor, selecciona un talle.');
            return;
        }

        const mensaje = `Hola, estoy interesado en el producto: ${tipoPieza}.\nPrecio: $${precioProducto}.\nTalle: ${talleProducto}`;
        const numeroWhatsApp = '1123457339'; // Reemplaza con el número de WhatsApp al que quieres enviar el mensaje.
        const urlWhatsApp = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${encodeURIComponent(mensaje)}`;

        window.open(urlWhatsApp, '_blank');
    });
</script>
@endsection