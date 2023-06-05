<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('build/assets/app-5c5af6e8.css') }}" rel="stylesheet">

</head>
<body>

    <h1> estamos en edit empresa</h1>
    <div class="m-5">
       <form action="{{ route('empresa.update',$empresa->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nombre">nombre</label> <br>
        <input type="text" name="nombre" id="" value="{{ $empresa->nombre }}">
        <br>
        <label for="descripcion">descripcion</label> <br>
        <input type="text" name="descripcion" id="" value="{{ $empresa->descripcion }}">

        <br>
        <button class="btn-blue mt-4" type="submit">
            actualizar empreas
        </button>
       </form>
    </div>

</body>
</html>
