<div class="text-mail">
    <h1 class="mt-3">Contacto desde la web</h1>
    <hr>
    <div class="d-flex justify-content-start mt-2">
    <h4>Nombre: {{ $cnname }}</h4>
    <h4>Email: {{ $cnfrom }}</h4>
    </div>
    <hr>
    <div class="d-flex justify-content-start">
    <h4>Consulta:</h4>
    <h5>{{ $cnbody }}</h5>
    </div>
</div>

<style>
.text-mail {
    font-family: 'Roboto', sans-serif;
}

</style>