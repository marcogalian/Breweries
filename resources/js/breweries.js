// Este tipo de funcion (anonima) no se puede utilizar si estamos utilizando vite
function hola () {
    alert ('Hola como estas');
}

// Hay que utilizarla de este modo
window.hola = function (){
    alert ('Hola que pasa');
}

