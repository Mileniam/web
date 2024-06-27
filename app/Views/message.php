<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
     <link href="<?php echo base_url() ?>css/init.css?24052024" rel="stylesheet">
    
</head>
<body>


    <section class="notas">

        <form method= "POST" action="password/email" autocomplete="off" >

            <?= csrf_field(); ?>

            <div class="card-body p-5">
            <h1 class= "fs-4 card-title fw-bold mb-4"><?=$title; ?></h1>

            <p><?= $message; ?></p>

            <div class="d-flex aling-items-center">
                <a href="<?= base_url(); ?>" class="btn btn-primary ms-auto">
                    Inicio
                </a>
            </div>

        </form>
    </section>

    
</body>
</html>