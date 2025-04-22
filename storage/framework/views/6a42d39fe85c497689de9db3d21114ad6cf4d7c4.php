<div class="absolute inset-0 flex justify-center h-[100px] contenedor-decoration-navbar">
        <img src="img/deco-nav.png" alt="Imagen decorativa del nav" class="h-[35px] w-auto">
    </div>
    <div class="relative flex items-center justify-between px-4">
        <!--Logo a la izquierda del nav con un tamaño de 50px-->
        <div class="flex"><img src="img/Logo.png" alt="Logo" class="self-start h-[50px]"></div>
        <!--Enlaces y botones a la derecha-->
        <div class="flex flex-col items-center self-end gap-2 mt-3 md:gap-2">
            <span class="navbar-text flex mr-2 self-end">
                <span>Bienvenido</span>
                <span class="mx-2"><?php echo e(session('nombre_rol')); ?></span>
                <span class="text-[#990000]"><?php echo e(session('usuario')); ?></span>
            </span>
            <div class="flex gap-4 items-center">
                <a href="<?php echo e(url('/')); ?>" class="animation-scale"><?php echo $homeSvg; ?></a>
                <div class="flex gap-3 border-2 border-[#990000] rounded-xl">
                    <!-- Enlace a Busquedas Salas -->
                    <a href="<?php echo e(url('busquedas-salas')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Busquedas Salas</a>
                    <!-- Enlace a nuevas reservas -->
                    <a href="<?php echo e(url('nuevas-reservas')); ?>" class="hover:bg-[#990000] border border-white  hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Nuevas Reservas</a>
                    <!-- Enlace a modificar salas -->
                    <a href="<?php echo e(url('modificar-salas')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Modificar Salas</a>
                    <!-- Enlace a gestion reservas -->
                    <a href="<?php echo e(url('gestion-reservas')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Gestión reservas</a>
                    <!-- Enlace a proximos eventos -->
                    <a href="<?php echo e(url('proximos-eventos')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Próximos eventos</a>
                    <!--Enlace a FAQ-->
                    <a href="<?php echo e(url('faq')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">FAQ</a>
                </div>
                <div>
                    <!--Botón Cerrar Sesión-->
                    <a href="<?php echo e(route('salir')); ?>" class="bg-[#990000] hover:bg-[#a84848] text-white px-2 py-2.5 rounded-lg cursor-pointer md:text-base">
                        Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbar-admin.blade.php ENDPATH**/ ?>