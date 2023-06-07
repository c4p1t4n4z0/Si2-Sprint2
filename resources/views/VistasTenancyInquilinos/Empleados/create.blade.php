@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
    <div class="   ">
        <div class="flex  p-4 border-b mb-8">
            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
                href="{{ route('empleados.index') }}">
                <- Atras</a>

                    <p class="text-xl mt-1.5 font-bold text-slate-800"> Registro de Empleado</p>
        </div>

        <div class=" flex justify-center items-center">
            <div class=" w-full ">
                {{-- <p> hola que tal</p> --}}
                <form action="{{ route('empleados.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')


                    <div
                        class="grid grid-cols-3
                                     gap-y-2 gap-x-10 py-4 px-10  pt-10 m-5 border shadow-xl  rounded-xl
                                     ">
                        <div class="flex flex-col ">
                            <div class="flex  ">
                                <label for="nombre"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Nombres:
                                </label>

                            </div>
                            <input
                                class="text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="nombre" name="nombre" type="text" autocomplete="off"
                                value="{{ old('nombre') }}" />
                            @error('nombre')
                                <p class="text-red-500 text-sm  px-1 font-semibold ">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col ">
                            <div class="flex  ">
                                <label for="apellido"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Apellidos
                                </label>
                            </div>
                            <input
                                class="text-gray-500 font-normal  h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="apellido" name="apellido" type="text" autocomplete="off"
                                value="{{ old('apellido') }}" />
                            @error('apellido')
                                <p class="text-red-500 text-sm  px-1 font-semibold ">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>


                        <div class="flex flex-col  ">
                            <label for="ci" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                Cedula de Identidad:
                            </label>

                            <input id="ci"
                                class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                name="ci" type="number" step="0.01" autocomplete="off" value="{{ old('cedula') }}"
                                min="0" />
                            @error('ci')
                                <p class="text-red-500 text-sm  px-1 font-semibold ">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col  ">
                            <label for="telefono" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                Telefono:
                            </label>
                            <input
                                class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                id="telefono" name="telefono" type="number" step="0.01" autocomplete="off"
                                value="{{ old('telefono') }}" min="0" />


                        </div>

                        <div class="flex flex-col ">

                                <label for="fecha_nac"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Fecha de Nacimiento:
                                </label>

                            <input
                                class=" text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="fecha_nac" name="fecha_nac" type="date" autocomplete="off"
                                value="{{ old('fecha_nac') }}" />
                        </div>


                        <div
                        class=" p-4 row-span-4">
                        <div class=" flex justify-between  ">
                            <button class="text-xs  xl:text-xl font-medium text-gray-600 dark:text-gray-400
                            border-2 border-lg border-gray-400 rounded-lg px-2 w-fit"
                                type="button" id="button_subir_foto">
                                Subir Foto
                            </button>
                            <input id="file_foto_ventas" name="foto" type="file" class="sr-only">

                        </div>
                        <div class="mt-4 flex flex-col items-center ">
                            <img id="img_fotoventas" src="{{ asset('img/Empleados/' . old('foto', 'defecto.jpg')) }}"
                                alt="no se cargo" height=""
                                class=" h-44 sm:h-64 xl:h-64 object-cover rounded-xl border-2 border-spacing-2 border-black">
                        </div>

                    </div>


                    <div class="flex flex-col col-span-2   ">
                        {{-- @include('VistaProductos.Modal_crear_proveedo') --}}

                        <div class="flex justify-between mb-1">
                            <label class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                Area:
                            </label>
                            {{-- <button id="bt_crear_proveedorM" type="button"
                                    class="text-black text-xs hover:bg-blue-200 hover:border-black border rounded px-1 ">
                                    Registart Area</button> --}}
                        </div>
                        <select name="area" id="select_categoria"
                            class="w-full mb-2  p-1 rounded-lg text-sm bg-gray-800 border  border-gray-700  text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>


                        <div class="flex flex-col col-span-2">
                            <div class="flex  ">
                                <label for="cliente"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Domicilio:
                                </label>

                            </div>
                                <textarea class="text-gray-500 font-normal pl-3 text-sm
                                border-gray-300 rounded border
                                focus:outline-none focus:border focus:border-blue-900 capitalize"
                                name="domicilio"  id="domicilio" autocomplete="off"  rows="3">{{ old('domicilio') }}"</textarea>

                        </div>


                        <div class="flex flex-col ">

                                <label for="email"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Correo Electronico:
                                </label>

                            <input
                                class=" text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900"
                                id="email" name="email" type="email" autocomplete="off"
                                value="{{ old('email') }}" />
                                @error('email')
                                <p
                                    class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                            @error('correo_mal')
                                <p
                                    class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col ">

                                <label for="password"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Contrasena:
                                </label>

                            <input
                                class="text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900"
                                id="password" name="password" type="password" autocomplete="off"
                                value="{{ old('password') }}" />
                                @error('password')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror
                        </div>
                        <div class=" col-start-3 flex flex-row-reverse justify-between  p-5">
                            <button type="submit" class=" bg-gray-700 py-1 px-3 text-lg text-gray-100  rounded-xl">
                                Registrar
                            </button>
                        </div>

                    </div> <!-- end del div de columnas -->

                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/cargar_imagen.js') }}"></script>
    {{-- <script src="{{ asset('js/Proveedor/ProductoExiste.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/vistaProductoCreate.js') }}"></script> --}}
    {{-- <input type="hidden" id="pantalla" value="producto"> --}}
@endsection
