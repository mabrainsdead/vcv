<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet"  href="<?php echo e(mix('css/app.css')); ?>">
   
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    
    <title>WavesMed VideoConversor</title>

</head>
<body >
<nav id="navBar" class="navbar navbar-light">
    <i class="fas fa-bars"></i>
    <a class="nav-item my-1 ml-auto" id="navItem" href="https://www.wavesmed.cmo.br/login/index.php">Acessar</a>
</nav>

<div class="container">


    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="https://www.wavesmed.com.br/login/index.php">
            <img  id="logo" src="http://vcv/images/educacao_saude_logo_site.png" class="d-inline-block align-top">
        </a>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-5">Conversor de vídeo</h1>
        
        <p class="lead" id="descricao"> Converta seus vídeos e reúna-os em um só arquivo mp4.</p>
    </div>


    <?php echo $__env->yieldContent('content'); ?>

</body>

</html>

    <?php echo $__env->yieldContent('script_session'); ?>
<?php /**PATH /var/www/vcv/resources/views/layout.blade.php ENDPATH**/ ?>