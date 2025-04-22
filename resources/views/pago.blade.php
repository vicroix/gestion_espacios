@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Pago')
<!-- http://localhost/TeatroGest/public/pago -->

@section("main")
<main>
    <section class="flex mt-5 flex-col lg:w-full">
        <div class="lg:flex-justify-center lg:self-center border-b-[0.5px] lg:border-b-1 mx-10 lg:mx-24 lg:w-320">
            <h2 class="text-[20px]">PAGO</h2>
        </div>
        <!--inputs para el pago-->
        <div class="lg:flex lg:justify-center min-w-[400px] lg:w-full">
            <form action="" class="bg-white lg:w-[746px] m-8 rounded-lg flex-col flex gap-4 justify-center">
                <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                    invalid:focus:ring-red-400 peer" type="text" name="nombre titular" id="nombre titular" placeholder="Nombre titular*" required>
                <input class="border border-gray-300  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                    invalid:focus:ring-red-400 peer" type="text" name="número tarjeta" id="número tarjeta" placeholder="Número tarjeta*" required>
                <div class="flex flex-col  lg:flex-row lg:justify-center gap-4 lg:w-full">
                    <input class="border border-gray-300 lg:w-[367.57px]  px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#725a5a]
                    invalid:focus:ring-red-400 peer" type="text" name="MM/AA" id="MM/AA" placeholder="MM/AA*" required>
                    <input class="border border-gray-300 lg:w-[367.57px] px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-[#990000]
                    invalid:focus:ring-red-400 peer" type="text" name="cvv" id="cvv" placeholder="CVV" required>
                </div>
                <!--botón para pagar-->
                <div class="flex lg:justify-center mt-3">
                    <button class="bg-[#990000] w-[60px] lg:w-[150px] py-2 text-white rounded-md cursor-pointer hover:bg-[#a84848]"
                        type="submit" placeholder="Pagar"> Pagar </button>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
