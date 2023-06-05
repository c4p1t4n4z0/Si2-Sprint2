<x-navbar-central>
    <div class="flex flex-row-reverse justify-between">
        <a class="btn-blue " href="{{ route('planes.create') }}"> Crear un plan</a>
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded font-mono ">
                {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- lista de planes --}}
    <div>
        <div class="grid grid-cols-4 gap-4 my-8 mx-4">
        @forelse ($planes as $p)
            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8
             dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 transition hover:scale-105">
                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400 capitalize">{{$p->nombre  }}</h5>
                <div class="flex items-baseline text-gray-900 dark:text-white">
                    <span class="text-3xl font-semibold">$</span>
                    <span class="text-5xl font-extrabold tracking-tight">{{ $p->precio }}</span>
                    <span class="ml-2 text-xl font-normal text-gray-500 dark:text-gray-400">{{ $p->tipo_plan }}</span>
                </div>
                <!-- List -->
                <ul role="list" class="space-y-5 my-7">

                   @foreach ($p->beneficios as $b )
                   <li class="flex space-x-3">
                    <!-- Icon -->
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400"> {{ $b->descripcion }} </span>
                    </li>
                   @endforeach


                </ul>
                <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Aqui iran las acciones</button>
            </div>


        @empty
            <div class="flex-1 text-gray-600 text-2xl text-center font-semibold mt-8" role="alert">
                <p> No hay planes registrados</p>
        @endforelse
            </div>

    </div>

</x-navbar-central>
