<?php $__env->startSection('content'); ?>

<div class="container">
    <br />
    <br />
    <h2 align="center">WavesMed Video Conversor</h2>
    <div class="form-group">
        <form method="POST" name="my_form" id="my_form" action="<?php echo e(route('answer')); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
            <div> <input type="checkbox" name="anonimize" value="yes"/>Excluir header de identificacao </div>
            <div> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos </div>
            <div> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails </div>
            <div> <input type="checkbox" name="water_mark" value="yes"/>Marca dagua </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="file" name="images[]"  class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary btn-lg"  value="Upload" />
            </div>
        </form>
        <div id="divMsg" style="display: none;">
            <img src="<?php echo e(asset('images/spinner.gif')); ?>" alt="Please wait.." />
        </div>
    </div>
</div>

    <div id="trigger">
        Trigger
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_session'); ?>

    <script src="<?php echo e(asset('/js/myJs.js')); ?>"></script>

  <?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/upload.blade.php ENDPATH**/ ?>