<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebUserController;
use App\Http\Controllers\BusquedaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    
    // Imagenes Carrusel

    Route::get('/foto-carrusel', $controller_path . '\pages\Carrousels@index')->name('pages-foto-carrusel'); 
    Route::get('/foto-carrusel/create', $controller_path . '\pages\Carrousels@create')->name('pages-foto-carrusel-create');
    Route::post('/foto-carrusel/store', $controller_path . '\pages\Carrousels@store')->name('pages-foto-carrusel-store');
    Route::get('/foto-carrusel/show/{carro_id}', $controller_path . '\pages\Carrousels@show')->name('pages-foto-carrusel-show');
    Route::post('/foto-carrusel/update', $controller_path . '\pages\Carrousels@update')->name('pages-foto-carrusel-update');
    Route::get('/foto-carrusel/destroy/{carro_id}', $controller_path . '\pages\Carrousels@destroy')->name('pages-foto-carrusel-destroy');
    Route::get('/foto-carrusel/switch/{carro_id}', $controller_path . '\pages\Carrousels@switch')->name('pages-foto-carrusel-switch');
    
    // Menu casa
    Route::get('/casa/show/{casa_id}', $controller_path . '\pages\Homes@show')->name('pages-casa-show');
    Route::post('/casa/update', $controller_path . '\pages\Homes@update')->name('pages-casa-update');

     // Menu nosotros
     Route::get('/nosotros/show/{nosotros_id}', $controller_path . '\pages\Nosotros@show')->name('pages-nosotros-show');
     Route::post('/nosotros/update', $controller_path . '\pages\Nosotros@update')->name('pages-nosotros-update');

     // Menu contacto
     Route::get('/pagcontacto/show/{pagcontacto_id}', $controller_path . '\pages\PagContactos@show')->name('pages-pagcontacto-show');
     Route::post('/pagcontacto/update', $controller_path . '\pages\PagContactos@update')->name('pages-pagcontacto-update');

    // Redes
    Route::get('/contactos', $controller_path . '\pages\Contactos@index')->name('pages-contactos'); 
    Route::get('/contactos/create', $controller_path . '\pages\Contactos@create')->name('pages-contactos-create');
    Route::post('/contactos/store', $controller_path . '\pages\Contactos@store')->name('pages-contactos-store');
    Route::get('/contactos/show/{contacto_id}', $controller_path . '\pages\Contactos@show')->name('pages-contactos-show');
    Route::post('/contactos/update', $controller_path . '\pages\Contactos@update')->name('pages-contactos-update');
    Route::get('/contactos/destroy/{contacto_id}', $controller_path . '\pages\Contactos@destroy')->name('pages-contactos-destroy');
    Route::get('/contactos/switch/{contacto_id}', $controller_path . '\pages\Contactos@switch')->name('pages-contactos-switch');
  
    // piezas
    Route::get('/piezas', $controller_path . '\pages\Piezas@index')->name('pages-piezas'); 
    Route::get('/piezas/create', $controller_path . '\pages\Piezas@create')->name('pages-piezas-create');
    Route::post('/piezas/store', $controller_path . '\pages\Piezas@store')->name('pages-piezas-store');
    Route::get('/piezas/show/{pieza_id}', $controller_path . '\pages\Piezas@show')->name('pages-piezas-show');
    Route::post('/piezas/update', $controller_path . '\pages\Piezas@update')->name('pages-piezas-update');
    Route::get('/piezas/destroy/{pieza_id}', $controller_path . '\pages\Piezas@destroy')->name('pages-piezas-destroy');
    Route::get('/piezas/switch/{pieza_id}', $controller_path . '\pages\Piezas@switch')->name('pages-piezas-switch');

    // Materiales
    Route::get('/materiales', $controller_path . '\pages\Materials@index')->name('pages-materiales'); 
    Route::get('/materiales/create', $controller_path . '\pages\Materials@create')->name('pages-materiales-create');
    Route::post('/materiales/store', $controller_path . '\pages\Materials@store')->name('pages-materiales-store');
    Route::get('/materiales/show/{material_id}', $controller_path . '\pages\Materials@show')->name('pages-materiales-show');
    Route::post('/materiales/update', $controller_path . '\pages\Materials@update')->name('pages-materiales-update');
    Route::get('/materiales/destroy/{material_id}', $controller_path . '\pages\Materials@destroy')->name('pages-materiales-destroy');
    Route::get('/materiales/switch/{material_id}', $controller_path . '\pages\Materials@switch')->name('pages-materiales-switch');
    
    // Productos
    Route::get('/productos', $controller_path . '\pages\Productos@index')->name('pages-productos'); 
    Route::get('/productos/create', $controller_path . '\pages\Productos@create')->name('pages-productos-create');
    Route::post('/productos/store', $controller_path . '\pages\Productos@store')->name('pages-productos-store');
    Route::get('/productos/show/{producto_id}', $controller_path . '\pages\Productos@show')->name('pages-productos-show');
    Route::post('/productos/update', $controller_path . '\pages\Productos@update')->name('pages-productos-update');
    Route::get('/productos/destroy/{producto_id}', $controller_path . '\pages\Productos@destroy')->name('pages-productos-destroy');
    Route::get('/productos/switch/{producto_id}', $controller_path . '\pages\Productos@switch')->name('pages-productos-switch');

    // Detalle texto
    Route::get('/detalletexto', $controller_path . '\pages\DetalleTextos@index')->name('pages-detalletexto'); 
    Route::get('/detalletexto/create', $controller_path . '\pages\DetalleTextos@create')->name('pages-detalletexto-create');
    Route::post('/detalletexto/store', $controller_path . '\pages\DetalleTextos@store')->name('pages-detalletexto-store');
    Route::get('/detalletexto/show/{detalletexto_id}', $controller_path . '\pages\DetalleTextos@show')->name('pages-detalletexto-show');
    Route::post('/detalletexto/update', $controller_path . '\pages\DetalleTextos@update')->name('pages-detalletexto-update');
    Route::get('/detalletexto/destroy/{detalletexto_id}', $controller_path . '\pages\DetalleTextos@destroy')->name('pages-detalletexto-destroy');
    Route::get('/detalletexto/switch/{detalletexto_id}', $controller_path . '\pages\DetalleTextos@switch')->name('pages-detalletexto-switch');

    // CarruselItem
    Route::get('/carruselitem', $controller_path . '\pages\CarruselItems@index')->name('pages-carruselitem'); 
    Route::get('/carruselitem/create', $controller_path . '\pages\CarruselItems@create')->name('pages-carruselitem-create');
    Route::post('/carruselitem/store', $controller_path . '\pages\CarruselItems@store')->name('pages-carruselitem-store');
    Route::get('/carruselitem/show/{carruselitem_id}', $controller_path . '\pages\CarruselItems@show')->name('pages-carruselitem-show');
    Route::post('/carruselitem/update', $controller_path . '\pages\CarruselItems@update')->name('pages-carruselitem-update');
    Route::get('/carruselitem/destroy/{carruselitem_id}', $controller_path . '\pages\CarruselItems@destroy')->name('pages-carruselitem-destroy');
    Route::get('/carruselitem/switch/{carruselitem_id}', $controller_path . '\pages\CarruselItems@switch')->name('pages-carruselitem-switch');

});



Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar');

Route::get('/detalle/{id}', function ($id) {
    // Cargar el producto específico junto con el detalleTexto usando el ID
    $producto = App\Models\Producto::with('pieza', 'material')->findOrFail($id);
    return view('content.pages-jewelry.detalle', compact('producto'));
})->name('producto.detalle');

Route::get('/index', function () {
    return view('content.pages-jewelry.index');
})->name('index');

Route::get('/nosotros', function () {
    return view('content.pages-jewelry.nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('content.pages-jewelry.contacto');
})->name('contacto');

Route::get('/joyeria', function () {
    return view('content.pages-jewelry.joyeria');
})->name('joyeria');

Route::get('/cuenta', function () {
    return view('content.pages-jewelry.cuenta');
})->name('cuenta');

Route::post('/validar-registro',[WebUserController::class,'register'])->name('validar-registro');
Route::post('/inicia-sesion',[WebUserController::class,'login'])->name('inicia-sesion');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/cuenta');
})->name('logout');