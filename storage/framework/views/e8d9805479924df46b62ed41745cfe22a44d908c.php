<?php
$homeSvg = file_get_contents(resource_path('svg/home.svg'));
?>
<nav class="sticky z-50 top-0 bg-white w-full shadow-md">
    <!-- Sí el id de la session es null, es que no se inicio sesión correctamente y muestra esta vista -->
    <?php
    if (!isset($_SESSION["id"])): ?>
        <!--Imagen decorativa del nav-->
        <div class="absolute inset-0 flex justify-center h-[100px]">
            <img src="img/deco-nav.png" alt="Imagen decorativa del nav" class="h-[35px] w-auto">
        </div>
        <div class="relative flex items-center justify-between px-4">
            <!--Logo a la izquierda del nav con un tamaño de 50px-->
            <div class="flex"><img src="img/Logo.png" alt="Logo" class="self-start h-[50px]"></div>
            <!--Enlaces y botones a la derecha-->
            <div class="flex items-center self-end gap-8 ">
                <a href="<?php echo e(url('/')); ?>" class="animation-scale"><?php echo $homeSvg; ?></a>
                <!--Enlace a FAQ-->
                <a href="<?php echo e(url('proximos-eventos')); ?>" class="hover:text-[#990000]">Próximos eventos</a>
                <a href="<?php echo e(url('faq')); ?>" class="hover:text-[#990000]">FAQ</a>
                <!--Botón a Registro-->
                <a href="<?php echo e(url('form-registro')); ?>"
                    class="bg-black hover:bg-[#5d5d5d] text-white p-2 rounded-lg w-auto mx-auto my-8 cursor-pointer">Registro</a>
                <!--Botón a Iniciar sesión-->
                <a href="<?php echo e(url('inicio-sesion')); ?>"
                    class="bg-[#990000] hover:bg-[#a84848] text-white p-2 rounded-lg w-auto mx-auto my-8 cursor-pointer">Iniciar
                    sesión</a>
            </div>
        </div>
        <!-- Si no es null y tiene valor recogido de la base de datos, muestra esta vista -->
    <?php else: ?>
        <div class="flex flex-col">
            <form action="auth/cerrar-sesion.php" method="post" class="cerrar">
                <button class="">Cerrar sesión</button>
            </form>
            <span class="navbar-text ms-2 justify-end">
                Bienvenido, <?php echo $_SESSION["nombre"]; ?>
            </span>
        </div>
    <?php endif; ?>
</nav>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>