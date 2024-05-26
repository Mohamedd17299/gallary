
<?php $__env->startSection('title','albums'); ?>
<?php $phpVar="album" ?>
<?php $__env->startSection('content'); ?>
<div class="main-album-content">
    <?php $__currentLoopData = $gallary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="out-album">
            <div class="edit-delete" id="navbarDropdown<?php echo e($gallary['id']); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo e($gallary['id']); ?>">
                <div class="dropdown-item" href="#">Edit</div>
                <div class="dropdown-item" href="#">Delete</div>
            </div>
            <a class="main-picture" href="<?php echo e(route('gallary.show',['album' => $gallary['id'] ])); ?>" >
                <div></div>
            </a>
            <div class="nam-album"><?php echo e($gallary['name']); ?></div>
            <div class="num-album"><?php echo e($gallary['count']); ?></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/gallary/index.blade.php ENDPATH**/ ?>