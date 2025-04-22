    <!--Imagen decorativa del nav-->
    <div class="absolute inset-0 flex justify-center h-[100px]">
        <img src="img/deco-nav.png" alt="Imagen decorativa del nav" class="h-[35px] w-auto">
    </div>
    <div class="relative flex items-center justify-between px-4 mt-10">
        <!--Logo a la izquierda del nav con un tamaño de 50px-->
        <div class="flex"><img src="img/Logo.png" alt="Logo" class="self-start h-[50px]"></div>
        <!--Enlaces y botones a la derecha-->
        <div class="flex gap-4 items-center">
            <a href="<?php echo e(url('/')); ?>" class="animation-scale"><?php echo $homeSvg; ?></a>
            <div class="flex gap-1 border-2 border-[#990000] rounded-xl">
                <!--Enlace a FAQ-->
                <a href="<?php echo e(url('proximos-eventos')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Próximos eventos</a>
                <a href="<?php echo e(url('faq')); ?>" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">FAQ</a>
            </div>
            <div class="flex gap-3">
                <!--Botón a Registro-->
                <a href="<?php echo e(url('form-registro')); ?>"
                    class="bg-black hover:bg-[#5d5d5d] text-white px-2 py-2 rounded-lg cursor-pointer">Registro</a>
                <!--Botón a Iniciar sesión-->
                <a href="<?php echo e(url('inicio-sesion')); ?>"
                    class="bg-[#990000] hover:bg-[#a84848] text-white px-2 py-2 rounded-lg cursor-pointer md:text-base">Iniciar
                    sesión</a>
            </div>
        </div>
    </div>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbar-visitante.blade.php ENDPATH**/ ?>