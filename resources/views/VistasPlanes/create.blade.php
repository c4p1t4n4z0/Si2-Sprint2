<x-navbar-central>

    <div class="flex-1 pl-36">
        <p class="p-2xl"> Registrar un plan</p>
    </div>

    {{-- creacion de planes --}}
    <div class=" flex  justify-center ">
        <div class="w-3/4">
            <form action="{{ route('planes.store') }}" method="post">
                @csrf
                <div class="space-y-12">

                    <div class="border-b border-gray-900/10 pb-6">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="nombre" class="block text-sm font-medium leading-6 text-gray-900">
                                    Nombre
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nombre" id="nombre" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="tipo_plan" class="block text-sm font-medium leading-6 text-gray-900">Tipo de
                                    plan</label>
                                <div class="mt-2">
                                    <select id="tipo_plan" name="tipo_plan"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="mensual">Mensal</option>
                                        <option value="trimestral">Trimestral</option>
                                        <option value="anual">Anual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="descripcion"
                                    class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
                                <div class="mt-2">
                                    <textarea
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        name="descripcion"></textarea>
                                </div>
                            </div>



                            <div class="sm:col-span-2 row-start-3">
                                <label for="precio"
                                    class="block text-sm font-medium leading-6 text-gray-900">Precio</label>
                                <div class="mt-2">
                                    <input type="number" name="precio" id="precio" autocomplete="address-level1"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2 row-start-3 flex  justify-center items-end  mb-3.5 space-x-3">
                                <label for="estado"
                                    class="ml-3  font-medium text-gray-900 dark:text-gray-300">Deshabilitado </label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="estado" id="estado" class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>
                            {{-- <input type="checkbox" name="xdxd" id=""> --}}


                           <div class="flex flex-col row-start-4 col-span-5 space-y-2">
                            <div class="flex justify-between items-end mb-1">
                                <label for="">
                                    Caracteristicas
                                </label>
                                <button type="button" class="py-1 px-2 ml-2 mr-16 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> --}}
                                    <span>Adicionar nuevo campo</span>
                                </button>
                            </div>
                            <div class="flex">
                                <div class="flex-1  items-center  ">
                                    {{-- <label for="simple-search" class="sr-only">Caracteristica</label> --}}
                                    <div class="relative w-full">
                                        <input type="text" id="simple-search" placeholder="...................." required name="caracteristicas[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                                         block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                          dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="border bg-red-600 text-center items-center flex rounded-lg p-1 m-1 ml-4 transition hover:scale-125 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>

                                </div>
                            </div>

                            <div class="flex space-y-2">
                                <div class="flex-1  items-center  ">
                                    <div class="relative w-full">
                                        <input type="text" id="simple-search" placeholder="...................." required  name="caracteristicas[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                                         block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                          dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="border bg-red-600 text-center items-center flex rounded-lg p-1 m-1 ml-4 transition hover:scale-125 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>

                                </div>
                            </div>


                            <div class="flex space-y-2">
                                <div class="flex-1  items-center  ">
                                    <div class="relative w-full">
                                        <input type="text" id="simple-search" placeholder="...................." required  name="caracteristicas[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                                         block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                          dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <div class="border bg-red-600 text-center items-center flex rounded-lg p-1 m-1 ml-4 transition hover:scale-125 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white ">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                      </svg>

                                </div>
                            </div>

                           </div>


                        </div>
                    </div>


                </div>

                <div class="mt-2 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </div>


    </div>
</x-navbar-central>
