<?php $__env->startSection('content'); ?>
   <?php if(isset($video_url_array)): ?>

    <?php $__currentLoopData = $video_url_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <a href="<?php echo e($video_url); ?>" download>Baixar Video  </a><BR>
     <video width="400" controls>
         <source src="<?php echo e($video_url); ?>"><BR>
     </video>
     <?php if(!empty($thumbnails_url_array)): ?>
     <img src="<?php echo e($thumbnails_url_array[$loop->index]); ?>" width="400"><BR>
     <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   <?php else: ?>

       <a href="<?php echo e($videos_url); ?>" download>Baixar Video  </a><BR>
       <video width="400" controls>
           <source src="<?php echo e($videos_url); ?>"><BR>
       </video>
       <img src="<?php echo e($thumbnail_url); ?>" width="400"><BR>
       <a href="<?php echo e($thumbnail_url); ?>" download>Baixar Thumbnail</a>
   <?php endif; ?>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/download.blade.php ENDPATH**/ ?>