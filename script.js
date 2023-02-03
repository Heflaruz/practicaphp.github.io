/**///formulario///**/
//datos
let usuario = document.getElementById("username");
let contra = document.getElementById("pwd");
let formulario = document.getElementById("formulario");
   //funciones
function envia(e){
    let formCorrecto = true;
    e.preventDefault();
    if(usuario.value === ''){
        formCorrecto = false;
        usuario.style.border = '1px solid red';
        window.alert("el campo de usuario es obligatorio");
    } else {
        window.alert("campo usuario lleno");
    }
    if(contra.value === ''){
        formCorrecto = false;
        contra.style.border = '1px solid red';
        window.alert("el campo contraseña es obligatorio");
    }else {
        window.alert("campo contraseña lleno");
    }
    if (formCorrecto) {
        window.alert("LOGIN lleno");
    }else{
        usuario.style.border = '1px solid red';
        contra.style.border = '1px solid red';
        window.alert("Rellene los campos");
    }
}
//eventos
formulario.addEventListener("submit",function(e){envia(e)});