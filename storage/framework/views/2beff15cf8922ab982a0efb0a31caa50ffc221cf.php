<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/prueba-laravel/public -->

<?php $__env->startSection("main"); ?>
<main>
    <section class="m-4">
        <h2 class="text-4xl">Inicio de Sesión</h2>
        <hr>
        <!--Formulario-->
        <form action="" class="bg-white w-80 mx-auto mt-8 rounded-lg p-6">
            <!--Correo electrónico-->
            <input class="border border-gray-300 w-full px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
     invalid:focus:ring-red-400 peer" type="email" placeholder="Correo">
            <!--Mensaje de error en formato de correo electrónico-->
            <p class="text-red-500 hidden peer-invalid:block">El formato de correo es incorrecto</p>
            <!--Contraseña-->
            <input class="border border-gray-300 w-full px-3 py-2 mt-4 mb-4 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]" type="password"
                placeholder="Contraseña">
            <!--Botón iniciar sesión-->
            <input class="bg-[#990000] w-full py-2 text-white rounded-md cursor-pointer hover:bg-[#a84848]"
                type="submit" placeholder="Ingresar">
        </form>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\prueba-laravel\resources\views/inicio-sesion.blade.php ENDPATH**/ ?>