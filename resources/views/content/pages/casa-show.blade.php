@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Casa')

@section('content')
<div class="row">
  <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Datos de la Casa</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-casa-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="home_id" value="{{ $casa->id ?? '' }}">

            <!-- Logo URL -->
            <div class="mb-3">
    <label class="form-label" for="logo-url">Logo</label>
    @if (isset($casa->logo_url) && !empty($casa->logo_url)) <!-- Verifica que la propiedad exista y no esté vacía -->
        <img src="{{ $casa->logo_url }}" alt="Logo" style="width: 20%;" class="img-thumbnail">
    @endif
    <input type="file" name="logo_url" class="form-control" id="logo_url"/>
</div>

            <!-- Título de Productos -->
            <div class="mb-3">
              <label class="form-label" for="productos_titulo">Título Productos</label>
              <input type="text" name="productos_titulo" value="{{ $casa->productos_titulo }}" class="form-control" id="productos_titulo" placeholder="Título de productos"/>
            </div>

            <!-- Producto 1 -->
            <div class="mb-3">
              <label class="form-label" for="producto1_titulo">Título Producto 1</label>
              <input type="text" name="producto1_titulo" value="{{ $casa->producto1_titulo }}" class="form-control" id="producto1_titulo" placeholder="Título Producto 1"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto1_foto">Foto Producto 1</label>
              @if ($casa->producto1_foto)
                <img src="{{ $casa->producto1_foto }}" alt="Producto 1" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="producto1_foto" class="form-control" id="producto1_foto"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto1_texto">Texto Producto 1</label>
              <input type="text" name="producto1_texto" value="{{ $casa->producto1_texto }}" class="form-control" id="producto1_texto" placeholder="Texto Producto 1"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto1_link_boton">Link Botón Producto 1</label>
              <input type="text" name="producto1_link_boton" value="{{ $casa->producto1_link_boton }}" class="form-control" id="producto1_link_boton" placeholder="Link Botón Producto 1"/>
            </div>

            <!-- Producto 2 -->
            <div class="mb-3">
              <label class="form-label" for="producto2_titulo">Título Producto 2</label>
              <input type="text" name="producto2_titulo" value="{{ $casa->producto2_titulo }}" class="form-control" id="producto2_titulo" placeholder="Título Producto 2"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto2_foto">Foto Producto 2</label>
              @if ($casa->producto2_foto)
                <img src="{{ $casa->producto2_foto }}" alt="Producto 2" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="producto2_foto" class="form-control" id="producto2_foto"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto2_texto">Texto Producto 2</label>
              <input type="text" name="producto2_texto" value="{{ $casa->producto2_texto }}" class="form-control" id="producto2_texto" placeholder="Texto Producto 2"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto2_link_boton">Link Botón Producto 2</label>
              <input type="text" name="producto2_link_boton" value="{{ $casa->producto2_link_boton }}" class="form-control" id="producto2_link_boton" placeholder="Link Botón Producto 2"/>
            </div>

            <!-- Producto 3 -->
            <div class="mb-3">
              <label class="form-label" for="producto3_titulo">Título Producto 3</label>
              <input type="text" name="producto3_titulo" value="{{ $casa->producto3_titulo }}" class="form-control" id="producto3_titulo" placeholder="Título Producto 3"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto3_foto">Foto Producto 3</label>
              @if ($casa->producto3_foto)
                <img src="{{ $casa->producto3_foto }}" alt="Producto 3" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="producto3_foto" class="form-control" id="producto3_foto"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto3_texto">Texto Producto 3</label>
              <input type="text" name="producto3_texto" value="{{ $casa->producto3_texto }}" class="form-control" id="producto3_texto" placeholder="Texto Producto 3"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="producto3_link_boton">Link Botón Producto 3</label>
              <input type="text" name="producto3_link_boton" value="{{ $casa->producto3_link_boton }}" class="form-control" id="producto3_link_boton" placeholder="Link Botón Producto 3"/>
            </div>

            <!-- Nosotros Foto 1 -->
            <div class="mb-3">
              <label class="form-label" for="nosotros_foto1">Nosotros Foto 1</label>
              @if ($casa->nosotros_foto1)
                <img src="{{ $casa->nosotros_foto1 }}" alt="Nosotros 1" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="nosotros_foto1" class="form-control" id="nosotros_foto1"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="nosotros_texto1">Texto Nosotros 1</label>
              <input type="text" name="nosotros_texto1" value="{{ $casa->nosotros_texto1 }}" class="form-control" id="nosotros_texto1" placeholder="Texto Nosotros 1"/>
            </div>

            <!-- Nosotros Foto 2 -->
            <div class="mb-3">
              <label class="form-label" for="nosotros_foto2">Nosotros Foto 2</label>
              @if ($casa->nosotros_foto2)
                <img src="{{ $casa->nosotros_foto2 }}" alt="Nosotros 2" style="width: 20%;" class="img-thumbnail">
              @endif
              <input type="file" name="nosotros_foto2" class="form-control" id="nosotros_foto2"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="nosotros_texto2">Texto Nosotros 2</label>
              <input type="text" name="nosotros_texto2" value="{{ $casa->nosotros_texto2 }}" class="form-control" id="nosotros_texto2" placeholder="Texto Nosotros 2"/>
            </div>

            <!-- Selector de Piezas (Clave Foránea) -->
            <div class="mb-3">
              <label class="form-label" for="piezas_id">Selecciona una Pieza</label>
              <select name="piezas_id" class="form-control" id="piezas_id">
                @foreach ($piezas as $pieza)
                  <option value="{{ $pieza->id }}" @if ($casa->piezas_id == $pieza->id) selected @endif>
                    {{ $pieza->tipo_pieza }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div-col-lg-12>
</div>

@endsection
