<x-appinquilinos>
    {{-- <x-app-layout> --}}

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Lista de tareas desde inquilinos
            </h2>
        </x-slot>
        <div class="justify-end flex">
            <a class="btn-green mb-4 "  href="{{ route('tarea.create') }}"> crear Tarea</a>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Descripcion
                    </th>
                </tr>
            </thead>
            <tbody>
             @if ($tareas->count())
             @foreach ($tareas as $t)
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $t->id }}
               </th>
               <td class="px-6 py-4">
                   {{-- {{ $t->nombre }} --}}
               <div class=" ">
                <img class="h-14" src="{{ route('file',$t->imagen) }}" alt="imagen xd xd">
                {{-- {{ route('file',$t->imagen) }} --}}
               </div>
            </td>
               <td class="px-6 py-4">
                      {{-- {{ $t->domains->first()->domain ?? '' }} --}}
                      {{ $t->nombre }}
               </td>
               <td class="px-6 py-4">
                   {{ $t->descripcion }}
            </td>
               <td class="px-6 py-4 flex space-x-2 ">
                      <a href="{{ route('tarea.edit',$t->id) }}">
                       editar
                      </a>
                      <form action="{{ route('tarea.destroy',$t->id) }}" method="post">
                       @csrf
                       @method('DELETE')
                       <button type="submit">
                           eliminar
                       </button>
                      </form>

               </td>

           </tr>
             @endforeach
             @else
             <tr>

                    <div class="flex justify-center">
                        <p> No hay tareas que mostrar</p>
                     </div>

             </tr>
             @endif

            </tbody>
        </table>
</x-appinquilinos>
