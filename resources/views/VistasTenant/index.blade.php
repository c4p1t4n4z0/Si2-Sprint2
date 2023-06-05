<x-app-layout>
    <x-container class="mt-4">
<div class="relative overflow-x-auto">
    <div class="flex flex-row-reverse justify-between mb-2">
        {{-- <a href="{{ route('tenant.create') }}" class="btn-blue"> Crear </a> --}}
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded font-mono ">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <table class="w-full text-sm text-left  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Dominio
                </th>
                <th scope="col" class="px-6 py-3">
                   Tipo de plan
                </th>
                <th scope="col" class="px-6 py-3">
                   acciones
                </th>
                <th>

                </th>

            </tr>
        </thead>
        <tbody>
          @foreach ($tenants as $t)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               {{ $t->id }}
            </th>
            <td class="px-6 py-4 ">
                   {{ $t->domains->first()->domain ?? '' }}
            </td>
            <td class="px-6 py-4 ">
                {{ $t->nombre }}
         </td>
            <td class="px-6 py-4 ">
                {{ $t->nombre_plan }}
         </td>
            <td class="px-6 py-4 flex space-x-3 ">
                   <a href="{{ route('tenant.edit',$t->id) }}">
                    editar
                   </a>
                   <form action="{{ route('tenant.destroy',$t->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        eliminar
                    </button>
                   </form>

            </td>
            <td>
                {{-- @php
                    $ruta = $t->domains->first()->domain;
                @endphp
                <a target="_blank"  href="http://{{ $ruta }}">
                    ir a la pagina {{ $t->domains->first()->domain }}
                   </a> --}}

            </td>

        </tr>
          @endforeach

        </tbody>
    </table>
</div>

    </x-container>


</x-app-layout>

