<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd('llegamos al registro de usuario ');
        //validacines,
        //'unique:'.User::class debe ser unico,
        //'confirmed' //  debe coincidir con el campo de confirmación
        // debe cumplir con las reglas de contraseña predeterminadas definidas en la clase Rules\Password.
        // Estas reglas predeterminadas incluyen una longitud mínima, al menos una letra mayúscula,
        //al menos un número y al menos un carácter especial.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //creacion de usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //encripta la contra
        ]);

        //ejeuta un evento, averiguar que hace
        // ejeuta acciones cuando alguein se haya logueado,
        // puede enviarte correos, alguein ingreso a tu cuenta y eso, etx.
        // event(new Registered($user));
        //envia el link para el usuario confirme el email.

        //se hace login automaticamente
        Auth::login($user);

        //direccionar a la ruta donde quiso entrar, o dashboard
        return redirect(RouteServiceProvider::HOME);
    }
}

