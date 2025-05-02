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
        <form action="{{ route('login') }}" method="POST" class="bg-white w-80 gap-3 mx-auto mt-8 rounded-lg p-6 flex flex-col items-center">
            @csrf
            <!--Correo electrónico-->
            <input class="inputs-text" type="email" name="email" placeholder="Correo">
            <!--Mensaje de error en formato de correo electrónico-->
            <p class="text-red-500 hidden peer-invalid:block">El formato de correo es incorrecto</p>
            <!--Contraseña-->
            <input class="inputs-text" type="password" name="password"
                placeholder="Contraseña">
            @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @endif
            <!--Botón iniciar sesión-->
            <input class="button-primary-auto mt-6"
                type="submit">
        </form>
    </section>
</main>
@endsection
