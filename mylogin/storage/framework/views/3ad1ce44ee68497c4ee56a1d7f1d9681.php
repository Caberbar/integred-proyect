<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/style.css")); ?>">
        <title>
            <?php echo $__env->yieldContent('title'); ?>
        </title>
    </head>
    <body>
        <?php echo $__env->yieldContent('menu'); ?>
        <?php echo $__env->yieldContent('body'); ?>
    </body>

</html>
<?php /**PATH C:\xampp\htdocs\integred-proyect\mylogin\resources\views/layout/app.blade.php ENDPATH**/ ?>