@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
@vite('resources/js/cargar_imagen.js')
    <div class="   ">
        <div class="flex  p-4 border-b mb-8">
            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
                href="{{ route('empleados.index') }}">
                <- Atras</a>

                 <p class="text-xl mt-1.5 font-bold text-slate-800"> editar un Empleado</p>
        </div>


        <div class=" flex justify-center items-center">
            <div class=" w-full ">
                {{-- <p> hola que tal</p> --}}

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
                            <input disabled
                                class="text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="nombre" name="nombre" type="text" autocomplete="off"
                                value="{{ old('nombre',$empleado->name) }}" />
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
                            <input disabled
                                class="text-gray-500 font-normal  h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="apellido" name="apellido" type="text" autocomplete="off"
                                value="{{ old('apellido',$empleado->apellido) }}" />
                            @error('apellido')
                                <p class="text-red-500 text-sm  px-1 font-semibold ">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>


                        <div class="flex flex-col  ">
                            <label for="cedula" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                Cedula de Identidad:
                            </label>

                            <input id="cedula" disabled
                                class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                name="cedula" type="number" step="0.01" autocomplete="off" value="{{ old('cedula',$empleado->ci) }}"
                                min="0" />
                            @error('cedula')
                                <p class="text-red-500 text-sm  px-1 font-semibold ">
                                    <small>*{{ $message }}</small>
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col  ">
                            <label for="telefono" class="text-gray-800 text-sm mb-1 font-semibold  ">
                                Telefono:
                            </label>
                            <input disabled
                                class="pl-3 text-gray-500 text-center font-normal w-full h-8 text-sm border-gray-300 rounded border
                                        focus:outline-none focus:border focus:border-blue-900 "
                                id="telefono" name="telefono" type="number" step="0.01" autocomplete="off"
                                value="{{ old('telefono',$empleado->telefono) }}" min="0" />


                        </div>

                        <div class="flex flex-col ">

                                <label for="fecha_nac"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Fecha de Nacimiento:
                                </label>

                            <input disabled
                                class=" text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="fecha_nac" name="fecha_nac" type="date" autocomplete="off"
                                value="{{ old('fecha_nac',$empleado->fecha_nac) }}" />
                        </div>


                        <div
                        class=" p-4 row-span-4">
                       <label class="label-xd"">Foto</label>
                        <div class="mt-4 flex flex-col items-center ">
                            <img id="img_fotoventas" src="{{ asset($empleado->foto) }}"
                                alt="no se cargo" height=""
                                class=" h-44 sm:h-64 xl:h-64 object-cover rounded-xl border-2 border-spacing-2 border-black">
                        </div>

                    </div>


                    <div class="flex flex-col col-span-2   ">
                         <div class="flex justify-between mb-1">
                            <label class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                Area:
                            </label>
                        </div>
                        <input disabled
                        class="text-gray-500 font-normal  h-8 pl-3 text-sm
                            border-gray-300 rounded border
                            focus:outline-none focus:border focus:border-blue-900 capitalize"
                        id="apellido" name="apellido" type="text" autocomplete="off"
                        value="{{ old('apellido',$empleado->area) }}" />

                    </div>


                        <div class="flex flex-col col-span-2">
                                <label for="domicilio"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Domicilio:
                                </label>
                                <textarea class="text-gray-500 font-normal pl-3 text-sm
                                border-gray-300 rounded border
                                focus:outline-none focus:border focus:border-blue-900 capitalize"
                                disabled name="domicilio"  id="domicilio" autocomplete="off"  rows="3">{{ old('domicilio',$empleado->domicilio) }}</textarea>

                        </div>


                        <div class="flex flex-col ">

                                <label for="correo"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Correo Electronico:
                                </label>

                            <input disabled
                                class=" text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900"
                                id="correo" name="correo" type="email" autocomplete="off"
                                value="{{ old('correo',$empleado->email) }}" />
                                @error('correo')
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

                                <label for="contrasena"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Contrasena:
                                </label>

                            <input  disabled
                                class="text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900"
                                id="contrasena" name="contrasena" type="password" autocomplete="off"
                                value="{{ old('contrasena','*******************') }}" />
                                @error('contrasena')
                                        <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                            <small>*{{ $message }}</small>
                                        </p>
                                    @enderror
                        </div>
                        <div class=" col-start-3 flex flex-row-reverse justify-between  p-5">
                            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
                href="{{ route('empleados.index') }}">
                Volver</a>
                        </div>

                    </div> <!-- end del div de columnas -->

            </div>
        </div>
    </div>

@endsection
