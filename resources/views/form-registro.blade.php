@extends("layouts.plantilla")
@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/prueba-laravel/public/form-registro -->
@section("main")
<main class="w-full flex flex-col">
    <h2 class="titulo_pagina ml-12">REGISTRO DE USUARIO</h2>
    <section class="form-registro m-20">
        <div class="flex">
            <div class="flex flex-col self-center gap-10 ml-20 mt-[70px] mr-2">
                <!--Icono user-->
                <svg class="text-[#FFFFFF]" width="45" height="48.6" viewBox="0 0 45 45" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M37.5 39.375V35.625C37.5 33.6359 36.7098 31.7282 35.3033 30.3217C33.8968 28.9152 31.9891 28.125 30 28.125H15C13.0109 28.125 11.1032 28.9152 9.6967 30.3217C8.29018 31.7282 7.5 33.6359 7.5 35.625V39.375M30 13.125C30 17.2671 26.6421 20.625 22.5 20.625C18.3579 20.625 15 17.2671 15 13.125C15 8.98286 18.3579 5.625 22.5 5.625C26.6421 5.625 30 8.98286 30 13.125Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" p />
                </svg>
                <!--Icono password-->
                <svg width="45" height="48.6" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.125 20.625V13.125C13.125 10.6386 14.1127 8.25403 15.8709 6.49587C17.629 4.73772 20.0136 3.75 22.5 3.75C24.9864 3.75 27.371 4.73772 29.1291 6.49587C30.8873 8.25403 31.875 10.6386 31.875 13.125V20.625M9.375 20.625H35.625C37.6961 20.625 39.375 22.3039 39.375 24.375V37.5C39.375 39.5711 37.6961 41.25 35.625 41.25H9.375C7.30393 41.25 5.625 39.5711 5.625 37.5V24.375C5.625 22.3039 7.30393 20.625 9.375 20.625Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <!--Icono email-->
                <svg width="45" height="48.6" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M30 15.0001V24.3751C30 25.8669 30.5927 27.2976 31.6475 28.3525C32.7024 29.4074 34.1332 30.0001 35.625 30.0001C37.1169 30.0001 38.5476 29.4074 39.6025 28.3525C40.6574 27.2976 41.25 25.8669 41.25 24.3751V22.5001C41.2498 18.2682 39.8179 14.161 37.1874 10.8461C34.5569 7.53115 30.8823 5.2036 26.7612 4.24186C22.6401 3.28013 18.3149 3.74076 14.4888 5.54887C10.6627 7.35698 7.56076 10.4062 5.68738 14.2008C3.81399 17.9954 3.27933 22.3121 4.17033 26.449C5.06134 30.586 7.3256 34.2999 10.5949 36.9868C13.8643 39.6737 17.9465 41.1757 22.1776 41.2485C26.4088 41.3212 30.5402 39.9605 33.9 37.3876M30 22.5001C30 26.6422 26.6422 30.0001 22.5 30.0001C18.3579 30.0001 15 26.6422 15 22.5001C15 18.3579 18.3579 15.0001 22.5 15.0001C26.6422 15.0001 30 18.3579 30 22.5001Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <!--Icono phone-->
                <svg width="45" height="48.6" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M41.2502 31.7249V37.3499C41.2523 37.8721 41.1453 38.389 40.9361 38.8675C40.7269 39.3459 40.4201 39.7754 40.0353 40.1284C39.6505 40.4815 39.1963 40.7502 38.7016 40.9175C38.2069 41.0848 37.6828 41.1469 37.1627 41.0999C31.393 40.473 25.8508 38.5015 20.9814 35.3437C16.4511 32.4649 12.6102 28.624 9.73143 24.0937C6.56264 19.2022 4.59064 13.6331 3.97518 7.83744C3.92832 7.31894 3.98995 6.79636 4.15612 6.30298C4.32229 5.8096 4.58938 5.35623 4.94037 4.97173C5.29136 4.58722 5.71856 4.28002 6.19479 4.06967C6.67101 3.85931 7.18582 3.75043 7.70643 3.74994H13.3314C14.2414 3.74098 15.1235 4.06321 15.8135 4.65656C16.5034 5.24991 16.9541 6.0739 17.0814 6.97494C17.3188 8.77506 17.7591 10.5426 18.3939 12.2437C18.6462 12.9148 18.7008 13.6442 18.5513 14.3453C18.4017 15.0465 18.0543 15.6901 17.5502 16.1999L15.1689 18.5812C17.8381 23.2753 21.7248 27.162 26.4189 29.8312L28.8002 27.4499C29.31 26.9458 29.9536 26.5984 30.6548 26.4489C31.356 26.2993 32.0853 26.3539 32.7564 26.6062C34.4576 27.241 36.2251 27.6813 38.0252 27.9187C38.936 28.0472 39.7678 28.506 40.3624 29.2077C40.9571 29.9095 41.273 30.8054 41.2502 31.7249Z"
                        stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
            <!--Formulario registro-->
            <form action="{{ route('registro') }}" method="POST">
                @csrf
                <div class="flex flex-col w-[600px] gap-5 mr-20">
                    @if (session('success'))
                    <p class="text-green-500">{{ session('success') }}</p>
                    @else
                    <p class="text-red-500">{{ session('error') }}</p>
                    @endif
                    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre*" required>
                    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Apellidos*"
                        required>
                    <input class="controls" type="text" name="usuario" id="usuario" placeholder="Usuario*" required>
                    <input class="controls" type="password" name="password" id="password" placeholder="Contraseña*"
                        required>
                    <input class="controls" type="email" name="email" id="email" placeholder="Correo electrónico*"
                        required>
                    <input class="controls" type="text" name="telefono" id="telefono" placeholder="Teléfono">
                    <p>*Campo obligatorio</p>
                    <!--Botón submit-->
                    <div>
                        <input class="button" type="submit" value="Registrar">
                    </div>
                </div>
            </form>
            <!--Imagen foco-->
            <div>
                <img src="img/FOCO.jpg" width="437" class="hidden md:block">
            </div>
        </div>
    </section>
</main>
@endsection
