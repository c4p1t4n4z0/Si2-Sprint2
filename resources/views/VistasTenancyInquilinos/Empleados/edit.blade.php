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
            href="{{ route('empleados.index',) }}"> <- Atras</a>

            <p class="text-xl mt-1.5 font-bold text-slate-800"> Actualizando Empleado</p>
        </div>

        <div class=" flex justify-center items-center">
            <div class=" w-full ">
                {{-- <p> hola que tal</p> --}}
                <form action="{{ route('empleados.update',$empleado->id_usuario,) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="py-4 px-4 max-w-full m-3 pt-10  sm:m-5 border shadow-xl  rounded-xl
                                lg:px-10  2xl:mx-20 ">

                        <div class="grid grid-row-12 grid-cols-3
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
                                    value="{{ old('nombre', $empleado->name) }}" />
                            </div>

                            <div class="flex flex-col ">
                                <div class="flex  ">
                                    <label for="paterno"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Apellido Paterno:
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
                                    id="paterno" name="paterno" type="text" autocomplete="off"
                                    value="{{ old('paterno',$empleado->ap_paterno) }}" />
                            </div>

                            <div class="flex flex-col ">
                                <div class="flex  ">
                                    <label for="materno"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Apellido Materno:
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
                                    id="materno" name="materno" type="text" autocomplete="off"
                                    value="{{ old('materno',$empleado->ap_materno) }}" />
                            </div>




                            <div class="flex flex-col row-start-2
                            ">
                                <label for="cedula" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                    Cedula de Identidad:
                                </label>
                                {{-- <div class="relative">
                                    <input type="text" class="w-full pr-10" />
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">Texto de ejemplo</span>
                                  </div> --}}
                                <div class="relative">
                                    <input id="cedula"
                                    class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                    name="cedula" type="number"  autocomplete="off"
                                     value="{{ old('cedula',$empleado->ci) }}"
                                     min="0" />

                                </div>

                            </div>

                            <div class="flex flex-col row-start-2
                            ">
                                <label for="telefono" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                    Telefono:
                                </label>
                                {{-- <div class="relative">
                                    <input type="text" class="w-full pr-10" />
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">Texto de ejemplo</span>
                                  </div> --}}
                                <div class="relative">
                                    <input class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                        id="telefono" name="telefono" type="number"  autocomplete="off"
                                        value="{{ old('telefono',$empleado->telefono) }}"
                                   min="0" />
                                </div>

                            </div>

                             <!-- sm:row-start-3 sm:col-start-2 sm:row-span-4 -->
                             <div
                             class="row-start-2 p-4 row-span-4">
                             <div class=" flex justify-between  ">
                                 <!-- flex justify-between mt-4 lg:w-1/2-->
                                 <button
                                     class="text-xs  xl:text-xl font-medium text-gray-600 dark:text-gray-400
                                 border-2 border-lg border-gray-400 rounded-lg px-2 w-fit"
                                     type="button" id="button_subir_foto">
                                     Subir Foto
                                 </button>
                                 <input id="file_foto_ventas" name="foto" type="file" class="sr-only">

                             </div>
                             <div class="mt-4 flex flex-col items-center ">
                                 <img id="img_fotoventas" src="{{ asset('img/Empleados/' . old('foto', $empleado->foto)) }}"
                                     alt="no se cargo" height=""
                                     class=" h-44 sm:h-64 xl:h-64 object-cover rounded-xl border-2 border-spacing-2 border-black">
                             </div>

                         </div>



                            <div class="flex flex-col lg:mt-2 row-start-3 col-span-1  ">
                                {{-- @include('VistaProductos.Modal_crear_proveedo') --}}

                                <div class="flex justify-between mb-1">
                                    <label class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                        Area:
                                    </label>
                                    {{-- <button id="bt_crear_proveedorM" type="button"
                                        class="text-black text-xs hover:bg-blue-200 hover:border-black border rounded px-1 ">
                                        Registrar Area</button> --}}
                                </div>
                                <select name="area" id="select_categoria"
                                    class="w-full mb-2  p-1 rounded-lg text-sm bg-gray-800 border  border-gray-700  text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col row-start-3 ">
                                <div class="flex  ">
                                    <label for="fecha_nac"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Fecha de Nacimiento:
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
                                    id="fecha_nac" name="fecha_nac" type="date" autocomplete="off"
                                    value="{{ old('fecha_nac',$empleado->fecha_nac) }}" />
                            </div>

                            <div class="flex flex-col col-span-2">
                                <div class="flex  ">
                                    <label for="cliente"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Domicilio:
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
                                    id="domicilio" name="domicilio" type="text" autocomplete="off"
                                    value="{{ old('domicilio',$empleado->domicilio) }}" />
                            </div>


                            <div class="flex flex-col row-start-5 ">
                                <div class="flex  ">
                                    <label for="correo"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Correo Electronico:
                                    </label>
                                    @error('correo')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror
                                    @error('correo_mal')
                                    <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                        <small>*{{ $message }}</small>
                                    </p>
                                @enderror
                                </div>
                                <input
                                    class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900"
                                    id="correo" name="correo" type="email" autocomplete="off"
                                    value="{{ old('correo',$empleado->email) }}" />
                            </div>

                            <div class="flex flex-col row-start-5 ">
                                <div class="flex  ">
                                    <label for="contrasena"
                                        class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                        Contrasena:
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
                                    focus:outline-none focus:border focus:border-blue-900"
                                    id="contrasena" name="contrasena" type="password" autocomplete="off"
                                    value="{{ old('contrasena',$empleado->password) }}" />
                            </div>


                            <div class=" sm:col-span-4 flex flex-row-reverse justify-between  py-5 ">
                                <button type="submit" class=" bg-gray-700 py-1 px-3 text-lg text-gray-100  rounded-xl">
                                    Actualizar
                                </button>
                            </div>

                        </div> <!-- end del div de columnas -->

                    </div> <!-- end de div principal-->

                </form>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/cargar_imagen.js') }}"></script>

@endsection
