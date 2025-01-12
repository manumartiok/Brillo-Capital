<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class BusquedaController extends Controller
{
    //
    public function buscar(Request $request)
    {
        $query = $request->input('query');

        // Realizar la búsqueda en la base de datos
        $resultados = Producto::where('nombre_producto', 'LIKE', "%$query%")
            ->orWhere('img_producto', 'LIKE', "%$query%")
            ->orWhere('descripcion', 'LIKE', "%$query%")
            ->get();

        // Retornar una vista con los resultados
        return view('content.pages-jewelry.resultados', compact('resultados', 'query'));
    }
}
