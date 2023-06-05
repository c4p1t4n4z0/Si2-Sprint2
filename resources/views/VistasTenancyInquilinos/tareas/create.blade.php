<x-appinquilinos>
    {{-- <x-app-layout> --}}

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 crear tarea desde Inquilinos
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

    <form action="{{ route('tarea.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for=""> Nombre</label> <br>
            <input type="text" value="{{ old('nombre') }}" name="nombre">
        </div><br>
        <div>
            <label for="">
                Descripcion
            </label> <br>
            <textarea name="descripcion" id="" rows="3">
                {{ old('descripcion') }}
            </textarea>
        </div>

        <br>

        <div>
            <label for=""> imagen</label> <br>
            <input type="file" name="imagen">
        </div> <br>


        <button type="submit" class="btn-blue"> Guardar</button>
    </form>


    </x-appinquilinos>

