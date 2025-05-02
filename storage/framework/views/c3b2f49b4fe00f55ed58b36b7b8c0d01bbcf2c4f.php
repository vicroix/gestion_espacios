<script src="//unpkg.com/alpinejs" defer></script>
<?php
$homeSvg = file_get_contents(resource_path('svg/home.svg'))
?>
<nav class="sticky bg-white w-full shadow-sm shadow-[#990000] rounded-b-3xl md:h-[100px]">
     <!-- Navbar vista rol visitante -->
    <?php if(!session('idusuarios')): ?>
    <?php echo $__env->make('layouts.navbars.navbar-visitante', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Navbar vista rol profesor -->
    <?php elseif(session('id_rol') === 2): ?>
    <?php echo $__env->make('layouts.navbars.navbar-profesor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <!-- Navbar vista rol admin -->
    <?php echo $__env->make('layouts.navbars.navbar-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</nav>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbars/navbar.blade.php ENDPATH**/ ?>