
document.getElementById('submit').addEventListener('click',manejadordeEventos)

function manejadordeEventos() {
   validacionCiudad()
   validacionFecha()
//    validacionAsientos()
}
function validacionCiudad(){
    origen=document.getElementById('city_origin').value
    destino=document.getElementById('city_destiny').value

    if (destino && origen != "") {
        if (origen!=destino) document.getElementById('city_destiny').setCustomValidity("");
        else document.getElementById('city_destiny').setCustomValidity("Las ciudades deben ser diferentes");
    }
    }
function validacionFecha() {

    fecha = new Date(document.getElementById('date').value)
    fechaActual=new Date()

    if (fecha>=fechaActual) document.getElementById('date').setCustomValidity("");
    else document.getElementById('date').setCustomValidity("La fecha debe ser mayor a la actual");
}