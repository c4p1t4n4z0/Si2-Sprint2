<?php

namespace App\Http\Requests\Auth;
use app\Models\User;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    //metedo para validar la autentificacion
    public function authenticate(): void
    {
        // dd('llegamos el modo de autentificacion ');

        //metodo para verificar los intentos que esta tratando de realizar
        //metodo verificar que no se vaya sobrepasado los intentos de loguearse
        $this->ensureIsNotRateLimited(); // ahi podemos indicas cuantas veces puede intentar loguear

        //
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
           //si la credenciales no son validad se incrimenta el conteo de peticiones
            RateLimiter::hit($this->throttleKey());

            //verificar si es el correo el que esta mal
            // dd(User::where('email',$this->only('email'))->first());
            if(User::where('email',$this->only('email'))->first())
               //esta bien el correo, true
               throw ValidationException::withMessages([
                'password' => trans('auth.password'),
            ]);

            //false, entonces el correo esta mal
            throw ValidationException::withMessages([
                'email' => trans('auth.email'),
            ]);
        }

        // si la todo es ok, reinicia el contador, y valida la seccion, se loguea
        RateLimiter::clear($this->throttleKey());
            // throttleKey :> aqui se estan guardabdi el emial y la ip del soliciantente
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    //metodo para verifica si sobrepaso con el limite de intennto de logueo
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return; //si no se cumplio se continua con la codigo
        }

        //caso contrario, se dispoara un  evento lockout
        event(new Lockout($this));

        //se obtiene en segundos, cuando volveremos a intentar a inciar seccion
        $seconds = RateLimiter::availableIn($this->throttleKey());

        //lanzamos u error de validacion
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [ //esta validacion esta en la carpeta lang/es/auth.php
               'seconds' => $seconds,
                //'minutes' => ceil($seconds / 60), //ceil = redondear un número hacia arriba al entero más cercano
            ]),
        ]);
        /*Cuando se ejecuta trans('auth.throttle', ['seconds' => $seconds,'minutes' => ceil($seconds / 60)]),
        la función trans() buscará la traducción correspondiente a 'auth.throttle' y
        reemplazará :seconds con el valor de $seconds y :minutes con el valor de ceil($seconds / 60).
        Luego, devolverá la cadena traducida completa que se utilizará como mensaje de error.
        */
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
