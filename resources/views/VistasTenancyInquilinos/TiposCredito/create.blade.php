@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
    @vite('resources/js/modal_uno.js')
    <div class="  ">
        <div class="flex w-3/4 =  p-3 pt-4 border-b mb-8">

            <nav class="flex p-1.5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="#"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Procesos Crediticios</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="#"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                Tipos de Credito</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="pl-1 text-sm border-b border-gray-300 scale-125 transition font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                                Crear Credito</span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- <p class="text-xl mt-1.5 font-bold text-slate-800 flex-1 text-center">
                        Registro de Tipo de Credito
                    </p> --}}
        </div>
    </div>

    <x-mi_container_chico>
        <div class=" mt-5 space-y-4  ">
            <form action="{{ route('tipos.store') }}" method="post">
                @csrf
                <div class="grid gap-x-8 gap-y-2 grid-cols-2 pb-6 border-b border-gray-300 ">
                    <div class="">
                        <div class="flex">
                            <label for="" class="label-xd"> Nombre </label> <br>
                            @error('nombre')
                                <span class="text-red-500 text-xs"> *{{ $message }}</span>
                            @enderror
                        </div>
                        <input class="input-xd w-full" type="text" name="nombre">
                    </div>
                    <div>
                        <div class="flex">
                            <label for="interes" class="label-xd"> Interes </label> <br>
                            @error('interes')
                                <span class="text-red-500 text-xs"> *{{ $message }}</span>
                            @enderror
                        </div>
                        <input class="input-xd " type="number" name="interes">
                    </div>
                    <div class="row-span-2">
                        <div class="flex">
                            <label for="" class="label-xd"> Descripcion </label> <br>
                            @error('descripcion')
                                <span class="text-red-500 text-xs"> *{{ $message }}</span>
                            @enderror
                        </div>
                        <textarea class="area-xd" name="descripcion" rows="4" id=""></textarea>
                    </div>

                    <div>
                        <div class="flex">
                            @error('monto_minimo')
                                <span class="text-red-500 text-xs"> *{{ $message }}</span>
                            @enderror
                            <label for="monto_minimo" class="label-xd">Monto Minimo </label> <br>

                        </div>
                        <input class="input-xd" type="number" step="0.01" name="monto_minimo" id="monto_minimo">
                    </div>
                    <div>
                        <div class="flex">
                            <label for="monto_maximo" class="label-xd"> Monto Maximo </label> <br>

                            @error('monto_maximo')
                                <span class="text-red-500 text-xs"> *{{ $message }}</span>
                            @enderror
                        </div>
                        <input class="input-xd" type="number" step="0.01" name="monto_maximo" id="monto_maximo">
                    </div>

                </div>

                <div class="mt-4 mr-48 flex justify-between">
                    <p class="text-gray-600 font-semibold text-xl"> Requisitos</p>
                    <button class="btn-gray flex " id="bt_abrir_modal">
                        Agregar Requisito
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="ml-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                        </svg>
                    </button>



                    <dialog id="myModal" class="modal_open w-1/3 h-1/4 overflow-y-auto p-3 rounded-2xl ">
                        <button id="bt_cerrar_modal" type="button"
                            class="cursor-pointer absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        @foreach ($requisitos as $requisito)
                            <p> {{ $requisito->descripcion }}</p>
                        @endforeach
                    </dialog>
                </div>
                {{-- de momento 3 requisitos --}}
                <div class="mt-2 space-y-2">
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="requisitos[]" id="">
                        @foreach ($requisitos as $requisito)
                            <option value="{{ $requisito->id }}">{{ $requisito->descripcion }}</option>
                        @endforeach
                    </select>

                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="requisitos[]" id="">
                        @foreach ($requisitos as $requisito)
                            <option value="{{ $requisito->id }}">{{ $requisito->descripcion }}</option>
                        @endforeach
                    </select>

                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="requisitos[]" id="">
                        @foreach ($requisitos as $requisito)
                            <option value="{{ $requisito->id }}">{{ $requisito->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                {{--
<div class="flex items-center mt-1 mr-32">
    <label for="voice-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
              </svg>
        </div>
        <input type="text" id="voice-search" name=""
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full pl-10 p-2"
         value="Search Mockups, Logos, Design Templates..." readonly  >

    </div>
    <button type="submit" class="inline-flex items-center py-1 px-3 ml-2 text-sm font-medium text-white bg-red-600 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
          </svg>

    </button>
</div> --}}



                <div class=" flex-1 text-right m-10">
                    <button class="btn-teal">
                        Registrar!
                    </button>
                </div>
            </form>


        </div>
    </x-mi_container_chico>
@endsection
