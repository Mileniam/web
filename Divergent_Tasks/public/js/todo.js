//para agregar cosas nuevas

const form = document.getElementById("todo-form");
const input = document.getElementById("todo-input");
const todoLane = document.getElementById("todo-lane");
const borrarbtn = document.querySelector(".btn-borrar"); //constante del boton de borrar

form.addEventListener("submit", (e) => {
    e.preventDefault(); 
    const value = input.value;
    
    if (!value) return; //no hay valor ingresado, se devuleve a cero

    
    const newTask = document.createElement("p"); //agregar solo notas de texto
    newTask.classList.add("task"); //add clse task
    newTask.setAttribute("draggable", "true"); //add el atributo de agarrable
    newTask.innerText = value;

    newTask.addEventListener("dragstart", () => {
        newTask.classList.add("is-dragging");
    });

    newTask.addEventListener("dragend", () => {
        newTask.classList.remove("is-dragging");
    });

  
    newTask.appendChild(adddeletebtn());


    todoLane.appendChild(newTask); //agregarle al nuevo nino las cosas de newTask


    //form.submit(); 
    input.value = ""; //valor de la entrada none
});


//funcion del boton de borrar

function adddeletebtn() {

    const deletebtn = document.createElement("button");
  
    deletebtn.textContent = "X"; //le pone una x al botn de eliminar
  
    deletebtn.className = "btn-delete";
  
    deletebtn.addEventListener("click", (e) => {
  
      const item = e.target.parentElement; //cuando picamos el boton se elimina el contenerdos que lo almacena
  
      todoLane.removeChild(item); //elimina el nombre creado de la lista
  
      const items = document.querySelectorAll("p");
  
    });
  
    return deletebtn;
  }






