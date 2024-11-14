@extends('layouts.app')

@section('title', 'Cuenta')

@section('content')
<section class="container cuenta d-flex justify-content-center align-items-center">

  <!-- Inicio de sesion  -->
  <div class="row" id="loginForm">
    <h2>Iniciar sesión</h2>
    <form method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="col-12 mb-3">
            <label class="form-label" for="username">Usuario</label>
            <input type="text" name="email" class="form-control" id="username" placeholder="Correo electrónico" required />
        </div>
        <div class="col-12 mb-3">
            <label class="form-label" for="passwordInput">Contraseña</label>
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Contraseña" required />
            <button type="button" id="togglePassword">Mostrar</button>
        </div>
        <div class="col-12 mb-3">
            <a href="{{ route('password.request') }}" id="forgotPasswordLink">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="col-12 mb-3">
            <button class="btn btn-primary" type="submit">Iniciar sesión</button>
        </div>
        <div class="col-12 mb-3">
            <a href="#" id="createAccountLink">Crear una cuenta</a>
        </div>
    </form>
</div>


      <!-- Olvidar contraseña  -->
      <div id="forgotPasswordForm" class="hidden row">
    <h2>Recuperar Contraseña</h2>
    <form method="POST" action="{{ route('user.password.email') }}">
        @csrf
        <div class="col-12 mb-3">
            <label class="form-label" for="email">Correo electrónico</label>
            <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico" required />
        </div>
        <div class="col-12 mb-3">
            <button type="submit" id="sendRecoveryBtn">Enviar</button>
        </div>
        <!-- Enlace para volver -->
        <div class="col-12 mb-3">
            <a href="#" id="backToLoginFromForgot">Iniciar sesión</a>
        </div>
    </form>
</div>
      <!-- Crear cuenta  -->

      <div id="createAccountForm" class="hidden row">
    <h2>Crear Cuenta</h2>
    <form method="POST" action="{{ route('user.register') }}">
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
            <button type="submit" id="createAccountSubmit">Registrarse</button>
        </div>
        <!-- Enlace para volver -->
        <div class="col-12 mb-3">
            <a href="#" id="backToLoginFromCreate">Iniciar sesión</a>
        </div>
    </form>
</div>

      <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('passwordInput');
            const toggleButton = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = 'Ocultar';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = 'Mostrar';
            }
        });


      

// Mostrar formulario de "Olvidar contraseña"
document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
    e.preventDefault(); // Evitar que el enlace recargue la página
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('forgotPasswordForm').classList.remove('hidden');
});

// Mostrar formulario de "Crear cuenta"
document.getElementById('createAccountLink').addEventListener('click', function (e) {
    e.preventDefault(); // Evitar que el enlace recargue la página
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('createAccountForm').classList.remove('hidden');
});

// Volver al formulario de inicio de sesión desde "Olvidar contraseña"
document.getElementById('backToLoginFromForgot').addEventListener('click', function (e) {
    e.preventDefault(); // Evitar que el enlace recargue la página
    document.getElementById('forgotPasswordForm').classList.add('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
});

// Volver al formulario de inicio de sesión desde "Crear cuenta"
document.getElementById('backToLoginFromCreate').addEventListener('click', function (e) {
    e.preventDefault(); // Evitar que el enlace recargue la página
    document.getElementById('createAccountForm').classList.add('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
});

    </script>
</section>
@endsection