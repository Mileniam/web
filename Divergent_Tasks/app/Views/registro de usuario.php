<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="<?php

use CodeIgniter\Controller;

 echo base_url() ?>img/logo2.gbr.ico">
    <title>Registro de Usuario</title>


     <link href="<?php echo base_url() ?>css/init.css?24062024" rel="stylesheet">
     <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- llamado a los estilos    -->

    <style>
        a{                      
            text-decoration: none;
            list-style: none;
          }
    </style>
</head>
<body> 

    <header class="header">

    <div class="menu container">
            <a href="notas" class="logo"><img src="<?php echo base_url()?>img/pulpi.png" alt=""></a>

            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img class="menu-icono" src="<?php echo base_url() ?>img/menu.png" >
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="notas">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contáctanos</a></li>
                    <li><a href="https://www.facebook.com/people/Divergent-Task/61561491329213/" target="_blank"><ion-icon name="logo-facebook"></ion-icon> </a></li>
                </ul>    
            </nav>
        </div>
    </header>    

    <section class="notas">

        <form method="POST" action=" <?= base_url('/registrousuario') ?>"  autocomplete="off" >

            <?= csrf_field(); ?>

            <h2>Registro</h2>

            <label for="username">Usuario</label>
            <input type="text" name= "username" id="username" value="" required>

            <label for="password">Contraseña</label>
            <input type="password" name= "password" id="password" value=""  required>

            <label for="password2">Repite tu contraseña</label>
            <input type="password" name= "password2" id="password2" value=""  required>

            <label for="Email">Email</label>
            <input type="Email" name= "Email" id="Email" value=""  required>

            <div class="remember">
                <a href="iniciosesion">¿Tienes cuenta?</a>
                <a href="#">Términos y Servicios</a>
            </div>

            <input type="submit" class="btn-2" value="Registrarse">

            <?php if(session()->getFlashdata('errors') !== null): ?>
                <div class="alert alert-danger my-3" role="alert">
                    <?= session()->getFlashdata('errors'); ?>
                </div>
                <?php endif; ?>

        </form>


            
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
