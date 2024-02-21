

<?php $__env->startSection('title', 'HOME'); ?>
<?php $__env->startSection('menu'); ?>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
   <h1>Home</h1>
   <p>User: <?php echo e($user); ?></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.partials.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\integred-proyect\mylogin\resources\views/index.blade.php ENDPATH**/ ?>