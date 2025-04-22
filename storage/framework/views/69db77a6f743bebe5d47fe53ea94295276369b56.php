<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

    <title>Laravel</title>
</head>
<!-- http://localhost/prueba-laravel/public -->

<body class="antialiased">
    <?php $__env->startSection("cabecera"); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection("main"); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection("footer"); ?>
    <h3>Contactos:</h3>
    <ul>
        <li>Instagram</li>
        <li>Facebook</li>
        <li>Youtube</li>
    </ul>
    <?php $__env->stopSection(); ?>
</body>

</html>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\prueba-laravel\resources\views/welcome.blade.php ENDPATH**/ ?>