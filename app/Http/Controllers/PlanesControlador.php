<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Beneficio;
use Illuminate\Http\Request;
use App\Models\DetalleBeneficio;

class PlanesControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $planes = Plan::join('detalle_benefios as d','d.id_plan','=','plans.id')
        // ->get();

        // foreach ($planes as $plan) {
        //     $plan->beneficios = Beneficio::where('id_detalle_beneficio',$plan->id_detalle_beneficio)->get();
        // }


        $planes = Plan::get();
        // $beneficio = DetalleBenefio::join('beneficios as b','b.id','=','detalle_beneficios.id_beneficio')
        //     ->select('detalle_beneficios.*')
        // ->get();
        foreach ($planes as $plan) {
            $plan->beneficios = DetalleBeneficio::join('beneficios as b','b.id','=','detalle_beneficios.id_beneficio')
            ->where('detalle_beneficios.id_plan',$plan->id)->get();
        }
        // dd($planes);

        return view('VistasPlanes.index',compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistasPlanes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo_plan' => 'required',
            'precio' => 'required|numeric',
            // 'estado' => 'required',
            'caracteristicas' => 'required',
        ]);

       $plan = Plan::create($request->except(['_token','caracteristicas']));
    // $plan = new Plan();
    // $plan->nombre = $request->nombre;
    // $plan->descripcion = $request->descripcion;
    // $plan->tipo_plan = $request->tipo_plan;
    // $plan->precio = $request->precio;
    // $plan->save();

        foreach ($request->caracteristicas as $caracteristica) {

            $beneficio = Beneficio::create([
                'descripcion' => $caracteristica,
            ]);

            $detalle = new DetalleBeneficio();
            $detalle->id_plan = $plan->id;
            $detalle->id_beneficio = $beneficio->id;
            $detalle->save();
        }


        return redirect()->route('planes.index')
            ->with('success', 'Plan creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //retornar la vista show
        return view('VistasPlanes.show',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        return view('VistasPlanes.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        // dd($request);
        $request->validate([
            'nombre' => 'required',
            'tipo_plan' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'caracteristicas' => 'required',
        ]);

        $plan->update($request->all());

        return redirect()->route('VistasPlanes.index')
            ->with('success', 'Plan actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('VistasPlanes.index')
            ->with('success', 'Plan eliminado exitosamente.');
    }
}
