@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')

    {{-- <link rel="stylesheet" href="{{ asset('css/desabilitarInputNumber.css') }}" /> --}}

    <!--container max-w-lg-->

    {{-- <div class="lg:bg-blue-500 md:bg-red-300 xl:bg-yellow-400 2xl:bg-purple-600 sm:bg-black bg-gray-400">
    <label>
        celu = plomo,
        sm 640px = black ,
        md 768px = rojo ,
        lg 1024px = azul ,
        xl 1280px = amariilo ,
        2xl 1536px = purpura ,
    </label>
    </div> --}}


    <div class="overflow-x-auto  p-5 ">
        <div class="flex  p-5 border-b mb-8">
            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
            href="{{ route('areas.index') }}"> <- Atras</a>

            <p class="text-xl mt-1.5 font-bold text-slate-800"> Registro de Area</p>
        </div>

        <div class=" flex justify-center items-center">
            <div class=" w-3/4 ">
                {{-- <p> hola que tal</p> --}}
                <form action="{{ route('areas.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="py-4 px-4 max-w-full m-3 pt-10  sm:m-5 border shadow-xl  rounded-xl
                                lg:px-10  2xl:mx-20 ">

                        <div class="grid grid-row-12 grid-cols-1
                                     gap-y-2 gap-x-10   px-5 ">
                            <div class="flex flex-col ">
                                <div class="flex  ">
                                    <label for="nombre"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Nombres:
                                    </label>
                                    @error('nombre')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror
                                </div>
                                <input
                                    class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                    id="nombre" name="nombre" type="text" autocomplete="off"
                                    value="{{ old('nombre') }}" />
                            </div>

                            <div class="flex flex-col row-start-2 row-span-4 ">
                                <div class="flex  ">
                                    <label for="descripcion"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Descripcion:
                                    </label>
                                    {{-- @error('nombre')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror --}}
                                </div>
                                {{-- <input
                                    class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                    id="paterno" name="paterno" type="text" autocomplete="off"
                                    value="{{ old('paterno') }}" /> --}}
                                    <textarea class="mt-0 mb-1 text-gray-500 font-normal  p-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                     name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
                            </div>



                            <div class=" flex flex-row-reverse justify-between  py-5 ">
                                <button type="submit" class=" bg-gray-700 py-1 px-3 text-lg text-gray-100  rounded-xl">
                                    Registrar
                                </button>
                            </div>

                        </div> <!-- end del div de columnas -->

                    </div> <!-- end de div principal-->

                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/cargar_imagen.js') }}"></script>
    {{-- <script src="{{ asset('js/Proveedor/ProductoExiste.js') }}"></script> --}}

     {{-- <script src="{{ asset('js/vistaProductoCreate.js') }}"></script> --}}
    {{-- <input type="hidden" id="pantalla" value="producto"> --}}

@endsection
