@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="overflow-x-auto  p-5 ">
        <div class="flex  p-5 border-b mb-8">
            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
            href="{{ route('creditos.index') }}"> <- Atras</a>

            <p class="text-xl mt-1.5 font-bold text-slate-800"> Registro de Procesos xd xd</p>
        </div>

        <div class=" flex justify-center items-center">
            <div class="  ">
                {{-- <p> hola que tal</p> --}}
                <form action="{{ route('creditos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                        <div class="grid grid-cols-3
                                     gap-y-2 gap-x-10 py-4   px-5 ">
                            <div class="flex flex-col col-span-2">
                                <div class="flex  ">
                                    <label for="nombre"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Nombres Cliente:
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
                                    value="{{ $cliente->name }} {{  $cliente->ap_paterno  }}" disabled/>
                            </div>

                            <div class="flex flex-col  ">
                                <div class="flex  ">
                                    <label for="ci_cliente"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Carnet de Identidad:
                                    </label>
                                    {{-- @error('nombre')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror --}}
                                </div>
                                <input
                                    class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                    id="paterno" name="ci_cliente" type="text" autocomplete="off"
                                    value="{{  $cliente->ci }}" disabled/>
                                    <input type="hidden" name="id_cliente" value="{{  $cliente->id }}">
                            </div>

                            <div class="flex flex-col col-span-2 row-start-2">
                                {{-- @include('VistaProductos.Modal_crear_proveedo') --}}

                                <div class="flex justify-between mb-1">
                                    <label class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                        tipo de credito:
                                    </label>
                                    {{-- <button id="bt_crear_proveedorM" type="button"
                                        class="text-black text-xs hover:bg-blue-200 hover:border-black border rounded px-1 ">
                                        Registart Area</button> --}}
                                </div>
                                <select name="tipo" id="select_categoria"
                                    class="w-full mb-2  p-1 rounded-lg text-sm bg-gray-800 border  border-gray-700  text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col row-start-2 ">
                                <div class="flex  ">
                                    <label for="monto"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Monto:
                                    </label>
                                    {{-- @error('nombre')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror --}}
                                </div>
                                <input
                                    class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                    id="monto" name="monto" type="text" autocomplete="off"
                                    value="{{ old('monto') }}" />
                            </div>

                            <div class="flex flex-col row-start-3 col-span-2 ">
                                <label  class="label-xd" for="obs">Observacion:</label>
                                <textarea class="area-xd w-full" name="observacion" id="obs" rows="2"></textarea>
                            </div>

                            <div class=" sm:col-span-4 flex justify-between  py-5 ">
                                <button type="submit" class=" bg-gray-700 py-1 px-3 text-lg text-gray-100  rounded-xl">
                                    Registrar
                                </button>
                            </div>

                        </div> <!-- end del div de columnas -->


                </form>
            </div>
        </div>
    </div>



    {{-- <script src="{{ asset('js/cargar_imagen.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/Proveedor/ProductoExiste.js') }}"></script> --}}

     {{-- <script src="{{ asset('js/vistaProductoCreate.js') }}"></script> --}}
    {{-- <input type="hidden" id="pantalla" value="producto"> --}}

@endsection
