<?php $__env->startSection('content'); ?>



<form method="POST" action="<?php echo e(route('answer')); ?>" enctype="multipart/form-data">
    <p><?php echo csrf_field(); ?>
        <label> image</label>
        <input type="file" name="image"/>
        <input type="checkbox" name="anonimize" value="yes">Excluir header de identificacao
    </p>
    <button type="submit" class="btn btn-primary">Upload</button>

</form>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/upload.blade.php ENDPATH**/ ?>