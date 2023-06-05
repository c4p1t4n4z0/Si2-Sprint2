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

    <h1> estamos en create empresa</h1>
    <div>
       <form action="" method="post">
        @csrf
        <label for="nombre">nombre</label> <br>
        <input type="text" name="nombre" id="" >
        <br>
        <label for="descripcion">descripcion</label> <br>
        <input type="text" name="descripcion" id="" >

        <button type="submit">
            crear empreas
        </button>
       </form>
    </div>

</body>
</html>
