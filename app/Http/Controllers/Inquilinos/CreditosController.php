<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\DetalleRequisito;
use App\Models\Empleado;
use App\Models\ProcesoCrediticio;
use App\Models\Requisito;
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

    public function create_documento( ProcesoCrediticio $credito){


        $requisitos = DetalleRequisito::where('id_tipo_credito',$credito->id_tipo_credito)
                        ->join('requisitos as r','r.id','=','detalle_requisitos.id_requisito')
                        ->get();

        return view('VistasTenancyInquilinos.Documentos.requisitos_documento',compact('credito','requisitos'));
    }

    public function store_documento(){

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_cliente' => 'required',
            'tipo' => 'required',
            'monto' => 'required',
            'plazo' => 'required',
        ]);
        $user = auth()->user()->id;
        $empleado = Empleado::where('id_usuario',$user)->first();
//el cliente ya debe estar registrado en el sitema
        $credito = new ProcesoCrediticio();
        $credito->id_cliente = $request->get('id_cliente');
        $credito->id_empleado = $empleado->id;
        $credito->id_tipo_credito = $request->get('tipo');
        $credito->monto = $request->monto;
        $credito->plazo = $request->plazo;
        // $credito->estado =
        $credito->fecha_solicitud = now();
        // $credito->fecha_aprobacion =
        $credito->observacion = $request->observacion;
        $credito->save();

        return redirect()->route('creditos.create.documento',$credito->id)
            ->with('success', 'Inserte los documentos requeridos!');

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
