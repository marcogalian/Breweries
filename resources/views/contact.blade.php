@extends('layouts.app')

@section('title')
{{-- <h1 class="text-dark text-star ms-5"> Contacto </h1>
@endsection --}}

@section('content')
    <form action=" {{ route ('contact') }}" method="post" enctype="multipart/form-data">

        @csrf
        
        <div class="d-flex justify-content-center align-items-center flex-column">
            <x-card titulo="">
                <x-slot:contenido>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tun nombre">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Cuentanos en que podemos ayudarte</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                </x-slot:contenido>
            </x-card>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-light border border-2 border-warning px-5 myLinkBtn">Enviar</button>
            </div>
        </div>
    </form>

    @if (Session::get ('code') !== null)
        <x-flash code="{{ Session::get ('code') }}" message="{{ Session::get ('message')}}"/>      
    @endif

@endsection
