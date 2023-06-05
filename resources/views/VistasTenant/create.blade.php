<x-app-layout>
    <x-container class="mt-4 flex justify-center">
        <form action="{{ route('tenant.store') }}" method="POST"
        class="w-1/2 space-y-3">
            @csrf

            <div class="space-x-2 mb-4 flex flex-col">
                <label class="px-1" for="id">
                        Id dominio
                </label>

                <input class="rounded focus:border-blue-700" type="text" name="id" value="{{ old('id')}}">

            </div>

            <div class="space-x-2 mb-4 flex flex-col">
                <label class="px-1" for="nombre">
                        Nombre de la empresa
                </label>
                <input class="rounded focus:border-blue-700" type="text" name="nombre" value="{{ old('id')}}">

            </div>

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Planes</label>
<select id="countries" name="id_plan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
@foreach ($planes as $p)
<option value="{{ $p->id }}">{{ $p->nombre }}</option>
@endforeach
</select>

            <button class="btn-blue " type="submit"> crear</button>
        </form>

    </x-container>
</x-app-layout>

