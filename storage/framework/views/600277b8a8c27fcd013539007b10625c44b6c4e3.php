<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet"  href="<?php echo e(mix('css/app.css')); ?>">
    <link rel="stylesheet"  href="<?php echo e('/css/dropzone.css'); ?>">
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    <script src="<?php echo e('/js/dropzone.js'); ?>"> </script>
    <title>WavesMed VideoConversor</title>

</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

</body>

</html>

    <?php echo $__env->yieldContent('script_session'); ?>
<?php /**PATH /var/www/vcv/resources/views/layout.blade.php ENDPATH**/ ?>