@extends('layouts.app')

@section('title')
    {{-- <h1 class="text-dark text-star ms-5 fs-2 mt-3">Listado de Cervezas</h1>
@endsection --}}

@section('content')
    @foreach ($beers as $beer)
        <x-card 
            img=" {{ $beer->img }}" 
            titulo="{{ $beer->name }}" 
            contenido="{{ $beer->beertype->name }}" 

            {{-- Aqui en route beers esta en plural porque en las rutas de web.php hemos utilizado resources en lugar de get, post, put etc --}}
            link="{{ route('beers.show', $beer) }}"
            score="{{ ($beer->vol / 2.5) }}"
            id="{{ $beer->id }}" 
            ancho="18rem"
        />  
    @endforeach

    @guest
       <p class="text-center fs-2"> Usuario anónimo </p>
    @endguest
    @auth
        <div class="d-flex justify-content-center my-4">
            <p><a class="btn btn-light border border-2 border-warning myLinkBtn" href="{{  route('beers.create') }}">Nueva cerveza</a></p>
        </div>
    @endauth

@endsection
