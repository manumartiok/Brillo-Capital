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
    <link rel="icon" type="image/x-icon" href="fotos/anillo.jpeg">
    <!-- Titulo -->
    <title>@yield('title')</title>
    <!-- Cargar jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <!-- navbar  -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar-toggler"> <!--el id debe tener lo mismo que el data-bs-target del button-->
                @foreach ($casas as $casa)
                <a class="navbar-brand" href="#">
                    <img src="{{$casa->logo_url}}" width="50" alt="Logo de pagina">
                </a>
                @endforeach
                <ul class="navbar-nav d-flex justify-content-center align-items-center"> <!--clases bootstrap-->
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
              </div>
              <div class="header-right">
                  <form class="d-flex" role="search" action="{{ route('buscar') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                  <a  href="{{ route('cuenta') }}" rel="noopener noreferrer">
                    <i class="bi bi-person" style="font-size: 200%; margin-right: 20px;" ></i>
                  </a>
              
              </div>
            </div>
          </nav>
       <!-- Menú lateral (Carrito) -->
   
    </header>

    <!-- Contenido  -->
    <div class="">
        @yield('content')
    </div>

    <!-- footer  -->

    <footer class="container-fluid seccion-oscura p-3">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3 text-center">
      <h3>Redes</h3>
      <div class="d-flex justify-content-center">
        @foreach($redes as $red)
        <a href="{{$red->redsocial_link}}" class="mx-2">
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
        <li><a href="tel:{{$pagcontacto->telefono}}">{{$pagcontacto->telefono}}</a></li>
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
     <!-- Summernote JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

     @yield('scripts')  <!-- Asegúrate de tener esta línea aquí -->

    <script>
        // Al hacer clic en el icono del carrito, se despliega el menú
        $('#carrito').click(function (event) {
          event.preventDefault();  // Previene que el enlace abra una nueva página
            $('#sidebarMenu').toggleClass('active');
            $('#carrito').toggleClass('active');
        });
    </script>
</body>
</html>