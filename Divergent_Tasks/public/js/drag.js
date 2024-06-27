const draggables = document.querySelectorAll(".task");
const droppables = document.querySelectorAll(".swin-lane");

//ponerle pone y remueve el color diferente cuando estamos agarrando la nota

draggables.forEach((task) => {
    task.addEventListener("dragstart", () => {
        task.classList.add("is-dragging");

    });
    task.addEventListener("dragend", () =>{
        task.classList.remove("is-dragging");
    });

});

droppables.forEach((zone) => {
    zone.addEventListener("dragover", (e) => {
        e.preventDefault(); 
        /* como a los documentos html no les agrada que 
        les esten insertando otros documentos,
        esto evita los fallos mientras estamos pasando 
        las notas de un lado a otro*/

        const bottomTask = insertAboveTask(zone, e.clientY);
        const curtTask = document.querySelector(".is-dragging"); //toma la tarea que estamos arrastrando actualmente

        /*si no se tiene una tarea inferior se inserta y 
        si la hay se inserta en medio de las dos*/
        if(!bottomTask) {
            zone.appendChild(curtTask); //este agrega las tareas directamente en el fondo de la columna
        } else {
            zone.insertBefore(curtTask, bottomTask);
            //y este en cualquier parte que se desee de la lista
        }

    });
});

const insertAboveTask = (zone, mouseY) => {
    const els = zone.querySelectorAll(".task:not(.is-dragging)"); /*permite agarrar
     solo el documento
     que tienes clikeado y cuando pases por encima de otra
     nota no se adhiera tambie*/

    let closestTask = null;
    let closestOffset = Number.NEGATIVE_INFINITY;

    els.forEach((task) => {
        const { top } = task.getBoundingClientRect(); /*ayuda a obtener 
        la posisicon en Y o superior*/

        const offset = mouseY - top; //ayudando al de arriba pero calculando con el mouse


        /* si nuestro desplazamiento es menor a cero y es mayor al desplazamiento mas cercano, entonces es nuestra nota mas cercana, por lo tanto no se mueve de sitio*/
        if (offset < 0 && offset > closestOffset) {
            closestOffset = offset;
            closestTask = task;
        }
    });

    return closestTask;
};

