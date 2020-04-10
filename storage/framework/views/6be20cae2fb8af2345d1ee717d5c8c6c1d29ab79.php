<?php $__env->startSection('content'); ?>
   
        <a href="<?php echo e($videos_url); ?>" download>Baixar Video  </a><BR>
        <video width="400" controls>
            <source src="<?php echo e($videos_url); ?>"><BR>
        </video>
       


 






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/download.blade.php ENDPATH**/ ?>