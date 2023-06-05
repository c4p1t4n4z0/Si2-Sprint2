<x-appinquilinos>
    {{-- <x-app-layout> --}}

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 editar tarea desde Inquilinos
            </h2>
        </x-slot>

        @if ($errors->any())
        {{-- @dd('estmao en erros') --}}
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="{{ route('tarea.update',$tarea->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for=""> Nombre</label> <br>
            <input type="text" value="{{ old('nombre',$tarea->nombre) }}" name="nombre">
        </div><br>
        <div>
            <label for="">
                Descripcion
            </label> <br>
            <textarea name="descripcion" id="" rows="3">
                {{ old('descripcion',$tarea->descripcion) }}
            </textarea>
        </div>

        <br>

        <div>
            <label for=""> imagen</label> <br>
            <input type="file" name="imagen">
        </div> <br>


        <button type="submit" class="btn-blue"> Actualizar</button>
    </form>


    </x-appinquilinos>

