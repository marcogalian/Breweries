@if (isset($ancho))
    <div class="myCard col-sm-6 card my-2 p-0 border-0" style="width: {{ $ancho }};">
@elseif(Route::currentRouteName() == 'brewery.show' || Route::currentRouteName() == 'beers.show')
    <div class="myCard col-8 card my-2 p-0 border-0 viewShowImg">
@else
    <div class="myCard col-8 card my-2 p-0 border-0 viewShow">
@endif
    @isset($img)
    <img src=" {{ $img }} " class="card-img-top myCardImg" alt="...">  
    @endisset
    <div class="card-body myCardBody">
        <h5 class="card-title"> {{ $titulo }}</h5>
        <p class="card-text myCardText my-0"> {{ $contenido }}</p>
        @isset($score)
        <p class="card-text">
        
        @for($i = 0; $i < env('CT_SCORE_MAX'); $i++)
            @if ($i < $score)
                <img class="score-img" src="{{  asset('img/beer.png') }}"/>  
            @else
                <img class="score-img noScoreImg" src="{{  asset('img/beer.png') }}"/>
            @endif
        @endfor
        
        </p>
        @endisset
        {{-- @isset($id) --}}
        {{-- <a href="{{ route ('brewery.show', ['brewery' => $id ]) }}" class="btn btn-light border border-2 border-warning">Conócenos</a> --}}
        {{-- @endisset --}}
        @isset($link)
            <a href="{{ $link }}" class="btn btn-light border border-2 border-warning myCardBtn">Ver</a>
        @endisset
        
    </div>
</div>
