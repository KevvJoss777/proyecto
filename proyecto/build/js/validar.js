function validarFormulario(){
    let titulo = document.querySelector("[name='titulo']").value;

    if(titulo.length < 3){
        alert("El título debe tener al menos 3 caracteres");
        return false;
    }

    return true;
}