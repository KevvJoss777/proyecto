function validarFormulario(){

let titulo = document.querySelector("[name='titulo']").value.trim();
let autor = document.querySelector("[name='autor']").value.trim();
let anio = document.querySelector("[name='anio']").value;
let isbn = document.querySelector("[name='isbn']").value.trim();
let ejemplares = document.querySelector("[name='ejemplares']").value;

let anioActual = new Date().getFullYear();

if(titulo.length < 3){
alert("El título debe tener al menos 3 caracteres");
return false;
}

if(autor.length < 3){
alert("El autor debe tener al menos 3 caracteres");
return false;
}

if(anio < 1000 || anio > anioActual){
alert("El año ingresado es inválido");
return false;
}

if(!/^[0-9]{10,13}$/.test(isbn)){
    alert("El ISBN debe tener solo números y entre 10 y 13 dígitos");
    return false;
}

if(ejemplares <= 0){
alert("El número de ejemplares debe ser mayor a 0");
return false;
}

return true;
}