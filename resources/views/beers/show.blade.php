@extends('layouts.app')

@section('title')
    {{-- <h1 class="text-dark text-star ms-5 fs-2 mt-3">Detalle Cerveza</h1>
@endsection --}}

@section('content')
    <x-card 
    img="{{ $beer->img }}" 
    titulo="{{ $beer->name }}" 
    score="{{ $beer->vol / 2.5}}"
    >
    <x-slot:contenido>
        <p>{{ $beer->beertype->name}}</p>
        <p>
        @foreach ($beer->breweries as $brewery )
            <a href="{{ route('brewery.show', $brewery->id) }}" class="btn btn-light border border-2 border-warning px-5">{{ $brewery->name }}</a>   
        @endforeach
        </p>
    </x-slot:contenido>
    </x-card>

<div class="d-flex justify-content-center gap-5">
    <p><a class="btn btn-light border border-2 border-warning" href="{{  route('beers.index') }}">back</a></p>
    @auth
        <p><a class="btn btn-light border border-2 border-warning" href="{{  route('beers.edit', $beer) }}">Edit</a></p>
        <form method="POST" action="{{ route('beers.destroy', $beer)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-light border border-2 border-warning">Delete</button>  
        </form>   
    @endauth
</div>

{{-- <x-flash code="{{ $code }}" :message="$message"/> --}}


@endsection