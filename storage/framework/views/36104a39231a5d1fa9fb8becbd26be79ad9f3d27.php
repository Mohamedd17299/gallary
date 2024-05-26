<?php $__env->startSection('title','albums'); ?>
<?php $phpVar="show" ?>

<?php $__env->startSection('content'); ?>
<div class="main-album-content">
    <div class="d-flex flex-column w-100" >
        <div class="d-flex align-items-center w-100 main-album-show">
            <div class="d-flex justify-content-start" style="padding-right: 20px; width:70%;">
                <div class="d-flex flex-column justify-content-center  align-items-center w-50" style="padding: 0px 12px;">
                    <label for="">Album name</label>
                    <div class="nam-album"><?php echo e($album['name']); ?></div>
                </div>
                <div class="d-flex flex-column justify-content-center  align-items-center w-50" style="padding: 0px 12px;">
                    <label for="">picture Count</label>
                    <div class="num-album"><?php echo e($count[$album['id']]); ?></div>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="padding-right: 30px; width:30%;">
                <div>
                    <button type="submit" style="margin:0px 5px;"  name="<?php echo e($album['name']); ?>" value="<?php echo e($album['id']); ?>" class="btn btn-outline-success btn-sm edit_album">Edit</button>
                </div>
                <div>
                    <button type="submit" style="margin:0px 5px;" name="<?php echo e($album['name']); ?>" count="<?php echo e($count[$album['id']]); ?>" value="<?php echo e($album['id']); ?>" class="del_album btn btn-outline-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>

        <div>
        <div class="main-album-content">
            <?php $__currentLoopData = $album->picture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="out-album">
                    <div class="edit-delete" id="navbarDropdown<?php echo e($picture['id']); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($picture['id']); ?>">
                        <div class="dropdown-item move_pic" album_name="<?php echo e($picture->album->name); ?>" value="<?php echo e($picture['id']); ?>" album_id="<?php echo e($picture->album->id); ?>">Move</div>
                        <div class="dropdown-item edit_pic" name="<?php echo e($picture['name']); ?>" value="<?php echo e($picture['id']); ?>">Edit</div>
                        <div class="dropdown-item del_pic" value="<?php echo e($picture['id']); ?>">Delete</div>
                    </div>
                    <?php if(isset($picture->discription)): ?>
                    <img title="<?php echo e($picture->name); ?>" class="main-picture show-picture" width="100%" height="100%" src="../public/storage/album/<?php echo e($picture->discription); ?>">
                    <?php endif; ?>
                    <?php if(empty($picture->discription)): ?>
                    <img title="<?php echo e($picture->name); ?>" class="main-picture show-picture" width="100%" height="100%" src="../public/storage/album/<?php echo e($picture->discription); ?>">
                    <?php endif; ?>
                    <div class="d-flex align-items-start w-100 flex-column">
                        <div class="nam-album" style="height:50px;">Name: <?php echo e($picture->name); ?></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/album/show.blade.php ENDPATH**/ ?>