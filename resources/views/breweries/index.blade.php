@extends('layouts.app')

@section('title')

@section('content')
    @foreach ($breweries as $brewery)
        {{-- Al recorrer los datos de la base de datos dejan de ser un array normal y pasan a ser un array de objetos, entonces en lugar de acceder a su posicion $brewery[1] hay que acceder a la clave en la cual queremos saber su valor $brewery->name --}}
        <x-card 
            img=" {{ $brewery->img}}" 
            titulo="{{ $brewery->name }}" 
            link="{{ route('brewery.show', $brewery) }}"
            score="{{ $brewery->score }}"
            ancho="18rem">
            <x-slot:contenido>
                <p>{{ $brewery->description }}</p>
                <p class="my-0">Creada por: {{ $brewery->user->name}}</p>
            </x-slot:contenido>
        </x-card>
    @endforeach
    
    @guest
       <p class="text-center fs-2"> Usuario anónimo </p>
    @endguest
    @auth
        <div class="d-flex justify-content-around my-4">
            <p><a class="btn btn-light border border-2 border-warning myLinkBtn" href="{{  route('brewery.create') }}">New brewery</a></p>
        </div>
    @endauth

    
@endsection

