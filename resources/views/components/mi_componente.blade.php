<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link href="{{ asset('build/assets/app-5c5af6e8.css') }}" rel="stylesheet">
</head>
<body>


    {{-- //esto podira ser un componeten --}}
    <div class="w-full flex justify-center">
        <div class="w-4/6 border-black mt-8 p-4 bg-gray-200  ">
            {{ $slot }}
            {{-- <h1> {{ $tituloxd }}</h1> --}}
            <h1> {{ $titulodos ?? 'no se ingreso nada xd' }}</h1>
        </div>
    </div>


</body>
</html>
