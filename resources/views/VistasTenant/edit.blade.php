<x-app-layout>
    <x-container class="mt-4">
        <form action="{{ route('tenant.update',$tenant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-x-2 mb-4 flex flex-col">
                <label class="px-1" for="id">
                        Nombre
                </label>
                <input type="text" name="id" value="{{ old('id',$tenant)}}">
            </div>

            <button class="btn-blue " type="submit"> actualizar</button>
        </form>

    </x-container>
</x-app-layout>
