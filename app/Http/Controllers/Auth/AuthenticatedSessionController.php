<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//para las session
use Illuminate\Support\Facades\Session;
use Stancl\Tenancy\Contracts\Domain;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function createxd(): View
    {
        // dd('estoy en el login');
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function storexd(LoginRequest $request): RedirectResponse
    {
        // dd($request);
        //metodo para validar el inicio de seccion
        $request->authenticate();

        //este es mi metod
        // verificar a que bae pertenece
    //     $tenant  = Tenant::where('id',$request->seleccionado)->first();

    //   if(!($request->seleccionado == 'Central' || $request->seleccionado == 'nulo')){
    //     // dd('es diferentes');
    //     tenancy()->initialize($tenant);
    //   }

        if (! Auth::attempt(['email' => $request->email, 'password' => $request->password],  $request->boolean('remember'))) {
            //si la credenciales no son validad se incrimenta el conteo de peticiones

             //verificar si es el correo el que esta mal
             // dd(User::where('email',$this->only('email'))->first());
             if(User::where('email',$request->email)->first())
                //esta bien el correo, true
                throw ValidationException::withMessages([
                 'password' => trans('auth.password'),
             ]);

             //false, entonces el correo esta mal
             throw ValidationException::withMessages([
                 'email' => trans('auth.email'),
             ]);
         }


        //se regenerara la seccion
        $request->session()->regenerate();

        //->intended // se redireccion a la ruta que intento iniciar
        //caso contrario se redireccionara a la ruta dashboard
        // if($request->seleccionado == 'Central')
            return redirect()->intended(route('dashboard'));

//         $results = DB::table('domains')->where('tenant_id', $tenant->id)->first();
//   dd($results);
        // return redirect()->intended(url('http://free.localhost:8000/dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    //metodo que se utiliza para cerra la session
    public function destroy(Request $request): RedirectResponse
    {
        // dd($request);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //a donde se direccionara
        return redirect('/login')->with('status','Cierre de sesion exitosamente');
    }

    public function loguin_naze($user){
        dd('llegue');
    }
}
