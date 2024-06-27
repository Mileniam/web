const inputTablero = document.querySelector(".inputTablero"); //const del input de insertar nombre del tablero
const addBtn = document.querySelector(".btn-add"); //constante del boton de anadir
const ul = document.querySelector(".ulTablero");// const de la list de tableros
const empty = document.querySelector(".empty");//const de el div que muestra el mensaje de no hay tableros creados

//boton de agregar que reacciona cuando se hace click

addBtn.addEventListener("click", (i) => {
  i.preventDefault(); //hace que no se recargue la pagina

  const text = inputTablero.value;

    if (text !== "") {
      const li = document.createElement("li"); //crea el elemento en la lista
 
      const p = document.createElement("p"); //crea el tablero en formato de ancla

      p.textContent = text; //le pone el nombre colocaldo en la constante text a este parrafo

      li.appendChild(p); //le agrega a la lista la constante p creada que tiene le nombre del tablero

      li.appendChild(addDeleteBtn()); //le agrega el boton de eliminar a los elementos creados
      ul.appendChild(li);  //le agrega el li al ul de las listas de tableros creados

      inputTablero.value = "";
      empty.style.display = "none";
  }
});

//funcion del boton de borrar

function addDeleteBtn() {
  const deleteBtn = document.createElement("button");

  deleteBtn.textContent = "X"; //le pone una x al botn de eliminar

  deleteBtn.className = "btn-delete";

  deleteBtn.addEventListener("click", (i) => {

    const item = i.target.parentElement; //cuando picamos el boton se elimina el contenerdos que lo almacena

    ul.removeChild(item); //elimina el nombre creado de la lista

    const items = document.querySelectorAll("li");

    if (items.length === 0) {
      empty.style.display = "block";
    }
  });

  return deleteBtn;
}