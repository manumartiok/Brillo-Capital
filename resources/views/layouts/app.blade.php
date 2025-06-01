@php
    $casas = App\Models\Home::all();
    $redes = App\Models\Contacto::all();
    $pagcontactos = App\Models\PagContacto::all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadatos -->
    <meta charset="utf-8"> 
    <meta name="author" content="Nombre">
    <meta name="description" content="Descripcion">
    <meta name="keywords" content="Palabras claves">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Foto de la pagina  -->
    @foreach ($casas as $casa)
    <link rel="icon" type="image/x-icon" href="{{ $casa->logo_url }}">
    @endforeach
    <!-- Titulo -->
    <title>@yield('title')</title>
    <!-- Cargar jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <!-- Letra Google -->
   <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">


    <!-- CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- navbar  -->
    <header >
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('index') }}">
                @foreach ($casas as $casa)
                    <img src="{{ $casa->logo_url }}" width="50" alt="Logo de página">
                @endforeach
            </a>

            <!-- Botón para menú colapsable -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Elementos de navegación -->
            <div class="collapse navbar-collapse " id="navbar-toggler">
                <!-- Menú -->
                <ul class="navbar-nav  d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Casa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('joyeria') ? 'active' : '' }}" href="{{ route('joyeria') }}">Joyería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>

                <!-- Barra de búsqueda e ícono de cuenta -->
                <div class="d-flex justify-content-around align-items-center">
                    <form class="d-flex me-3" role="search" action="{{ route('buscar') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-light" style="color:grey; border-color:grey;" type="submit">Buscar</button>
                    </form>
                    <a href="{{ route('cuenta') }}" class="text-decoration-none">
                        <i class="bi bi-person" style="font-size: 200%"></i>
                    </a>
                  </div>
                </div>
        </div>
    </nav>
</header>

    <!-- Contenido  -->
    <div class="flex-fill">
        @yield('content')
    </div>

    <!-- footer  -->

    <footer class="container-fluid seccion-oscura p-5">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3 text-center">
      <h3>Redes</h3>
      <div class="d-flex justify-content-center">
        @foreach($redes as $red)
        <a href="{{$red->redsocial_link}}" class="mx-2 p-4">
          <i class="{{$red->redsocial_icono}}"></i>
        </a>
        @endforeach
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
      <ul>
        <h3>Nosotros</h3>
        <li><a href="">Política de privacidad</a></li>
        <li><a href="">Términos y condiciones</a></li>
        <li><a href="">Política de envío</a></li>
      </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
      <ul>
        <h3>Ayuda</h3>
        <li><a href="">Mis pedidos</a></li>
        <li><a href="">Cuidado del producto</a></li>
        <li><a href="">Garantía</a></li>
        <li><a href="">Preguntas frecuentes</a></li>
      </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
      <ul>
        <h3>Atención al cliente</h3>
        @foreach($pagcontactos as $pagcontacto)
        <li><a href="https://wa.me/{{$pagcontacto->telefono}}">{{$pagcontacto->telefono}}</a></li>
        <li><a href="mailto:{{$pagcontacto->mail}}">{{$pagcontacto->mail}}</a></li>
        <li><a href="{{$pagcontacto->iframe}}">{{$pagcontacto->direccion}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <div style="color: white; text-align: center; margin-top: 10px;">
    Creador &#169; 2024
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
          tinymce.init({
        selector: 'textarea.editor',
        width: '100%', // O usa un valor más alto si necesitas un tamaño fijo, por ejemplo, '800px'
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor code fontselect fontsizeselect',
        toolbar: 'undo redo | bold italic | fontselect fontsizeselect | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        content_style: 'body { font-family:Arial; font-size:14px; }'
    });

    });
</script>

     @yield('scripts')  <!-- Asegúrate de tener esta línea aquí -->

</body>
</html>