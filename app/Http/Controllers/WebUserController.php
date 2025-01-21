<?php

namespace App\Http\Controllers;

use App\Models\WebUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebUserController extends Controller
{
   public function register(Request $request){
        $user=new WebUser();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        $user->save();

         // Loguear al usuario usando el guard 'web_user'
         Auth::guard('web_user')->login($user);

        return redirect()->route('index');
   }

   public function login(Request $request){


     
     $credentials = $request->validate([
        'name' => 'required|string',  // Usar name en lugar de email
        'password' => 'required|string',
    ]);
 
  

    if (Auth::guard('web_user')->attempt(['name' => $request->name, 'password' => $request->password])) {
        $user = Auth::guard('web_user')->user();
        
        return redirect()->route('cuenta');
    }
  

    

      return back()->withErrors([
        'name' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
      ]);
    }
 

   public function logout(Request $request){
        
     // Cerrar sesión con el guard 'web_user'
     Auth::guard('web_user')->logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
   }
}
