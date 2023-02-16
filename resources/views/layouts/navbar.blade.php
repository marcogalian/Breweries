<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 position-relative myNav">
    <div class="container-fluid">
        <div class="logo-link">
            <a class="navbar-brand fw-bold text-light p-0 m-0" href=" {{ route ('main') }}"><img
                    src="{{ asset('img/logo.png')}}" alt="Logo cervecerias"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link active p-0 me-5 fs-2" aria-current="page" href=" {{ route ('main') }}"><span class="fa-solid fa-house-chimney"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-5" href=" {{ route ('brewery.index') }} ">Cervecerias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-5" href=" {{ route ('beers.index') }} ">Cervezas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-5" href=" {{ route ('contact') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-5" href="#">Acerca de</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
