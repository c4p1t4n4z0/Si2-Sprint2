<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inquilinos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- @include('layouts.navigation') --}}
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class=" flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                 <div>
                    {{ $header }}
                 </div>
                 <div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn-red"> Cerrar Seccion</button>
                    </form>
                 </div>

                </div>

            </header>
        @endif



        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
