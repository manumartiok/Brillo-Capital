@php
    $materiales = App\Models\Material::all();
    $piezas = App\Models\Pieza::all();
    $productos = App\Models\Producto::with('pieza', 'material', 'carruselItems')->get();
    $item = App\Models\CarruselItem::all();
@endphp

@extends('layouts.app')

@section('title', 'Producto')

@section('content')
<section class="container py-5">
    <div class="row align-items-center">
        <!-- Carrusel -->
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <div id="carouselExample" class="carousel slide shadow rounded">
                <div class="carousel-inner">
                    @foreach ($producto->carruselItems as $key => $item)
                        <div class="carousel-item @if($key === 0) active @endif">
                            <img src="{{ asset($item->photo_path) }}" class="d-block w-100 rounded" alt="{{ $item->title }}">
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
        
        <!-- Información del producto -->
        <div class="col-12 col-md-6">
            <div class="p-4 border rounded shadow-sm bg-light">
                <span class="d-block fw-bold text-secondary">{{ $producto->pieza->tipo_pieza }} - {{ $producto->material->tipo_material }}</span>
                <h2 class="mt-2">{{ $producto->nombre_producto }}</h2>
                <h4 class="text-primary fw-bold">$<span id="producto-precio">{{ $producto->precio_producto }}</span></h4>
                <p class="text-muted">{{ $producto->descripcion }}</p>
                
                <!-- Selección de talle según tipo de pieza -->
                @if (in_array($producto->pieza->tipo_pieza, ['Anillo', 'Cadena', 'Pulsera']))
                    <div class="mb-3">
                        <label for="producto-talle" class="form-label fw-semibold">Seleccionar talle</label>
                        <select id="producto-talle" class="form-select" required>
                            <option value="" disabled selected>Seleccionar talle</option>

                            @if ($producto->pieza->tipo_pieza == 'Anillo')
                            @for ($i = 8; $i <= 32; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            @elseif ($producto->pieza->tipo_pieza == 'Cadena')
                            @for ($i = 40; $i <= 60; $i += 5)
                                <option value="{{ $i }}">{{ $i }}cm</option>
                            @endfor
                            @elseif ($producto->pieza->tipo_pieza == 'Pulsera')
                            @for ($i = 18; $i <= 24; $i++)
                                <option value="{{ $i }}">{{ $i }}cm</option>
                            @endfor
                            @endif
                        </select>
                    </div>
                @endif
                
                <!-- Botón de consulta -->
                <button type="button" class="btn btn-success w-100" id="consultarBtn">Consultar por WhatsApp</button>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
 document.getElementById('consultarBtn').addEventListener('click', function() {
    console.log("Botón clickeado");

    const tipoPiezaElement = document.querySelector('span.d-block.fw-bold.text-secondary');
    const precioProductoElement = document.getElementById('producto-precio');
    const talleProductoElement = document.getElementById('producto-talle');
    const nombreProductoElement = document.querySelector('h2.mt-2');  // Obtener el nombre del producto
    
    if (!tipoPiezaElement || !precioProductoElement) {
        console.error("No se encontraron los elementos en el DOM");
        return;
    }

    const tipoPieza = tipoPiezaElement.innerText;
    const precioProducto = precioProductoElement.innerText;
    const nombreProducto = nombreProductoElement.innerText;  // Obtener el nombre del producto

    // Verifica si el producto tiene un selector de talle
    let talleProducto = '';
    if (talleProductoElement) {
        talleProducto = talleProductoElement.value;
    }

    // Si el producto tiene talle y no está seleccionado, muestra el alerta
    if (talleProductoElement && !talleProducto) {
        alert('Por favor, selecciona un talle.');
        return;
    }

    // Crear el mensaje
    let mensaje = `Hola, estoy interesado en el producto:${nombreProducto} (${tipoPieza}).\nPrecio: $${precioProducto}.`;
    
    // Si hay talle, lo agrega al mensaje
    if (talleProducto) {
        mensaje += `\nTalle: ${talleProducto}`;
    }

    // Codificar el mensaje para URL
    const mensajeCodificado = encodeURIComponent(mensaje);

    // Definir el número de WhatsApp
    const numeroWhatsApp = '5491123457339';

    // Usar la URL de WhatsApp Web
    const urlWhatsApp = `https://web.whatsapp.com/send?phone=${numeroWhatsApp}&text=${mensajeCodificado}`;

    console.log("URL generada:", urlWhatsApp);

    // Crear un enlace dinámico
    const enlace = document.createElement('a');
    enlace.href = urlWhatsApp;
    enlace.target = '_blank';
    enlace.click();
});


</script>
@endsection
