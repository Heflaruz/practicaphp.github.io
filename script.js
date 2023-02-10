let usuario = document.getElementById("username");
let contra = document.getElementById("pwd");
var formulario = document.getElementById("formulario");

if(formulario !== null){
    formulario.onsubmit = function(){
        if(formulario.username.value == "" || formulario.pwd.value == ""){
            usuario.style.border = '1px solid red';
            contra.style.border = '1px solid red';
            return false;
        }else{
            alert("Formulario enviado correctamente")
            usuario.style.border = '1px solid red';
            contra.style.border = '1px solid red';
            return true;
        }
    }
}
