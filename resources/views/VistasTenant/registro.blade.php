<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="fixed top-0  px-40 py-5 z-50 bg-gray-100 w-full flex justify-center " >
        <div class="flex justify-between items-center w-1/2  ">
            <h1 class="font-semibold"> Volver </h1>
                <p class="flex hover:scale-105 transition cursor-pointer ">Logo </p>
                <p class="btn-teal flex h-8 ">
                   iniciar session
                    <ion-icon class="text-2xl ml-1" name="log-in-outline"></ion-icon>
                </p>
                <a href="{{ url('http://foo.localhost:8000/login') }}">ir a free</a>

        </div>
    </div>




    <x-container class="mt-16 flex justify-center">
        <form action="{{ route('empresa.store') }}" method="POST" class="w-1/2 ml-20 space-y-2">
            @csrf
            <h1 class="text-4xl pb-6 text-center text-gray-700 -ml-20"> Registra tu empresa</h1>

           <div class="w-3/4">
            <label for="id_plan" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo de
                Elige un Plan</label>
            <select id="id_plan" name="id_plan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($planes as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                @endforeach
            </select>
           </div>

            <div class="flex gap-6">
                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="id">
                        Id dominio
                    </label>
                    <input class="rounded focus:border-blue-700  w-full" type="text" name="id" value="{{ old('id') }}">

                </div>

                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="nombre">
                        Nombre de la empresa
                    </label>
                    <input class="rounded focus:border-blue-700 w-full" type="text" name="nombre" value="{{ old('nombre') }}">

                </div>
            </div>

            <div class="border-b w-3/4  border-gray-500">

            </div>
            <h1 class="text-2xl  text-gray-700 capitalize"> registra al usuario central </h1>
            <div class="w-3/4">
                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="name">
                        Nombre completo
                    </label>
                    <input class="rounded focus:border-blue-700 w-full"
                    type="text" id="name" name="name" value="{{ old('name') }}">

                </div>
                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="email">
                        Correo electronico
                    </label>
                    <input class="rounded focus:border-blue-700 w-full"
                    type="text" id="email" name="email" value="{{ old('email') }}">

                </div>

                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="password">
                        Contrasena
                    </label>
                    <input class="rounded focus:border-blue-700 w-full"
                    type="password" id="password" name="password">

                </div>

                <div class="space-x-2 mb-4 flex flex-col">
                    <label class="pl-2" for="password_confirmation">
                        Confirmar contrasena
                    </label>
                    <input class="rounded focus:border-blue-700 w-full"
                    type="password" id="password_confirmation" name="password_confirmation">

                </div>
            </div>

            <div class="w-full text-right pr-36">
                <button class="btn-blue  " type="submit"> Registrar</button>
            </div>
        </form>

    </x-container>

</body>
</html>
