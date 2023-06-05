<div class="grid grid-cols-3 gap-5 w-3/4 items-end border-b border-gray-300 pb-5 ">
    {{-- In work, do what you enjoy. --}}
    <div class="flex flex-col  ">
        <div class="flex  ">
            <label for="ci_cliente" class="label-xd" >
                Carnet de Identidad:
            </label>
            {{ $buscar }}
            @error('ci_cliente')
                <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                    <small>*{{ $message }}</small>
                </p>
            @enderror
        </div>
        <input class="mt-0 mb-1 text-gray-500 font-normal   h-8 pl-3 text-sm
                    border-gray-300 rounded border
                    focus:outline-none focus:border focus:border-blue-900 capitalize"
            wire:model="buscar"  wire:keydown="buscar"
            id="paterno"  type="text" autocomplete="off"  />
            <div class="flex flex-col space-y-1 relative  ">
                {{-- //hacer un foreach de los clientes --}}
              @foreach ($clientes as $cliente )
              @if ($estado)
              <button class="btn-gray-100 absolute w-full text-gray-600 opacity-90" wire:click.prevent='rellenar_ci({{ $cliente->id_usuario}})'>
                <span> {{ $cliente->name}}</span>
                <span> {{ $cliente->apellido}}</span>
                <span>- CI:{{ $cliente->ci}}</span>
            </button>
              @endif
              @endforeach
            </div>
        </div>
        <input type="hidden" name="id_cliente" value="" wire:model="caja_id" />


    <div class="flex flex-col col-span-2 ">
        <div class="flex justify-between items-end ">
            <label for="nombre" class="label-xd">
                Nombres Cliente:
            </label>
            @error('nombre')
                <p class="text-red-500 text-xs sm:text-sm px-1 sm:px-2  sm:pr-3 font-semibold rounded-xl  w-max">
                    <small>*{{ $message }}</small>
                </p>
            @enderror
            <a class="btn-gray mb-0.5" href="{{ route('clientes.create') }}"> Crear cliente</a>
        </div>
        <!-- mientras escribo, que busque en la tabla cliente -->
        <input class="input-xd "
         id="nombre" type="text" autocomplete="off" value="{{ $caja_nombre }}" />

    </div>

</div>
