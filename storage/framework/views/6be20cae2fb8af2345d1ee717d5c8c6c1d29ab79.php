<?php $__env->startSection('content'); ?>
   <?php if(isset($video_url_array)): ?>

       


    <div id="grid" class="grid-container">


        <?php $__currentLoopData = $video_url_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div id="video_row" class="grid_item">
                <video controls>
                    <source src="<?php echo e($video_url); ?>" >
                </video>
                <a href="<?php echo e($video_url); ?>" download>Download Vídeo</a>
            </div>

            <?php if(!empty($thumbnails_url_array)): ?>
                <div id="img_row" class="grid_item">
                    <img src="<?php echo e($thumbnails_url_array[$loop->index]); ?>" />
                    <a href="<?php echo e($thumbnails_url_array[$loop->index]); ?>" download>Download thumbnail</a>
                </div>

            <?php endif; ?>
            <script>
                var collumns = <?php echo e(@count($video_url_array)); ?>;
                document.getElementById("grid").style.gridTemplateColumns="repeat(" + collumns + ", 150px)";
            </script>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



   <?php else: ?>
   <div id="grid" class="grid-container">
        <div id="video_row" class="grid_item">
            <video controls>
                <source src="<?php echo e($videos_url); ?>">
            </video>
                <a href="<?php echo e($videos_url); ?>" download>Vídeo</a>
        </div>
       <?php if(!empty($thumbnail_url)): ?>
           <div id="img_row" class="grid_item">
               <img src="<?php echo e($thumbnail_url); ?>" />
               <a href="<?php echo e($thumbnail_url); ?>" download>Thumbnail</a>
           </div>
       <?php endif; ?>


   <?php endif; ?>
   </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/download.blade.php ENDPATH**/ ?>