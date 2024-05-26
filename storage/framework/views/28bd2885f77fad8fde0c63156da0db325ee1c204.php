
<?php $__env->startSection('title','picture'); ?>
<?php $phpVar = "picture" ?>

<?php $__env->startSection('content'); ?>
<div class="main-album-content">
    <?php $__currentLoopData = $picture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="out-album">
            <div class="edit-delete" id="navbarDropdown<?php echo e($picture['id']); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($picture['id']); ?>">
                <div class="dropdown-item move_pic" name="<?php echo e($picture['name']); ?>" value="<?php echo e($picture['id']); ?>">Move</div>
                <div class="dropdown-item del_pic" value="<?php echo e($picture['id']); ?>">Delete</div>
            </div>
            <img title="<?php echo e($picture->name); ?>" class="main-picture" width="100%" height="100%" src="public/upload/my.jpg">
            <div class="d-flex align-items-start w-100 flex-column">
                <div class="nam-album">Name: <?php echo e($picture->name); ?></div>
                <div class="nam-album">Album: <?php echo e($picture->album->name); ?></div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/picture.blade.php ENDPATH**/ ?>