@extends('layouts.app')

@section('title')

@section('content')
{{-- Ojo no separar en los atributos el signo igual y las comillas, tiene que ir todo seguido sin espacios para que no de errores --}}
<x-card 
    img="{{ $brewery->img }}" 
    titulo="{{ $brewery->name }}" 
    score="{{ $brewery->score}}"
    {{-- contenido="{{ $brewery->description }}" --}}
>
    <x-slot:contenido>
        <div class="row">
            @foreach ($brewery->beers as $beer )
                <a href="{{ route('beers.show', $beer->id) }}" class="btn btn-light border border-2 border-warning px-5">{{ $beer->name }}</a>   
            @endforeach
        </div>
    </x-slot:contenido>
</x-card>

<div class="d-flex justify-content-center gap-5">
        <p><a class="btn btn-light border border-2 border-warning" href="{{  route('brewery.index') }}">back</a></p>
    @if ( (null !== Auth::user()) && ($brewery->user_id == Auth::user()->id))
        <p><a class="btn btn-light border border-2 border-warning" href="{{  route('brewery.edit', $brewery) }}">Edit</a></p>
        <form method="POST" action="{{ route('brewery.destroy', $brewery)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-light border border-2 border-warning">Delete</button>  
        </form>
    @else
        <p>Cerveceria creada por: {{ $brewery->user->name }}</p>
    @endif
</div>

<x-flash code="{{ $code }}" :message="$message"/>
@endsection
