<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Tenant;
use Livewire\Component;

class LoginCorreos extends Component
{
    public $correo = '';
    public $seleccionado = 'nulo';

    public function seleccionar($id){
        $this->seleccionado = $id;
    }

    public function render()
    {
        //buscar correo en la base de datos
        $empresas = [];
        $user = User::where('email',$this->correo)->first();
        if($user != null){
            if($this->seleccionado  == 'nulo')
                $this->seleccionado = 'Central';
            $user->empresa = 'Central';
            $empresas[] = $user;
        }

        //buscar en todas las empresas
         // dd('hola');
        // //sacando la id de un inquiloino, la primera id
        $tenants = Tenant::get();
        // dd($tenant);
        foreach ($tenants as $t) {
            // dd()



            tenancy()->initialize($t);
            $user = User::where('email',$this->correo)->first();
            if($user != null){
                if($this->seleccionado  == 'nulo')
                    $this->seleccionado = $t->id;
                $user->empresa = $t->id;
                $empresas[] = $user;
            }
            tenancy()->end();
        }

        if($empresas == null)
            $this->seleccionado = 'nulo';
        // dd($this->seleccionado  == 'nulo');

        return view('livewire.login-correos',compact('empresas'));
    }
}
