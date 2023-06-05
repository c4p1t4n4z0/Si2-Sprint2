@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')

<!-- component -->
<div class=" p-5  shadow-2xl border rounded-xl">
    <div class="flex justify-between p-1 border-b mb-6 ">
        <p class="text-2xl font-semibold  text-slate-800">
             Clientes</p>
        <a class="text-white py-1 px-2 rounded font-semibold bg-slate-700"
        href="{{ route('clientes.create') }}"> AGREGAR NUEVO CLIENTE </a>
    </div>

    <div class="flex flex-row-reverse justify-between">

    @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded font-mono ">
                {{ session('success') }}
            </div>
        @endif
    </div>


        <div class=" bg-gray-100 w-full  font-sans overflow-hidden">
                <div class="bg-white shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-0 text-center">Nro</th>
                                <th class="py-3 px-6 text-left">NOMBRE-CORREO</th>

                                <th class="py-3 px-6 text-center">CI</th>
                                <th class="py-3 px-6 text-center">TELEFONO</th>
                                <th class="py-3 px-6 text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @php $i =0;   @endphp
                         @foreach ($clientes as $cli)
                         @php $i++ @endphp
                         <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-2 text-left  whitespace-nowrap">
                                <div class="flex items-center text-center">
                                    <span class="font-medium w-full "> {{ $i }}</span>
                                </div>
                            </td>
                            <td class="py-2 px-6 text-left">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <img class="w-8 h-8 rounded-full"
                                        src="{{ asset('img/Clientes/' . $cli->foto) }}" />
                                    </div>
                                 <div>
                                    <p class="font-bold">{{ $cli->name }} {{ $cli->apellido }} </p>
                                    <p class="font-normal">{{ $cli->email }}</p>
                                 </div>
                                </div>
                            </td>
                            {{-- <td class="py-3 px-6 text-center"> --}}
                                {{-- <p class="font-normal capitalize">{{ $cli->nombre }}</p> --}}
                            {{-- </td> --}}
                            <td class="py-3 px-6 text-center">
                                <p class="font-normal">{{ $cli->ci }}</p>
                            </td>

                            <td class="py-3 px-6 text-center">
                                <p class="font-normal">{{ $cli->telefono }}</p>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    <a href="{{ route('clientes.show', $cli->id_usuario) }}"
                                        class="w-7  h-7 rounded-lg bg-yellow-600 text-gray-200 shadow p-1
                                transform hover:bg-yellow-700  hover:scale-110 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                   <a href="{{ route('clientes.edit',$cli->id_usuario) }}"
                                   class="w-7  h-7 rounded-lg bg-blue-600 text-gray-200 shadow p-1
                                   transform hover:bg-blue-700  hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>

                                   </a>
                                   <form action="{{ route('clientes.destroy', $cli->id_usuario) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="w-7  h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1
                                    transform hover:bg-red-700 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    </button>
                                </form>
                                <a href="{{ route('creditos.create',$cli->id) }}" class="btn-teal"> Solicitar Credito </a>
                                </div>
                            </td>
                        </tr>
                         @endforeach






                        </tbody>
                    </table>

                     {{-- paginacion --}}
                <div class="d-flex justify-content-center">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button class=" p-2 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    {{ $clientes->links() }}
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
                {{-- end paginacion --}}
                </div>
        </div>
    </div>

@endsection
