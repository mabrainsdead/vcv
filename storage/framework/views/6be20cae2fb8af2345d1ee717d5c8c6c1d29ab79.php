<?php $__env->startSection('content'); ?>

 <a href="<?php echo e($video); ?>" download>Baixar Video  </a><BR>
 <video width="400" controls>
     <source src="<?php echo e($video); ?>"><BR>
 </video>
 <img src="<?php echo e($thumbnail); ?>" width="400"><BR>
 <a href="<?php echo e($thumbnail); ?>" download>Baixar Thumbnail</a>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/download.blade.php ENDPATH**/ ?>