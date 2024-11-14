@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Contacto')

@section('content')
<div class="row">
    <div-col-lg-12>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Actualizando Contacto</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pages-pagcontacto-update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pagcontacto_id" value="{{ $pagcontacto->id ?? '' }}">

                    <div class="mb-3">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $pagcontacto->telefono }}" class="form-control" id="telefono" placeholder="Teléfono" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="mail">Correo Electrónico</label>
                        <input type="text" name="mail" value="{{ $pagcontacto->mail }}" class="form-control" id="mail" placeholder="Correo Electrónico" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="direccion">Dirección</label>
                        <input type="text" name="direccion" value="{{ $pagcontacto->direccion }}" class="form-control" id="direccion" placeholder="Dirección" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="iframe">Iframe de Google Maps</label>
                        <textarea name="iframe" class="form-control" id="iframe" rows="3" placeholder="Código de iframe para Google Maps">{{ $pagcontacto->iframe }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div-col-lg-12>
</div>
@endsection
