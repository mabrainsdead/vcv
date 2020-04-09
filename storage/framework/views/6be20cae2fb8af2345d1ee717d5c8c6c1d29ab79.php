<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $videos_url; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <a href="<?php echo e($video); ?>" download>Baixar Video  </a><BR>
 <video width="400" controls>
     <source src="<?php echo e($video); ?>"><BR>
 </video>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/download.blade.php ENDPATH**/ ?>