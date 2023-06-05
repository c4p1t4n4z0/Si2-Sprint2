<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}


    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        {{-- {{ $correo }} --}}
        {{-- {{ $seleccionado }} --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"  wire:model='correo'  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                {{-- {{ $empresas == null ? 'true': 'false' }} --}}
               @if ($empresas != null)
               <div class="mt-1 ">
                <label class ='block font-medium text-sm text-gray-700'>
                    Selecciona una empresa:
                </label>
                  <div class="space-y-2">
                    @foreach ($empresas as $empresa)
                    {{-- @dd($seleccionado,$empresa->id) --}}
                    @if ($seleccionado == $empresa->empresa)
                        <button wire:click="seleccionar('{{ $empresa->empresa }}')" type="button"
                        class="w-full  animate-fadeIn bg-blue-500 border shadow-blue-500 text-white rounded-lg p-1 px-5 flex items-center space-x-4">
                            <img src="https://www.tailorbrands.com/wp-content/uploads/2020/07/mcdonalds-logo.jpg" alt="" class="h-6">
                            <p class="font-medium ">
                                <span class="font-bold"> Empresa: {{ $empresa->empresa }}</span>
                            </p>
                        </button>
                    @else
                        <button wire:click="seleccionar('{{ $empresa->empresa }}')" type="button"
                        class="w-full  animate-fadeIn bg-orange-50 border border-orange-300 rounded-lg p-1 px-5 flex items-center space-x-4">
                            <img src="https://www.tailorbrands.com/wp-content/uploads/2020/07/mcdonalds-logo.jpg" alt="" class="h-6">
                            <p class="font-medium ">
                                <span class="font-bold"> Empresa: {{ $empresa->empresa }}</span>
                            </p>
                        </button>
                    @endif
                    @endforeach
                  </div>
                </div>

               @endif

        </div>

        <input type="hidden" name="seleccionado" value="{{ $seleccionado }}">

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class=" mt-4 flex justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <!-- obivdaste tu ontrasena -->
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('register')}}" class="cursor-pointer font-semibold px-2 py-1 hover:border-2 hover:border-blue-700 rounded-lg">
                Registrate
            </a>


            <x-primary-button >
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

</div>
