@extends('layouts.app')

@section('title')
{{-- <h1 class="text-dark text-star ms-5 fs-2 mt-3">Crear Cerveza</h1>
@endsection --}}

@section('content')
<form method="post" action="{{ route ('beers.store') }}" enctype="multipart/form-data">

    @csrf
    <div class="d-flex justify-content-center align-items-center flex-column myForm">
        <x-card titulo="">
            <x-slot:contenido>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la cerveza</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Cerveza"
                        value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="d-block mb-2" for="type" class="form-label">Tipo de cerveza</label>
                    {{-- <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}"> --}}
                    <input type="hidden" class="form-control" id="type" name="type" value="1">
                    <select class="form-control" name="beertype_id">
                        @foreach ($beertypes as $beertype)
                            <option value="{{ $beertype->id }}">{{ $beertype->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="vol" class="form-label">% de alcohol</label>
                    <input type="number" class="form-control" id="vol" name="vol" step="0.01" placeholder="4.5" value="{{ old('vol') }}">
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
                            <label class="form-check-labe" for="flexCheckDefault"> {{ $brewery->name }}</label>
                            <input type="checkbox" class="form-check-input" id="breweries_{{ $brewery->id }}" name="breweries[]" value="{{ $brewery->id }}">
                        </div>
                    @endforeach
                    </div>
                </div>

            </x-slot:contenido>
        </x-card>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-light border border-2 border-warning myLinkBtn px-5">Enviar</button>
        </div>
    </div>

</form>

@endsection
