
function mostrar() {
    var nombreTablero = document.getElementsByClassName("nombretablero")[0];

    if(nombreTablero.style.display == "block"){
            nombreTablero.style.display = "none";
        }
    else{ nombreTablero.style.display = "block";}

}