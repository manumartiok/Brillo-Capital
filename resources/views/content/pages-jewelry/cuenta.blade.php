@extends('layouts.app')

@section('title', 'Cuenta')

@section('content')
<section class="container cuenta d-flex justify-content-center align-items-center position-relative">

    <!-- Mostrar mensajes flash -->
    @if (session('message'))
        <div id="alertMessage" class="alert alert-warning position-absolute w-100 text-center">
            {{ session('message') }}
        </div>
    @endif

    @auth('web_user')
    <div class="row">
        <h2>Perfil de {{ Auth::guard('web_user')->user()->name }}</h2>
        <p>Correo electrónico: {{ Auth::guard('web_user')->user()->email }}</p>
        <a href="{{ route('mi-cuenta.favoritos') }}" class="btn btn-outline-warning mb-3">Mis Favoritos</a>

        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
    @endauth

    @guest('web_user')
    <div class="row" id="loginForm" class="{{ Auth::guard('web_user')->check() ? 'hidden' : '' }}">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="{{ route('inicia-sesion') }}">
            @csrf
            <div class="col-12 mb-3">
                <label class="form-label" for="username">Usuario</label>
                <input type="text" name="name" class="form-control" id="username" placeholder="Nombre" required />
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="passwordInput">Contraseña</label>
                <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Contraseña" required />
                <button type="button" id="togglePassword">Mostrar</button>
            </div>
            <div class="col-12 mb-3">
                <a href="#" id="forgotPasswordLink">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
            </div>
            <div class="col-12 mb-3">
                <a href="#" id="createAccountLink">Crear una cuenta</a>
            </div>
        </form>
    </div>
    @endguest

    <!-- Olvidar contraseña -->
    <div id="forgotPasswordForm" class="hidden row">
        <h2>Recuperar Contraseña</h2>
        <form method="POST" action=" ">
            @csrf
            <div class="col-12 mb-3">
                <label class="form-label" for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico" required />
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-primary" type="submit" id="sendRecoveryBtn">Enviar</button>
            </div>
            <div class="col-12 mb-3">
                <a href="#" id="backToLoginFromForgot">Iniciar sesión</a>
            </div>
        </form>
    </div>

    <!-- Crear cuenta -->
    <div id="createAccountForm" class="hidden row">
        <h2>Crear Cuenta</h2>
        <form method="POST" action="{{route('validar-registro')}}">
            @csrf
            <div class="col-12 mb-3">
                <label class="form-label" for="username">Usuario</label>
                <input type="text" name="name" class="form-control" placeholder="Usuario" required />
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required />
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-primary" type="submit" id="createAccountSubmit">Registrarse</button>
            </div>
            <div class="col-12 mb-3">
                <a href="#" id="backToLoginFromCreate">Iniciar sesión</a>
            </div>
        </form>
    </div>

    <script>
        // Código JavaScript para mostrar y ocultar formularios
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('passwordInput');
            const toggleButton = document.getElementById('togglePassword');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            toggleButton.textContent = passwordInput.type === 'password' ? 'Mostrar' : 'Ocultar';
        });

        document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('forgotPasswordForm').classList.remove('hidden');
        });

        document.getElementById('createAccountLink').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('createAccountForm').classList.remove('hidden');
        });

        document.getElementById('backToLoginFromForgot').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('forgotPasswordForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        });

        document.getElementById('backToLoginFromCreate').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('createAccountForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        });

        // Agrega un evento al documento para que, al hacer clic, oculte el mensaje
        document.addEventListener("click", function() {
        var alertMessage = document.getElementById("alertMessage");
        if (alertMessage) {
            alertMessage.style.display = "none";
        }
        });

    </script>
</section>
@endsection