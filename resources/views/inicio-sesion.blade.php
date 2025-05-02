@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/inicio-sesion -->

@section("main")
<main>
    <section class="m-4">
        <div class="flex justify-center">
            <div class="titulo-main w-full flex justify-center md:mx-[70px]">
                <h3 class="md:text-4xl text-2xl">Inicio de Sesión</h3>
            </div>
        </div>
        <!--Formulario-->
        <form action="{{ route('login') }}" method="POST" class="bg-white w-80 gap-3a mx-auto mt-8 rounded-lg p-6 flex flex-col items-center">
            @csrf
            <!--Correo electrónico-->
            <input class="border border-gray-300 w-full px-3 py-1 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
     invalid:focus:ring-red-400 peer" type="email" name="email" placeholder="Correo">
            <!--Mensaje de error en formato de correo electrónico-->
            <p class="text-red-500 hidden peer-invalid:block">El formato de correo es incorrecto</p>
            <!--Contraseña-->
            <input class="border border-gray-300 w-full px-3 py-1 mt-3 mb-3 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]" type="password" name="password"
                placeholder="Contraseña">
            @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @endif
            <!--Botón iniciar sesión-->
            <input class="button-primary-auto mt-7"
                type="submit">
        </form>
    </section>
</main>
@endsection
