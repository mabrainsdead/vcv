<?php $__env->startSection('content'); ?>





<div class="container">

    <h3 class="jumbotron">WavesMed Video Converter</h3>
    <form method="POST" name="my_form" action="<?php echo e(route('answer')); ?>" enctype="multipart/form-data">
        <p><?php echo csrf_field(); ?></p>
        <div> <input type="checkbox" name="anonimize" value="yes"/>Excluir header de identificacao </div>
        <div class="input-group control-group increment" >
            <input type="file" name="images[]" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
        </div>
        <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="filename[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Upload</button>

    </form>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('script_session'); ?>
    <script>

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>

    <?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/upload.blade.php ENDPATH**/ ?>