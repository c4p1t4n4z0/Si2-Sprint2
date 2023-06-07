<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    {{-- <link rel="stylesheet" href="{{ asset('css/desabilitarInputNumber.css') }}" /> --}}
</head>

<body class="">


    {{-- <div class="lg:bg-blue-500 md:bg-red-300 xl:bg-yellow-400 2xl:bg-purple-600 sm:bg-black bg-gray-400">
    <label>
        celu = plomo,
        sm 640px = black ,
        md 768px = rojo ,
        lg 1024px = azul ,
        xl 1280px = amariilo ,
        2xl 1536px = purpura ,
    </label>
    </div> --}}

    @php
        $link = [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard'),
                'active' => request()->routeIs('dashboard'), //verifica si se esta en la rota atual
            ],
            [
                'name' => 'Empleados',
                'url' => route('empleados.index'),
                'active' => request()->routeIs('empleados.*'), //verifica si se esta en la rota atual
            ],
            [
                'name' => 'Clientes',
                'url' => route('clientes.index'),
                'active' => request()->routeIs('clientes.*'), //verifica si se esta en la rota atual
            ],
            [
                'name' => 'Areas',
                'url' => route('areas.index'),
                'active' => request()->routeIs('areas.*'), //verifica si se esta en la rota atual
            ],
            [
                'name' => 'Roles',
                'url' => route('roles.index'),
                'active' => request()->routeIs('roles.*'), //verifica si se esta en la rota atual
            ],

            [
                'name' => 'Creditos',
                'url' => route('creditos.index'),
                'active' => request()->routeIs(['creditos.*', 'tipos.*']), //verifica si se esta en la rota atual
            ],
            // [
            //     'name' => 'Prueba',
            //     'url' => route('prueba'),
            //     'active' => request()->routeIs('prueba'), //verifica si se esta en la rota atual
            // ],
        ];
    @endphp


    <div class="bg-gray-100  h-screen flex p-2 pt-3 ">
        {{-- barra lateral de la izquierda  w-64 --}}
        <div class="bg-gray-100   text-gray-600  px-2 w-64  rounded-xl mr-6 ">
            <!--transition-transform duration-300 ease-in-out-->
            {{-- logo y botno para abriir las ventanas  --}}
            <div class="flex items-center ">

                <div
                    class="text-center flex flex-row-reverse justify-center py-5 border-gray-400 border-b mb-4  w-full ">
                    {{-- <img src="" alt=""> object-cover w-full h-full rounded-full --}}

                    {{-- <img class="text-center bg-red-900 "
                        src="{{ asset('img/Logo.png') }}" alt=""
                        loading="lazy"  width="40"/> --}}
                    {{-- <p> HOME -SPRINT 1</p> --}}
                    {{-- <a href="{{ route('planes') }}" >HOME -SPRINT 1 </a> --}}
                    <a href="#">HOME -SPRINT 1 </a>

                </div>
            </div>

            <div class=" flex flex-col space-y-2 justify-between   ">
                <div>
                    @foreach ($link as $l)
                    @php
                        $active = $l['active'];
                        $classes = $active ?? false ? 'flex items-center text-sm font-medium   py-2 px-2 bg-gray-300 text-gray-600 hover:text-base rounded-md transition duration-150 ease-in-out' : 'flex items-center text-sm font-medium   py-2 px-2 hover:bg-white text-gray-600 hover:text-base rounded-md transition duration-150 ease-in-out';
                    @endphp
                    <a class="{{ $classes }}" href="{{ $l['url'] }}">
                        <svg class="w-6 h-6 fill-current inline-block mr-3 " fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        {{ $l['name'] }}
                    </a>
                @endforeach
                </div>

                <div>
                    @php
                        use App\Models\Empleado;
                        $user = auth()->user();
                        $empleado = Empleado::where('id_usuario', $user->id)
                            ->join('areas as a', 'a.id', '=', 'empleados.id_area')
                            ->first();
                        // dd($empleado)
                    @endphp
                    <button>
                        <img src="" alt="">
                        <span> {{ $user->name }} {{ $user->apellido }}</span>
                        <span> {{ $empleado->nombre }} </span>
                    </button>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn-red">
                            Cerrar Session
                        </button>

                    </form>
                </div>





            </div> <!-- termina la barra lateral inzquierda-->

        </div>



        <div class=" w-full">
            <!-- ml-64-->

            <div class=" ">
                {{-- <div class="lg:bg-blue-500 md:bg-red-300 xl:bg-yellow-400 2xl:bg-purple-600 sm:bg-black bg-gray-400">
                    <label>
                        celu = plomo,
                        sm 640px = black ,
                        md 768px = rojo ,
                        lg 1024px = azul ,
                        xl 1280px = amariilo ,
                        2xl 1536px = purpura ,
                    </label>
                </div> --}}

                @yield('Contenido')
            </div>

        </div>

    </div>

    @livewireScripts()
</body>

</html>
