<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritorio</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/escritorio.css?24062024">

    <!--estilo de las notas-->
    <script src="<?php echo base_url() ?>js/drag.js?24062024" defer></script>
    <script src="<?php echo base_url() ?>js/todo.js?24062024" defer></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/estilodelescritorio.css?24062024">

    <!--estilo del menu del perfil del usuario-->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/menuUsuario.css?24062024">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/mediaqueryEscritorio.css?24062024">

        <!--agregados-->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/botonesayuda.css?24062024">

    <!--estilo de las listas-->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/estilo-listas.css?24062024">

</head>
<body class="body-i">
    
  <div class="body-escritorio">
    <div class="all-menu">

        <div class="menu-pequeno">
                <ion-icon name="menu-outline"></ion-icon>
                <ion-icon name="close-outline"></ion-icon>
       </div>
        
        <div class="barra-lateral">
           <div class="primera-parte">
            <div class="nombre-pagina">
                <div class="icono-menu"> 
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>
                <span>Menu</span>
            </div>

          <div class="b-crear-tablero">  
            <!--botnes de crear taablero y notas-->
            <button class="boton" id="presioname" onclick="mostrar()">
                <ion-icon name="add-circle-outline"></ion-icon>
                <span>Crear Tablero</span>
            </button>

             <!--boton de mensaje-->
                    <span><button class="Ayuda creartablero" onclick="MensajedeAyuda()"><ion-icon name="bulb-outline"></ion-icon></button></span>
                    <div class="mensaje-de-ayuda"><p>Si le das click a este boton puedes crear nuevos tableros.</p></div>
                    <!-- fin boton de mensaje-->
         </div> 
                    <!--fin botones -->


              

            <!--agregar nombres de tableros al menu-->

            <div class="nombretablero">          
                 <div class="search">
                        <form>
                          <span>  <input class="inputTablero" type="text" placeholder="agegar tablero...">
                            <button class="btn-add">+</button> </span>
                        </form>
                </div>
            </div>

            <div class="tableros">
                     <div class="titulo-tableros">
                        <span><h3>Tableros: </h3></span> 

                        <div class="absolute">
                            <!--boton de mensaje-->
                           <span> <button class="Ayuda creartablero" onclick="MensajedeAyuda1()"><ion-icon name="bulb-outline"></ion-icon></button></span>
                            <div class="mensaje-de-ayuda" id="mensaje-1"><p>Aquí abajo apareceran todos tus tableros creados.</p></div>
                            <!-- fin boton de mensaje-->
                           </div>   
                    </div>    


                
                    <div class=" li-container"">
                            <ul><!--el contenerdor de los tableros-->
                                <ul class="ulTablero" id="ulTablero">
                                    <!--donde se van a insertar los tableros cuando se creen-->
                                    <div class="kanban-column">
                                        <div class= "kanban-column-title">
                                        </div>
                                    </div>
                                </ul>
                    
                            <div class="empty">
                                <span>No hay tableros creados.</span>
                            </div>
                            </ul>
            
                        </div>

                     </div>
       
        </div>         


            
            <!--comienzo modo oscuro-->

    <div class="segunda-parte">

            <!--boton de mensaje-->
                    <span><button class="Ayuda creartablero" onclick="MensajedeAyuda2()"><ion-icon name="bulb-outline"></ion-icon></button></span>
                    <div class="mensaje-de-ayuda" id="mensaje-2"><p>Si te molestan los tonos brillantes ¡Ponlo en modo oscuro!</p></div>
                    <!-- fin boton de mensaje-->
        
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">

                        </div>
                    </div>
                </div>
            </div> 
            <!--fin modo oscuro-->



        

             <!--imagen de usuario-->
                    <div class="usuario user-pic" onclick="toggleMenu()">
                        <img src="<?php echo base_url() ?>img/perfil/<?=$_SESSION['ImgPerfil'] ?>" alt="">
                        
                        <!--lo que va dentro del menu de ususario-->
                        <div class="sub-menu-wrap">
                            <div class="sub-menu" id="subMenu">
                                <a href="<?= base_url('/perfiles') ?>" class="sub-menu-link">
                                    <img src="<?php echo base_url() ?>img/setting.png" alt="">
                                    <p>Configuraciones</p>
                                    <p class="flecha-menu-usuario">></p>
                                </a>
                                <a href="#" class="sub-menu-link">
                                    <img src="<?php echo base_url() ?>img/help.png" alt="">
                                    <p>Ayuda y Soporte</p>
                                    <p class="flecha-menu-usuario">></p>
                                </a>
                                <a href=" <?= base_url('logout'); ?>" class="sub-menu-link">
                                    <img src="<?php echo base_url() ?>img/logout.png" alt="">
                                    <p>Salir</p>
                                    <p class="flecha-menu-usuario">></p>
                                </a>
                            </div>
                        </div>

                        <!--informacion del usuario-->
                        <div class="info-usuario">
                            <div class="nombre-email">
                                <span class="nombre"><?php echo $_SESSION['username']; ?></span>
                                <span class="email"><?php echo $_SESSION['Email']; ?></span>
                            </div>
                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                        </div>
                      </div>
                    </div>            
                </div>
            </div> 
      
      <!--fin del menu-->



        
    <!--comienzo del escritorio-->
    <main>
            <div class="board">

                <div class="bombillo-solo">
                        <!--boton de mensaje-->
                    <button class="Ayuda " onclick="MensajedeAyuda3()"><ion-icon name="bulb-outline"></ion-icon></button>
                    <div class="mensaje-de-ayuda" id="mensaje-3"><p>Escribe las nuevas notas que quieras recordar</p></div>
                        <!-- fin boton de mensaje-->
                    
                      <form method="POST" action=" <?= base_url('/escritorio') ?>" id="todo-form">
                          <?= csrf_field(); ?>
                          <input type="text" placeholder="Nueva nota..." name="todo-input" id="todo-input">
                          <button type="submit">Agregar +</button>
                      </form>

                        <!--boton de mensaje-->
                    <button class="Ayuda" onclick="MensajedeAyuda4()"><ion-icon name="bulb-outline"></ion-icon></button>
                    <div class="mensaje-de-ayuda" id="mensaje-4"><p>Aprieta el boton o presiona ¨Enter¨ para guardar tus notas.</p></div>
                        <!-- fin boton de mensaje-->    
                    
                 </div>
                
                    

                <div class="lanes">
                    <div class="swin-lane" id="todo-lane">
                        <h3 class="heading">TODO</h3>

                        <!--boton de mensaje-->
                        <button class="Ayuda titulo-columna" onclick="MensajedeAyuda5()"><ion-icon name="bulb-outline"></ion-icon></button>
                        <div class="mensaje-de-ayuda" id="mensaje-5"><p>Tus notas creadas apareceran aquí, ¡crea tantas como quieras!</p></div>
                        <!-- fin boton de mensaje-->
                        
                    </div>

                    <div class="swin-lane">
                        <h3 class="heading">En Proceso</h3>

                        <!--boton de mensaje-->
                    <button class="Ayuda titulo-columna" onclick="MensajedeAyuda6()"><ion-icon name="bulb-outline"></ion-icon></button>
                    <div class="mensaje-de-ayuda" id="mensaje-6"><p>Puedes mover tus notas agarrandolas con el ratón o ¨mouse¨ y soltandola en cualquera de las columnas.</p></div>
                    <!-- fin boton de mensaje-->

                    </div>

                    <div class="swin-lane">
                        <h3 class="heading">En espera</h3>

                        <!--boton de mensaje-->
                    <button class="Ayuda titulo-columna" onclick="MensajedeAyuda7()"><ion-icon name="bulb-outline"></ion-icon></button>
                    <div class="mensaje-de-ayuda" id="mensaje-7"><p>Coloca aquí las notas que todavia no puedes hacer, pero que siguen pendientes.</p></div>
                    <!-- fin boton de mensaje-->

                    </div>

                    <div class="swin-lane">
                        <h3 class="heading">Terminadas</h3>

                         <!--boton de mensaje-->
                    <button class="Ayuda titulo-columna" onclick="MensajedeAyuda8()"><ion-icon name="bulb-outline"></ion-icon></button>
                    <div class="mensaje-de-ayuda" id="mensaje-8"><p>Aquí pondrás todas tus tareas realizadas.</p></div>
                    <!-- fin boton de mensaje-->

                    </div>
                </div>
            </div>

        </main>
   </div>  

    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <script src="<?php echo base_url() ?>js/script.js?24062024"></script> <!--scrip del menu-->

    <!--PARA CREAR NUEVOS TABLEROS-->

    <script src="<?php echo base_url() ?>js/prueba de boton.js?24062024"></script>  <!--boton de crear tablero-->
    <script src="<?php echo base_url() ?>js/Nlista.js?24062024"></script> <!--para colocar los nombres de los tableros uno abajo del otro-->

     <!--el menu de la imagen de usuario-->
    <script src="<?php echo base_url() ?>js/menuUsuario.js?24062024"></script>

    <!--notitas de uso-->
    <script src="<?php echo base_url() ?>js/tutorial.js?24062024"></script>

</body>
</html>
