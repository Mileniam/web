const IconoMenu = document.querySelector(".icono-menu"); //constante para llamar al icono del menu

const barralateral = document.querySelector(".barra-lateral"); //lo mismo que el de arriba, ahora con la clase barra-lateral ya que no se puso id

const crearTablero = document.querySelectorAll("creartablero");

const spans = document.querySelectorAll("span");
const as = document.querySelectorAll("p");

//constante para el dark mode
const interruptor = document.querySelector(".switch");

const circulo = document.querySelector(".circulo");

//constan del icono del menu comprimido
const menu = document.querySelector(".menu-pequeno");

const main = document.querySelector("main");

//para hacer que el icono del menu comprimido funcione
menu.addEventListener("click",()=>{
    barralateral.classList.toggle("max-barra-lateral");

    //para cambiar el icono del boton de mostrar menu en responsive
    //si se muestra equis no se muestran las rayistas y viceverse
    if(barralateral.classList.contains("max-barra-lateral")){
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else{
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }

    //agrega estilos cuando la pantalla es muy delgada tipo telefono
    if(window.innerWidth<=320){
        barralateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");

        
        spans.forEach((span)=>{
            span.classList.add("oculto");
        })
    }

    /* el menu del usuario se quita si la barra lateral se quita tambien */

    if(barralateral.classList.contains("max-barra-lateral")){
        subMenu.style.display = "block";
    }
    else{   subMenu.classList.remove("open-menu");    }
 
});

//lo que hace que cuando lo clickee ponga en modo oscuro
interruptor.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("dark-mode");
    //para mover el ciculo del interruptor
    circulo.classList.toggle("prendido");
});


IconoMenu.addEventListener("click",()=>{
    barralateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");

    if(barralateral.classList.contains("mini-barra-lateral")){
        IconoMenu.children[0].style.display = "none";
        IconoMenu.children[1].style.display = "block";
    }
    else{
        IconoMenu.children[0].style.display = "block";
        IconoMenu.children[1].style.display = "none";
    }



    subMenu.classList.toggle("min-configuraciones");

    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    })

});
