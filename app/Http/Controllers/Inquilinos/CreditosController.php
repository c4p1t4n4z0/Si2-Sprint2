<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\ProcesoCrediticio;
use App\Models\TipoCredito;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tenant;

use Stancl\Tenancy\Facades\Tenancy;

class CreditosController extends Controller
{
    public function hola(){
        dd('hola');
    }


    public function index()
    {
        $procesos = ProcesoCrediticio::all();
        $tipos = TipoCredito::all();
            return view('VistasTenancyInquilinos.Creditos.index',compact('procesos','tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cliente $cliente)
    {
        // dd($cliente);
        $cliente = User::join('clientes as c','c.id_usuario','=','users.id')
        ->where('c.id',$cliente->id)->first();
        $tipos = TipoCredito::all();
        return view('VistasTenancyInquilinos.Creditos.create',compact('tipos','cliente'));
    }

    public function create2()
    {
        //con este create se buscara el cliente
        $tipos = TipoCredito::all();
        return view('VistasTenancyInquilinos.Creditos.create2',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'id_cliente' => 'required',
            'tipo' => 'required',
            'monto' => 'required',
            'observacion' => 'required',
        ]);


//cerificar si el cliente existe
      //  $cliente = Cliente::find($request->get('id_cliente'));
        // if($cliente == null){
        //     //creae new cliente
        //     $cliente = new Cliente();

        // }
        //de mometno usaremos un cliente ya existente

// dd(auth()->user()->id);
        $credito = new ProcesoCrediticio();
        $credito->id_cliente = $request->get('id_cliente');
        $credito->id_empleado = auth()->user()->id;
        $credito->id_tipo_credito = $request->get('tipo');
        $credito->monto = $request->monto;
        // $credito->estado =
        $credito->fecha_solicitud = now();
        // $credito->fecha_aprobacion =
        $credito->observacion = $request->observacion;
        $credito->save();

        return redirect()->route('creditos.index')
            ->with('success', 'Credito creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
