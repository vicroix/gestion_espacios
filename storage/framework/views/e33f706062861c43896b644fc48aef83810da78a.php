;
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <title>Laravel</title>
</head>

<body>
    <h1>Gestión de Salas</h1>
    <div class="contenedor-nav">
        <a href="inicio">ir a inicio</a>
        <a href="reservas-usuarios">Ir a Reservas de Usuarios</a>
    </div>
</body>

</html>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\prueba-laravel\resources\views/gestionSalas.blade.php ENDPATH**/ ?>