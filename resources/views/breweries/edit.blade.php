@extends('layouts.app')

@section('title')
{{-- <h1 class="text-light text-star ms-5"> Editar informacion </h1>
@endsection --}}

@section('content')
<form method="POST" action="{{ route ('brewery.update', $brewery) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="d-flex justify-content-center align-items-center flex-column">
        <x-card titulo="">
            <x-slot:contenido>
                    <input type="hidden" name="id" id="id" value="{{ $brewery->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la cerveceria</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $brewery->name }}" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $brewery->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="score" class="form-label">Puntuacion(sobre 5)</label>
                    <input type="number" class="form-control" id="score" name="score" placeholder="5" value="{{ $brewery->score }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Selecciona un fichero">
                    <h4 style="margin-top: .8rem">Imagen actual:</h4>
                    <img src=" {{ $brewery->img}}" class="rounded-1" style="max-height: 8em">
                </div>
                <div class="mb-3">
                    <p for="breweries" class="form-check-label">Cervezas que se sirven: </p>
                    <div class="row">
                    @foreach ($beers as $beer)
                        <div class="col-4">
                        @if ($brewery->beers->find($beer->id))
                            <input type="checkbox" class="form-check-input" id="beers_{{ $beer->id }}" name="beers[]" value="{{ $beer->id }}" checked>
                        @else
                            <input type="checkbox" class="form-check-input" id="beers_{{ $beer->id }}" name="beers[]" value="{{ $beer->id }}">
                            
                        @endif
                            <label class="form-check-labe" for="flexCheckDefault"> {{ $beer->name }}</label>
                            
                        </div>
                    @endforeach
                    </div>
                </div>
            </x-slot:contenido>
        </x-card>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-light border border-2 border-warning px-5">Confirmar</button>
        </div>
    </div>
</form>

@if (Session::get ('code') !== null)
<x-flash code="{{ Session::get ('code') }}" message="{{ Session::get ('message')}}" />
@endif

@endsection
