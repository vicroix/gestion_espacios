@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-salas -->

@section("main")
<main>
    <section class="flex mt-5 flex-col lg:w-full">
        <div class="lg:flex-justify-center lg:self-center border-b-[0.5px] lg:border-b-1 mx-10 lg:mx-24 lg:w-320">
            <h2 class="text-[20px]">GESTIÓN DE SALAS</h2>
        </div>
        <!--inputs de gestión de salas-->
        <div class="flex justify-center min-w-[400px] w-full mt-5">
            <form action="" class="bg-white lg:w-[746px] m-8 rounded-lg flex-col flex gap-1 justify-center">
                <!--nombre teatro-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 sm:mb-0 mr-2">Nombre teatro</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="text" name="nombre teatro" id="nombre teatro" placeholder="Nombre del teatro">
                </div>
                <!--localidad-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Localidad</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="text" name="localidad" id="localidad" placeholder="Localidad">
                </div>
                <!--CP-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Código postal</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="text" name="cp" id="cp" placeholder="Código postal">
                </div>
                <!--dirreción-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Dirección</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="text" name="Dirección" id="Dirección" placeholder="dirección">
                </div>
                <!--gmail-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Correo electrónico</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="email" name="gmail" id="gmail" placeholder="Correo electrónico">
                </div>
                <!--tel-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Teléfono</label>
                    <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="tel" name="tel" id="tel" placeholder="Teléfono">
                </div>
                <!--tipo-->
                <div class="flex items-center mb-4 w-full">
                    <label class="w-full mb-1 mr-2">Tipo</label>
                    <select class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1  focus:ring-[#990000]
                 invalid:focus:ring-red-400 peer w-full" type="text" name="tipoSala" id="tipoSala">
                        <option value="selected"></option>
                        <option value="Público">Con público</option>
                        <option value="Ensayo">Ensayo</option>
                    </select>
                </div>
                <!--aforo-->
                <div class="flex items-center mb-4">
                    <label class="w-full mb-1 mr-2">Aforo</label>
                    <select class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
             invalid:focus:ring-red-400 peer w-full" type="text" name="aforo" id="aforo" placeholder="">
                        <option value="selected"></option>
                        <option value="pequeña">hasta 10 personas</option>
                        <option value="mediana">hasta 20 personas</option>
                        <option value="grande">hasta 50 personas</option>
                        <option value="aforoEspecifico">Especifico</option>
                    </select>
                </div>
                <!--botones-->
                <div class="mt-4 mb-5 flex justify-center gap-4">
                    <button type="submit" class="bg-[#990000] w-[60px] lg:w-[150px] py-2
                 text-white rounded-md cursor-pointer hover:bg-[#a84848]">Añadir sala</button>
                    <button type="submit" class="bg-black w-[60px] lg:w-[150px] py-2
                 text-white rounded-md cursor-pointer hover:bg-[#5d5d5d]">Modificar salas</button>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
