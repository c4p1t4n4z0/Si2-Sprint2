@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
@vite(['resources/js/modal_uno.js'])

<div class="mx-10">

    <h2  class="font-extrabold  text-gray-600 dark:text-gray-200 text-center sm:m-4 m-3 pb-4 pt-1 text-2xl  sm:text-3xl lg:text-4xl ">
            Procesos Crediticios
    </h2>

    @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded font-mono w-fit mb-2">
                {{ session('success') }}
            </div>
    @endif

    <div class="flex justify-between">
        <a class="  p-2   text-center font-medium text-white bg-blue-500 rounded-md
        hover:bg-blue-600 leading-none transition hover:scale-105 "
             href="{{ Route('creditos.create2') }}">
            Nuevo Proceso Crediticio
        </a>

        {{-- <a class="  p-2   text-center font-medium text-white bg-blue-500 rounded-md
    hover:bg-blue-600 leading-none transition hover:scale-105 "
         href="{{ route('tipos.create') }}">
        Nuevo Tipo de cretido
    </a> --}}
     <button class="btn-blue" id="bt_abrir_modal">
        Tipos de credito
     </button>
     <dialog id="myModal" class="modal_open w-1/2 h-3/4 p-3 rounded-2xl ">
        <button id="bt_cerrar_modal" type="button"
        class="cursor-pointer absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
            width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5"
            stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
        </button>
        @include('VistasTenancyInquilinos.Creditos.modal_tipos_credito')
     </dialog>
    

    </div>

    <div class="my-4  shadow-xs ">
        <div class="w-full overflow-x-auto rounded-lg  px-2 bg-white pb-3 pt-1 ">
            <table class="w-full">
                <thead>
                    <tr
                    {{-- class="text-xs  text-center font-semibold tracking-wide text-white uppercase border-b dark:border-gray-700 bg-gray-500  dark:bg-gray-800 "> --}}
                        class="text-xs  text-left font-semibold tracking-wide bg-white text-gray-500 dark:border-gray-700 dark:bg-gray-800 ">
                        <th class="py-3 text-center   "> Nro</th>
                        <th class="px-4 py-3 ">Cliente</th>
                        <th class="px-8 py-3 ">Tipo de credito </th>
                        <th class="px-4 py-3 ">Asignado</th>
                        <th class="px-4 py-3 ">Monto</th>
                        <th class="px-8 py-3 ">Estado </th>
                        <th class="px-8 py-3 ">Fecha de solicitud </th>
                        <th class="px-8 py-3 ">Fecha de aprovacion </th>
                        <th class="px-8 py-3 ">Acciones </th>
                    </tr>
                </thead>

                <tbody class=" ">


                    @foreach ( $procesos as $proceso )
                        <tr
                            class=" bg-white text-gray-700  hover:border-white
                             hover:bg-gray-100 transition">
                            <td>
                                <p class=" text-normal text-center"> {{ $proceso->id }}</p>
                            </td>
                            <td class="px-4 py-3 text-sm capitalize ">cristian cuellar </td>
                            <td class="px-4 py-3 text-sm capitalize ">Credito vehicular</td>
                            <td class="px-4 py-3 text-sm capitalize ">oni guitierrez</td>
                            <td class="px-4 py-3 text-sm  ">70,000.00 bs</td>
                            <td class="px-4 py-3 text-sm capitalize "> {{ $proceso->estado }}</td>
                            <td class="px-4 py-3 text-sm text-center ">2023-06-03</td>
                            <td class="px-4 py-3 text-sm text-center "> ------ </td>


                            <td class="text-center">
                                <div class="flex justify-around items-center text-center">
                                    {{-- @can('cotizacion.edit') --}}
                                        <div class="flex justify-center ">
                                            <button title="EDITAR" type="button"
                                                onclick="window.location.href='#'"
                                                class="   rounded-lg w-fit p-2 mx-2 text-white
                                            hover:scale-125 transition-transform delay-75">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </button>

                                        </div>
                                    {{-- @endcan --}}
                                    {{-- @can('cotizacion.destroy') --}}
                                        <div>
                                            <form action="#"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" name="id" class="hidden"
                                                    value="">
                                                {{-- <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')"> --}}
                                                <button type="submit" title="ELIMINAR"
                                                    class="w-fit p-2   rounded-lg text-white
                                                     dark:hover:text-black hover:scale-125 transition-transform delay-75"
                                                    onclick="return confirm('Desea Eliminar?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-6 h-6 text-red-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    {{-- @endcan --}}

                                </div>
                            </td>
                        </tr>
                        <tr
                        class=" bg-white text-gray-700  hover:border-white
                         hover:bg-gray-100 transition">
                        <td>
                            <p class=" text-normal text-center"> {{ $proceso->id }}</p>
                        </td>
                        <td class="px-4 py-3 text-sm capitalize ">cristian cuellar </td>
                        <td class="px-4 py-3 text-sm capitalize ">Credito vehicular</td>
                        <td class="px-4 py-3 text-sm capitalize ">oni guitierrez</td>
                        <td class="px-4 py-3 text-sm  ">70,000.00 bs</td>
                        <td class="px-4 py-3 text-sm capitalize "> {{ $proceso->estado }}</td>
                        <td class="px-4 py-3 text-sm text-center ">2023-06-03</td>
                        <td class="px-4 py-3 text-sm text-center "> ------ </td>


                        <td class="text-center">
                            <div class="flex justify-around items-center text-center">
                                {{-- @can('cotizacion.edit') --}}
                                    <div class="flex justify-center ">
                                        <button title="EDITAR" type="button"
                                            onclick="window.location.href='#'"
                                            class="   rounded-lg w-fit p-2 mx-2 text-white
                                        hover:scale-125 transition-transform delay-75">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>

                                    </div>
                                {{-- @endcan --}}
                                {{-- @can('cotizacion.destroy') --}}
                                    <div>
                                        <form action="#"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="id" class="hidden"
                                                value="">
                                            {{-- <input type="submit" value="ELIMINAR" class=""
                                                onclick="return confirm('Desea Eliminar?')"> --}}
                                            <button type="submit" title="ELIMINAR"
                                                class="w-fit p-2   rounded-lg text-white
                                                 dark:hover:text-black hover:scale-125 transition-transform delay-75"
                                                onclick="return confirm('Desea Eliminar?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="w-6 h-6 text-red-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                {{-- @endcan --}}

                            </div>
                        </td>
                    </tr>
                    <tr
                    class=" bg-white text-gray-700  hover:border-white
                     hover:bg-gray-100 transition">
                    <td>
                        <p class=" text-normal text-center"> {{ $proceso->id }}</p>
                    </td>
                    <td class="px-4 py-3 text-sm capitalize ">cristian cuellar </td>
                    <td class="px-4 py-3 text-sm capitalize ">Credito vehicular</td>
                    <td class="px-4 py-3 text-sm capitalize ">oni guitierrez</td>
                    <td class="px-4 py-3 text-sm  ">70,000.00 bs</td>
                    <td class="px-4 py-3 text-sm capitalize "> {{ $proceso->estado }}</td>
                    <td class="px-4 py-3 text-sm text-center ">2023-06-03</td>
                    <td class="px-4 py-3 text-sm text-center "> ------ </td>


                    <td class="text-center">
                        <div class="flex justify-around items-center text-center">
                            {{-- @can('cotizacion.edit') --}}
                                <div class="flex justify-center ">
                                    <button title="EDITAR" type="button"
                                        onclick="window.location.href='#'"
                                        class="   rounded-lg w-fit p-2 mx-2 text-white
                                    hover:scale-125 transition-transform delay-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>

                                </div>
                            {{-- @endcan --}}
                            {{-- @can('cotizacion.destroy') --}}
                                <div>
                                    <form action="#"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" name="id" class="hidden"
                                            value="">
                                        {{-- <input type="submit" value="ELIMINAR" class=""
                                            onclick="return confirm('Desea Eliminar?')"> --}}
                                        <button type="submit" title="ELIMINAR"
                                            class="w-fit p-2   rounded-lg text-white
                                             dark:hover:text-black hover:scale-125 transition-transform delay-75"
                                            onclick="return confirm('Desea Eliminar?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-6 h-6 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            {{-- @endcan --}}

                        </div>
                    </td>
                </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="">
            <!-- Pagination -->
            {{ $cotizaciones->links() }}
        </div> --}}
    </div>


</div>
@endsection
