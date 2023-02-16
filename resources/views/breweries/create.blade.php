@extends('layouts.app')

@section('title')
{{-- <h1 class="text-light text-star ms-5"> Nueva cerveceria </h1>
@endsection --}}

@section('content')
<form method="post" action="{{ route ('brewery.store') }}"  enctype="multipart/form-data">

    @csrf
    <div class="d-flex justify-content-center align-items-center flex-column">
        <x-card titulo="">
            <x-slot:contenido>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la cerveceria</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Cerveceria" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="score" class="form-label">Puntuacion(sobre 5)</label>
                    <input type="number" class="form-control" id="score" name="score" placeholder="5" value="{{ old('score') }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Selecciona un fichero">
                </div>
            </x-slot:contenido>
        </x-card>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-light border border-2 border-warning px-5">Enviar</button>
        </div>        
    </div>
    
</form>

@if (Session::get ('code') !== null)
<x-flash code="{{ Session::get ('code') }}" message="{{ Session::get ('message')}}" />
@endif

@endsection
