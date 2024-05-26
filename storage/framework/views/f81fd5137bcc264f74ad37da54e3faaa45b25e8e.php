
<?php $__env->startSection('title','albums'); ?>
<?php $phpVar="album" ?>
<?php $__env->startSection('content'); ?>
<div class="main-album-content">
    <?php $__currentLoopData = $album; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="out-album">
            <div class="edit-delete" id="navbarDropdown<?php echo e($album['id']); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($album['id']); ?>">
                <div class="dropdown-item edit_album" name="<?php echo e($album['name']); ?>" value="<?php echo e($album['id']); ?>">Edit</div>
                <div class="dropdown-item del_album" name="<?php echo e($album['name']); ?>" count="<?php echo e($count[$album['id']]); ?>" value="<?php echo e($album['id']); ?>">Delete</div>
            </div>
            <?php if(isset($album->picture->where('id')->last()['discription'])): ?>
            <img class="main-picture main-album" title="<?php echo e($album['name']); ?>" main_id="<?php echo e($album['id']); ?>" width="100%" height="100%" src="public/storage/album/<?php echo e($album->picture->where('id')->last()['discription']); ?>">
            <?php endif; ?>
            <?php if(empty($album->picture->where('id')->last()['discription'])): ?>
            <img class="main-picture main-album" title="<?php echo e($album['name']); ?>" main_id="<?php echo e($album['id']); ?>" width="100%" height="100%" src="public/storage/album/empty.jpg">
            <?php endif; ?>
            <div class="d-flex align-items-start w-100 flex-column">
                <div class="nam-album">Name: <?php echo e($album['name']); ?></div>
                <div class="nam-album">Pictures: <?php echo e($count[$album['id']]); ?></div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/album/index.blade.php ENDPATH**/ ?>