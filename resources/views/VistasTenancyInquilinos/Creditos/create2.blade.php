@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
    {{--
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <div class="  ">
        <div class="flex w-3/4 =  p-3 pt-4 border-b mb-8">
            <a class="text-white px-3 text-center h-full p-1.5 mr-4 rounded-lg font-semibold bg-slate-700"
                href="{{ route('creditos.index') }}">
                <- Atras</a>
                    <p class="text-xl mt-1.5 font-bold text-slate-800 flex-1 text-center"> Registro de Procesos </p>
        </div>

        <div class=" flex justify-center items-center">
            <div class="  w-3/4  ">
                <form action="{{ route('creditos.store') }}" method="post">
                    @csrf
                    {{-- @dd($tenacnt = tenancy()->tenant) --}}
                    @livewire('buscar-cliente', [tenancy()->tenant])

                    <div class="grid grid-cols-3 gap-5 w-3/4 mt-8 border-b pb-5 border-gray-300">
                        <div class="flex flex-col col-span-2 ">
                            <div class="flex justify-between ">
                                <label class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                    Tipo de credito:
                                </label>
                                <a class="label-xd mr-4 border shadow-lg shadow-blue-300 rounded px-1 " href="{{ route('tipos.create') }}"> nuevo tipo</a>
                            </div>

                            <select name="tipo" id="tipo"
                                class="w-full mb-2  p-1 rounded-lg text-sm bg-gray-800 border  border-gray-700  text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col ">
                            <div class="flex justify-between mb-1">
                                <label for="empleado" class="text-gray-800 text-sm font-semibold   leading-tight tracking-normal">
                                    Asesor a Cargo:
                                </label>
                            </div>
                            <select name="empleado" id="empleado"
                                class="w-full mb-2  p-1 rounded-lg text-sm bg-gray-800 border  border-gray-700  text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                {{-- @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}">{{ $empleado->name }}</option>
                                @endforeach --}}
                                <option value=""> Empleados x</option>
                            </select>
                        </div>

                        <div class="flex flex-col col-span-2 row-span-2 ">
                            <label class="label-xd" for="obs">Observacion:</label>
                            <textarea class="area-xd w-full h-full " name="observacion" id="obs" ></textarea>
                        </div>

                        <div class="flex flex-col ">
                            <div class="flex  ">
                                <label for="monto"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Monto:
                                </label>
                                @error('monto')
                                    <p
                                        class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                        <small>*{{ $message }}</small>
                                    </p>
                                @enderror
                            </div>
                            <input
                                class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="monto" name="monto" type="number" step="0.1"
                                value="{{ old('monto') }}" />
                        </div>

                        <div class="flex flex-col  ">
                            <div class="flex  ">
                                <label for="plazo"
                                    class="text-gray-800 text-sm font-semibold mb-1  leading-tight tracking-normal">
                                    Plazo: <span class="text-xs font-normal"> (en años) </span>
                                </label>
                                @error('plazo')
                                    <p  class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                                        <small>*{{ $message }}</small>
                                    </p>
                                @enderror
                            </div>
                            <input
                                class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                                    border-gray-300 rounded border
                                    focus:outline-none focus:border focus:border-blue-900 capitalize"
                                id="plazo" name="plazo" type="text" value="{{ old('plazo') }}" />
                        </div>



                    </div>
                      <div class=" flex flex-row-reverse justify-between w-3/4  py-8 ">
                            <button type="submit" class=" btn-teal flex">
                                Siguiente
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                  </svg>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
