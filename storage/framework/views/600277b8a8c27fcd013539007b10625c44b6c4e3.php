<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo e(mix('css/app.css')); ?>">

    <title>WavesMed VideoConversor</title>
</head>
<body>
    <div class="container">
    <?php echo $__env->yieldContent('content'); ?>
    </div>
<script src="<?php echo e(mix('js/app.js')); ?>"></script>

</body>
<?php echo $__env->yieldContent('script_session'); ?>
</html>

<?php /**PATH /var/www/vcv/resources/views/layout.blade.php ENDPATH**/ ?>