<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\DetalleRequisito;
use App\Models\Requisito;
use App\Models\TipoCredito;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        $tipos = TipoCredito::all();
        return view('VistasTenancyInquilinos.TiposCredito.index',compact('tipos'));
    }

    public function create()
    {
        $requisitos = Requisito::all();
        return view('VistasTenancyInquilinos.TiposCredito.create',compact('requisitos'));
    }

    public function store(Request $request )
    {
        // dd($request);
        $request->validate([
            'nombre' => ['required','string', 'max:255'],
            'descripcion' => ['string','max:500'],
            'interes' => ['required', 'numeric'],
            'monto_maximo' => ['required', 'numeric'],
            'monto_minimo' => ['required', 'numeric'],
        ]);
        $tipo = TipoCredito::create($request->except('requisitos'));

        //ahora crear la tabla intermedia
        foreach ($request->requisitos as $rr) {
            // dd( $tipo->id,$rr);
            DetalleRequisito::create([
                'id_tipo_credito' => $tipo->id,
                'id_requisito' => $rr
            ]);
        }

        return redirect()->route('creditos.index')
            ->with('success', 'Tipo de credito creado exitosamente.');
    }


    public function show($id)
    {
        //
    }

    //edit
    public function edit(Request $request, TipoCredito $tipo)
    {
        dd('edir');
    }

    public function destroy(TipoCredito $tipo)
    {
        dd('eliminar');
    }
}
