<script src="//unpkg.com/alpinejs" defer></script>
@php
$homeSvg = file_get_contents(resource_path('svg/home.svg'))
@endphp
<nav class="sticky bg-white w-full shadow-md md:h-[100px]">
     <!-- Navbar vista rol visitante -->
    @if(!session('idusuarios'))
    @include('layouts.navbars.navbar-visitante')
    <!-- Navbar vista rol profesor -->
    @elseif(session('id_rol') === 2)
    @include('layouts.navbars.navbar-profesor')
    @else
    <!-- Navbar vista rol admin -->
    @include('layouts.navbars.navbar-admin')
    @endif
</nav>
