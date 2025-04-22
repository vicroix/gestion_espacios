@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/inicio-sesion -->

@section("main")
<main>
    <section class="m-4">
        <h2 class="text-4xl">Inicio de Sesión</h2>
        <hr>
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
            <input class="bg-[#990000] w-20 py-1 mt-3 text-white rounded-md cursor-pointer hover:bg-[#a84848]"
                type="submit" placeholder="Ingresar">
        </form>
    </section>
</main>
@endsection
