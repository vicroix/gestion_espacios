<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $__env->make("layouts.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent("main"); ?>

<?php echo $__env->make("layouts.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\Victor\Documents\GitHub\prueba-laravel\resources\views/layouts/plantilla.blade.php ENDPATH**/ ?>