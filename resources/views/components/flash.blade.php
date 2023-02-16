@if ($code >= 0) 
    <div id="flash" class="bg-{{$color}} text-white fs-3 text-center mt-4 w-50 rounded rounded-2">
        @if ($code > 0)
            {{ $code }} -
        @endif

        {{ $message }}
    </div>

{{-- Codigo para hacer desaparecer el mensaje en caso de no haber ningun error --}}
   
    @if ($code == 0)
    <script type="text/javascript">
        setTimeout(() => {
            const divFlash = document.getElementById('flash');
            if (divFlash) {
                divFlash.classList.add('d-none');   
            }
        }, 4000);
    </script>
    @endif

@endif