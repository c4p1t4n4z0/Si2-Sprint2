<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use App\Models\Cliente;
use App\Models\User;
use Livewire\Component;

class BuscarCliente extends Component
{
    public $buscar = '';
    public $caja_nombre = '';
    public $estado = true;
    public $tenant = null;
    //contructr
    public function mount(Tenant $tenant)
    {
        // dd('llegue al consturctor',$tenant);
        $this->tenant = $tenant;
    }

    public function buscar()
    {
        $this->estado = true;
    }

    public function rellenar_ci( $nom)
    {
        // dd('llegamos');
        $this->caja_nombre = $nom;
        $this->estado = false;
    }


    public function render()
    {
           // Obtén el inquilino actual
        //    $tenant = tenancy()->tenant;

            tenancy()->initialize($this->tenant); //entrarndo a la base de dato
        //hacer la busqueda
        if(strlen($this->buscar)>1 && $this->estado){
            $clientes = User::join('clientes as c','c.id_usuario','=','users.id')
            ->where('users.ci','like','%'.$this->buscar.'%')
            ->take(5)->get();
        }else{
            $clientes = [];
        }
         tenancy()->end();


        return view('livewire.buscar-cliente',compact('clientes'));
    }
}
