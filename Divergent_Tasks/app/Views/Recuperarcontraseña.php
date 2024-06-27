<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
     <link href="<?php echo base_url() ?>css/init.css?24052024" rel="stylesheet">
    
</head>
<body>


    <section class="notas">

        <form method= "POST" action="password/email" autocomplete="off" >

            <?= csrf_field(); ?>

            <h2>Recupera tu contraseña</h2>

            <label for="email">Ingresa tu correo</label>
            <input type="Email" name = "Email" id="Email">
            <input type="submit" class="btn-2" value="recuperar">

            <?php if(session()->getFlashdata('errors') !== null): ?>
                <div class="alert alert-danger my-3" role="alert">
                    <?= session()->getFlashdata('errors'); ?>
                </div>
                <?php endif; ?>

                <div class="col-12">
                    ¿No tiene cuenta? <a href="registrousuario">   Registrate aquí</a>
                </div>

        </form>
    </section>

    
</body>
</html>
