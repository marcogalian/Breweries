@extends('layouts.app')

@section('title')
{{-- <h1 class="text-dark text-star ms-5"> Modificar cerveza </h1>
@endsection --}}

@section('content')
<form method="POST" action="{{ route ('beers.update', $beer) }}"  enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="d-flex justify-content-center align-items-center flex-column">
        <x-card titulo="">
            <x-slot:contenido>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la cerveza</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $beer->name }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo de Cerveza</label>
                    {{-- <input type="hidden" class="form-control" id="type" name="type" rows="3" value="1"> --}}
                    <select class="form-control" name="beertype_id">
                        @foreach ($beertypes as $beertype)
                            @if ($beertype->id == $beer->beertype_id)
                                <option value="{{ $beertype->id }}" selected>{{ $beertype->name }}</option>
                            @else
                                <option value="{{ $beertype->id }}">{{ $beertype->name }}</option>     
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="vol" class="form-label">% de alcohol</label>
                    <input type="number" class="form-control" id="vol" name="vol" placeholder="5" value="{{ $beer->vol }}" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Selecciona un fichero">
                </div>
                <div class="mb-3">
                    <p for="breweries" class="form-check-label">Cervecerías donde se sirve esta cerveza: </p>
                    <div class="row">
                    @foreach ($breweries as $brewery)
                        <div class="col-4">
                        @if($beer->breweries->find($brewery->id))
                            <input type="checkbox" class="form-check-input" id="breweries_{{ $brewery->id }}" name="breweries[]" value="{{ $brewery->id }}" checked>
                        @else
                            <input type="checkbox" class="form-check-input" id="breweries_{{ $brewery->id }}" name="breweries[]" value="{{ $brewery->id }}">
                        @endif
                            <label class="form-check-labe" for="flexCheckDefault"> {{ $brewery->name }}</label>
                        </div>
                    @endforeach
                    </div>
                </div>
            </x-slot:contenido>
        </x-card>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-light border border-2 border-warning px-5">Enviar</button>
        </div>        
    </div>
    
</form>

@endsection
