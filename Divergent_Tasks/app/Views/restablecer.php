<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
     <link href="<?php echo base_url() ?>css/init.css?24052024" rel="stylesheet">
    
</head>
<body>


    <section class="notas">

        <form method="POST" action="<?= base_url('password/reset') ?>">

            <?= csrf_field(); ?>

            <input type="hidden" name="token" value="<?= $token; ?>">

            <h2>Restablecer tu contraseña</h2>

            <label for="password">Nueva contraseña</label>
            <input type="password" name= "password" id="password" required>

            <label for="password2">Repite tu contraseña</label>
            <input type="password" name= "password2" id="password2" required>
            <input type="submit" class="btn-2" value="Restablecer contraseña">

            <?php if(session()->getFlashdata('errors') !== null): ?>
                <div class="alert alert-danger my-3" role="alert">
                    <?= session()->getFlashdata('errors'); ?>
                </div>
                <?php endif; ?>

        </form>
    </section>

    
</body>
</html>
