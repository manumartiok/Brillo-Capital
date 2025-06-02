@php
    $materiales = App\Models\Material::all();
    $piezas = App\Models\Pieza::all();
    $productos = App\Models\Producto::with('pieza', 'material')->get();
@endphp

@extends('layouts.app')

@section('title', 'Joyeria')

@section('content')
<style>
    

    .favorito-toggle i {
    font-size: 1.2rem;  /* Ajusta el tamaño de la estrella */
    cursor: pointer;
    transition: color 0.2s ease, transform 0.3s ease;
}

    /* Efecto de hover: cuando el mouse pasa sobre la estrella */
    .favorito-toggle:hover i {
        color: gold; /* Cambia el color a dorado al hacer hover */
        transform: scale(1.2); /* Aumenta ligeramente el tamaño */
}

    /* Estilo cuando la estrella está marcada (clickeada) */
    .favorito-toggle.active i {
        color: gold; /* Rellenar la estrella con dorado */
}

   

    .categoria:hover {
        font-weight:bold;
        text-decoration:underline;
    }

    .material:hover {
        font-weight:bold;
        text-decoration:underline;
    }

     .categoria,.material{
        transition: font-weight 0.15s ease, text-decoration 0.3s ease;
    }


    .card-hover:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
        }
     



</style>
    <!-- joyas -->
    <section id="joyas">
        <div class="container py-3">
            <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
    <h6 class="d-none d-md-block">Categorías</h6>
    
    <!-- Menú desplegable para pantallas pequeñas -->
    <div class="d-block d-md-none">
    <h6 class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categorías</h6>
    <ul class="dropdown-menu">
        <li><a href="#" class="categoria" data-categoria="Todos">Todos</a></li>
        @foreach ($piezas as $pieza)
            <li class="dropdown-submenu">
                <a href="#" class="categoria btn dropdown-toggle" data-categoria="{{$pieza->tipo_pieza}}">
                    {{$pieza->tipo_pieza}}
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#" class="material" data-material="Todos">Todos</a></li>
                    @foreach($materiales as $material)
                        <li><a href="#" class="material" data-material="{{$material->tipo_material}}">{{$material->tipo_material}}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    </div>

    <!-- Lista de categorías para pantallas grandes -->
    <div class="d-none d-md-block">
        <ul>
            <li><a href="#" class="categoria" data-categoria="Todos">Todos</a></li>
            @foreach ($piezas as $pieza)
            <li>
                <a href="#" class="categoria" data-categoria="{{$pieza->tipo_pieza}}">{{$pieza->tipo_pieza}}</a>
                <ul>
                    <li><a href="#" class="material" data-material="Todos">Todos</a></li>
                    @foreach($materiales as $material)
                    <li>
                        <a href="#" class="material" data-material="{{$material->tipo_material}}">
                            {{$material->tipo_material}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div>
                        <nav>
                            <ul class="d-flex">
                                <div class="seleccionado">
                                    Joyas / <span id="categoria-seleccionada">Todos</span> <span id="material-seleccionado"></span>
                                </div>  
                            </ul>
                        </nav>
                        <div class="d-flex justify-content-end" style="margin-bottom: 10px;">
                            <select class="form-control w-auto" name="" id="ordenar-precio">
                                <option value="" disabled selected>Ordenar por:</option>
                                <option value="mayor">Mayor a menor</option>
                                <option value="menor">Menor a mayor</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="productos-container">
                        @foreach($productos as $producto)
                        <div class="col-12 col-sm-6 col-lg-4 producto card-hover" 
                            data-pieza="{{$producto->pieza->tipo_pieza}}" 
                            data-material="{{$producto->material->tipo_material}}"
                            data-precio="{{$producto->precio_producto}}">
                            <div class="justify-content-center">
                                <a href="{{ route('producto.detalle', $producto->id) }}">
                                    <img src="{{$producto->img_producto}}" alt="" class="img-fluid" style="height:300px; width:300px;">
                                </a>
                                <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="letra fw-semibold fs-5 text-dark" href="{{ route('producto.detalle', $producto->id) }}">
                                        {{$producto->nombre_producto}}
                                    </a>
                                    <a href="{{ route('favoritos.toggle', $producto->id) }}" class=" btn-sm favorito-toggle" data-id="{{ $producto->id }}">
                                        @if(Auth::guard('web_user')->check())
                                            <i class="{{ Auth::guard('web_user')->user()->favoritos->contains('producto_id', $producto->id) ? 'bi bi-star-fill' : 'bi bi-star' }}"></i>
                                        @else
                                            <i class="bi bi-star"></i> <!-- Icono predeterminado si no está autenticado -->
                                        @endif
                                    </a>
                                </div>
                                <p class="letra fw-semibold fs-6 text-body-secundary">${{number_format($producto->precio_producto,2,',','.')}}</p>
                                
                            </div>
                        </div>
                        @endforeach
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
   document.addEventListener('DOMContentLoaded', () => {
    let categoriaSeleccionada = "Todos";
    let materialSeleccionado = "Todos";

    const categoriaSeleccionadaElem = document.getElementById('categoria-seleccionada');
    const materialSeleccionadoElem = document.getElementById('material-seleccionado');
    const seleccionadoElem = document.querySelector('.seleccionado');
    const ordenarPrecio = document.getElementById('ordenar-precio');
    const productosContainer = document.getElementById('productos-container');

    function filtrarProductos() {
        document.querySelectorAll('.producto').forEach(producto => {
            const tipoPieza = producto.getAttribute('data-pieza');
            const tipoMaterial = producto.getAttribute('data-material');

            let mostrarProducto = true;

            if (categoriaSeleccionada !== "Todos" && tipoPieza !== categoriaSeleccionada) {
                mostrarProducto = false;
            }

            if (materialSeleccionado !== "Todos" && tipoMaterial !== materialSeleccionado) {
                mostrarProducto = false;
            }

            producto.style.display = mostrarProducto ? "block" : "none";
        });

        ordenarProductos();  // Ordenar después de filtrar
    }

    function ordenarProductos() {
        let productos = Array.from(document.querySelectorAll('.producto'));
        let orden = ordenarPrecio.value;

        if (orden === 'mayor') {
            productos.sort((a, b) => parseFloat(b.getAttribute('data-precio')) - parseFloat(a.getAttribute('data-precio')));
        } else if (orden === 'menor') {
            productos.sort((a, b) => parseFloat(a.getAttribute('data-precio')) - parseFloat(b.getAttribute('data-precio')));
        }

        productos.forEach(producto => productosContainer.appendChild(producto)); // Reordenar los productos en el DOM
    }

    // Manejo de clic en categorías
    document.querySelectorAll('.categoria').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();  // Evita la acción predeterminada del enlace
            categoriaSeleccionada = this.getAttribute('data-categoria');
            categoriaSeleccionadaElem.textContent = categoriaSeleccionada;
            materialSeleccionado = "Todos"; // Reiniciar material al cambiar de categoría
            materialSeleccionadoElem.textContent = materialSeleccionado;
            seleccionadoElem.innerHTML = `Joyas / ${categoriaSeleccionada}`;
            filtrarProductos();
        });
    });

    // Manejo de clic en materiales
    document.querySelectorAll('.material').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();  // Evita la acción predeterminada del enlace
            materialSeleccionado = this.getAttribute('data-material');
            materialSeleccionadoElem.textContent = materialSeleccionado;

            // Actualizar categoría seleccionada al seleccionar material
            const categoriaElemento = this.closest('ul').previousElementSibling;
            categoriaSeleccionada = categoriaElemento ? categoriaElemento.getAttribute('data-categoria') : "Todos";

            categoriaSeleccionadaElem.textContent = categoriaSeleccionada;

            seleccionadoElem.innerHTML = materialSeleccionado === "Todos" 
                ? `Joyas / ${categoriaSeleccionada}` 
                : `Joyas / ${categoriaSeleccionada} / ${materialSeleccionado}`;
                
            filtrarProductos();
        });
    });

    // Ordenar productos cuando se selecciona una opción
    ordenarPrecio.addEventListener('change', function() {
        ordenarProductos();  // Ordenar productos cuando se selecciona una opción
    });

    // Manejo de clic en submenú para abrir/cerrar
    document.querySelectorAll('.dropdown-submenu > a').forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault(); 
            e.stopPropagation(); 

            const subMenu = this.nextElementSibling;
            if (subMenu && subMenu.classList.contains('dropdown-menu')) {
                subMenu.classList.toggle('show');
            }
        });
    });
});
</script>
@endsection
