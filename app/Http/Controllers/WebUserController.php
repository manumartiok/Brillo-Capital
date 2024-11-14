<?php

namespace App\Http\Controllers;

use App\Models\WebUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class WebUserController extends Controller
{
     // Mostrar formulario de inicio de sesión
     public function showLoginForm()
     {
         return view('web.login');
     }
 
     // Manejar inicio de sesión
     public function login(Request $request)
     
     {
         $credentials = $request->only('email', 'password');
 
         if (Auth::guard('web_user')->attempt($credentials)) {
             return redirect()->intended('/'); // Redirige al área pública
         }
      
         return back()->withErrors([
             'email' => 'Credenciales incorrectas.',
         ]);
     }
 
     // Mostrar formulario de registro
     public function showRegistrationForm()
     {
         return view('web.register');
     }
 
     // Manejar registro de usuario
     public function register(Request $request)
     {
         // Validación de los datos
         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:web_users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
 
         // Crear nuevo usuario
         $user = WebUser::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         // Iniciar sesión automáticamente después de registrar
         Auth::guard('web_user')->login($user);
 
         return redirect()->intended('/'); // Redirige al área pública
     }
 
     // Cerrar sesión
     public function logout()
     {
         Auth::guard('web_user')->logout();
         return redirect()->route('user.login'); // Redirige a la página de login pública
     }
}
