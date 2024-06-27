<?php

use App\Models\PerfilesModel;

$PerfilesModel = new PerfilesModel();
$perfil = $PerfilesModel->where(['usuario_id' => $_SESSION['userid']])->first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url() ?>img/logo2.gbr.ico">
    <title>Divergent Tasks</title>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>css/perfiles.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS -->
    <script src="<?php echo base_url() ?>js/bootstrap.bundle.min.js"></script>
</head>
<body class="body-i">
    
    <header class="header">
        <div class="menu container">
            <a href="notas" class="logo"><img src="<?php echo base_url() ?>img/pulpi.png" alt=""></a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img src="<?php echo base_url() ?> class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="escritorio">Escritorio</a></li>
                    <li><a href="<?= base_url('logout'); ?>">Cerrar sesión</a></li>
                    <li><a href="#">Contáctanos</a></li>
                    <li><a href="#">Redes Sociales</a></li>
                </ul>    
            </nav>
        </div>
    </header>

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Configurar perfil
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="<?php echo base_url() ?>img/perfil/<?=$_SESSION['ImgPerfil'] ?>" alt="Imagen de usuario" class="d-block ui-w-80">
                                <form action="<?= base_url('/perfiles/subir'); ?>" method="POST" enctype="multipart/form-data">
                                   <?= csrf_field(); ?>
                                   <div class="media-body ml-4">
                                       <label class="btn btn-outline-primary">
                                           Subir foto
                                           <input type="file" class="account-settings-fileinput" name="file" id="file" accept="image/jpeg, image/png">
                                       </label> &nbsp;
                                       <button type="submit" class="btn btn-default md-btn-flat">Guardar</button>
                                       <div class="text-light small mt-1">Solo JPG, GIF o PNG. Máx. 800KB</div>
                                   </div>
                                   <?php if(session()->getFlashdata('errors') !== null): ?>
                                        <div class="alert alert-danger my-3" role="alert">
                                            <?= session()->getFlashdata('errors'); ?>
                                        </div>
                                   <?php endif; ?>
                                </form>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">

                                <form method="POST" action=" <?= base_url('/perfiles/reset') ?>" autocomplete="off">

                                  <?= csrf_field(); ?>

                                  <div class="form-group">
                                      <label class="form-label">Nombre</label>
                                      <input type="text" name="nombre" id="nombre" value="<?php echo $perfil['nombre_completo']; ?>" class="form-control">
                                  </div>
                    
                                  <div class="form-group">
                                      <label class="form-label">E-mail</label>
                                      <input type="text" class="form-control mb-1" value="<?php echo $_SESSION['Email']; ?>">
                                  </div>
                                
                                  <div class="form-group">
                                      <label class="form-label">Neurodivergencia</label><br>
                                      <select name="neurodivergencia" id="">
                                        <option value="">Selecciona una neurodivergencia</option>
                                        <option value="">TDAH</option>
                                        <option value="">TEA</option>
                                        <option value="">Dislexia</option>
                                        <option value="">Trastorno bipolar</option>
                                        <option value="">Epilepsia</option>
                                        <option value="">ADHD</option>
                                        <option value="">Trastorno obsesivo-compulsivo</option>
                                        <option value="">Síndrome de Tourette</option>
                                        <option value="">Disgrafia</option>
                                        <option value="">Discalculia</option>
                                        <option value="">Tartamudeo</option>
                                        <option value="">Síndrome de Asperger</option>
                                        <option value="">Trastorno esquizoafectivo</option>
                                        <option value="">Trastorno del lenguaje oral/escrito</option>
                                        <option value="">Misofonía</option>
                                        <option value="">Síndrome de Down</option>
                                      </select>    
                                  </div>
                                
                                  <div class="form-group">
                                      <label class="form-label">Contraseña actual</label>
                                      <input type="password" name="password" id="password" class="form-control">
                                  </div>
                                
                                  <div class="form-group">
                                      <label class="form-label">Nueva contraseña</label>
                                      <input type="password" name="newpassword" id="newpassword" class="form-control">
                                  </div>
                                
                                  <div class="form-group">
                                      <label class="form-label">Repite nueva contraseña</label>
                                      <input type="password" name="newpassword2" id="newpassword2" class="form-control">
                                  </div>

                                  <div class="text-right mt-3">
                                      <button type="submit" class="btn btn-primary">Guardar cambios</button>&nbsp;
                                      <button type="button" class="btn btn-default"><a href="escritorio">Cancelar</button>
                                  </div>

                                   <?php if(session()->getFlashdata('errors') !== null): ?>
                                       <div class="alert alert-danger my-3" role="alert">
                                           <?= session()->getFlashdata('errors'); ?>
                                       </div>
                                   <?php endif; ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
