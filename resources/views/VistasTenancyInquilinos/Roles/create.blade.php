@extends('VistasTenancyInquilinos.navbar')

@section('Contenido')
    <div class="mx-10 mt-5 space-y-4">
        <div>
            <p class="mb-8">Registro de Rol</p>
            <x-input-label :value="'Nombre'" />
            <x-text-input class="p-2 mt-1 ">
            </x-text-input>
        </div>

        <form action="#" method="post">
            @csrf

       <div class="grid grid-cols-3 gap-y-5 gap-x-10">
        <div class="flex flex-col space-y-2 ">
            <h1 class="text-lg font-semibold text-gray-700"> Ctegoria 1</h1>

            <div class="flex   border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 flex  items-center p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

            <div class="flex justify-center items-center  border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

            <div class="flex justify-center items-center  border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

        </div>

        <div class="flex flex-col space-y-2 ">
            <h1 class="text-lg font-semibold text-gray-700"> Ctegoria 2</h1>

            <div class="flex justify-center items-center  border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

            <div class="flex justify-center items-center  border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

            <div class="flex justify-center items-center  border-2 rounded px-2 py-1  ">
                <div class="bg-red-300 p-1 h-full">
                    <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value=""
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="ml-2 text-sm">
                    <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Free shipping via
                        Flowbite</label><br>
                    <label for="helper-checkbox" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders
                        shipped from $25 in books or $29 in other categories</label>
                </div>
            </div>

        </div>
       </div>

      <div class=" flex-1 bg-red-200 text-right m-10">
        <button class="btn-blue">
            Registrar Rol
        </button>
      </div>
</form>


    </div>


@endsection
