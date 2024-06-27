<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
     
    <link href="<?php echo base_url() ?>css/init.css?26062024" rel="stylesheet">
    
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

        <form method="POST" action=" <?= base_url('/iniciosesion') ?>" autocomplete="off">

            <?= csrf_field(); ?>

            <h2>Login</h2>

            <label for="username">Usuario</label>
            <input type="text" name="username" id="username">

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">

            <div class="remember">
                <a href="registrousuario">¿No tienes cuenta?</a>
                <a href="recuperacion">Olvidé mi contraseña</a>
            </div>

            <input type="submit" class="btn-2" value="Iniciar sesion">

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
