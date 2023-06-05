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

    <h1> hoa, estas en index</h1>

  <a href="{{ route('empresa.create') }}">
    Crear Empresa
  </a>

    <div >
       {{-- @if (count($empresas) > 0) --}}

    <table class="table-auto">
       <thead>
        <th> id </th>
        <th> nombre </th>
        <th> descripcion</th>
        <th>acciones </th>
       </thead>
       <tbody>
        @foreach ($empresas as $emp)
        <tr>
            <td>
                {{ $emp->id  }}
            </td>
            <td>
                {{ $emp->nombre  }}
            </td>
            <td>
                {{ $emp->descripcion  }}
            </td>
            <td>
               <div  class="flex flex-row space-x-2 ">
                <a href="{{ route('empresa.update',$emp->id) }}">editar</a>
               <form action="{{ route('empresa.destroy',$emp->id) }}" method="post">
                @csrf
                @method('DELETE')
                 <button type="submit">
                    eliminar
                 </button>
               </form>
               </div>
            </td>
        </tr>
       </tbody>
    </table>
         @endforeach
        {{-- @else
         <p> no hay ninugna empresa registrada</p>
       @endif --}}
    </div>

</body>
</html>
