
<?php $__env->startSection('title','albums'); ?>
<?php $phpVar="albums"; ?>

<?php $__env->startSection('content'); ?>
<div class="main-album-content">
    <?php $__currentLoopData = $album; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="out-album">
        <div class="edit-delete" id="navbarDropdown<?php echo e($album['id']); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a class="dropdown-item" href="#">Edit</a>
            <a class="dropdown-item" href="#">Delete</a>
        </div>
        <div class="main-picture"></div>
        <div class="nam-album"><?php echo e($album['name']); ?></div>
        <div class="num-album"><?php echo e($album['count']); ?></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/album.blade.php ENDPATH**/ ?>