<?php $__env->startSection('content'); ?>


<div class="container">
    <br />
    <br />

    <div class="form-group">
        <form method="POST" action="<?php echo e(route('answer')); ?>" name="my_form" id="my_form" class="form"  enctype="multipart/form-data" ><?php echo csrf_field(); ?>

            

            <ul class="nav justify-content-lg-center" id="settings">
                <li class="nav-item">
                    <span> <input type="checkbox" name="anonimize" value="yes">Excluir identificacao</span>
                </li>
                <li class="nav-item">
                    <span> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos</span>
                </li>
                <li class="nav-item">
                    <span> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails</span>
                </li>
            </ul>





            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="file" name="images[]"  id="inFile" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>

            </div>
            <div>
                <div id="inputButton">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"  value="Upload" />

                </div>

            </div>
            <div >
                <input type="checkbox" />
                <input type="checkbox" name="water_mark" value="yes"/>
                <input type="checkbox" />
            </div>

        </form>

        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">0%</span>

            </div>
        </div>

        <div id="divMsg" style="display: none;">
            <img class="animated-gif" src="<?php echo e(asset('images/spinner.gif')); ?>" alt="Please wait.." />
        </div>
    </div>



</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_session'); ?>

    

  <?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcv/resources/views/upload.blade.php ENDPATH**/ ?>