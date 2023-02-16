<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    {{-- Llamada a css mediante vite (para esta opcion hay que instalar npm install y luego cada vez que abramos el preyecto durante el desarrollo hay que iniciar npm run dev) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
    <script src="https://kit.fontawesome.com/752e643d10.js" crossorigin="anonymous"></script>
    <title>Cerveceria</title>
</head>

<body class="body mybodyWall">
    <div class="container-fluid px-0">
        <header>
            @include("layouts.navbar")
        </header>
    </div>


    <main class="vh-100 myMain">
        {{-- <x-title>
            x-title seria la llamanda a nuestro componente title, x-slot llama al atributo $titulo de nuestro componente title y con el @yield pintamos nuestra vista main
            <x-slot:titulo>@yield('title')</x-slot:titulo>
        </x-title> --}}
                @if (Route::currentRouteName() == 'brewery.show' || Route::currentRouteName() == 'beers.show')
                <div class="container-fluid">
                <section class="row justify-content-center px-5">  
                @else
                <div class="container">
                    @yield('contentMain')
                <section class="row row-cols-7 gap-3 px-5">
                @endif  
                        @yield('content')
                        <div class="mt-3 d-flex gap-2 w-25">
                        @isset($errors)
                        @foreach ($errors-> all() as $error)
                        <span class="text-light text-center bg-danger rounded-1">{{ $error }}</span> 
                        @endforeach
                        @endisset
                        </div>
                </section>
                </div>
    </main>


    <div class="">
        @include('layouts.footer')
    </div>

</body>

</html>
