<?php

namespace App\Http\Controllers;

use App\Models\Beneficio;
use App\Models\DetalleBeneficio;
use App\Models\Empresa;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function welcome(){
        //enviar planes y sus beneficiso a la vista
        $planes = Plan::all();
        foreach ($planes as $plan) {
            $plan->beneficios = DetalleBeneficio::where('id_plan',$plan->id)
                            ->join('beneficios as b', 'b.id', '=', 'detalle_beneficios.id_beneficio')
                            ->get();
        }

        return view('welcome',compact('planes'));
    }


    public function index()
    {
        $tenant = Tenant::join('empresas as e', 'e.id_tenant', '=', 'tenants.id')
        ->join('plans as p', 'p.id', '=', 'e.id_plan')
        ->select('tenants.*','e.nombre','p.nombre as nombre_plan')
        ->get();

        return view('VistasTenant.index', [
            'tenants' => $tenant,
        ]);
    }


    public function registro(){
        $planes = Plan::all();
        return view('VistasTenant.registro',compact('planes'));

    }

    public function create()
    {
        $planes = Plan::all();
        return view('VistasTenant.create',compact('planes'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'id' => 'required',
                'nombre' => 'required',
                'id_plan' => 'required',
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]
        );


        //esta creanfo un inquilino, //falta aniadrile nomreb
        $tenant = Tenant::create($request->only('id'));

        //dandole dominio al inquilino
        $tenant->domains()->create([
            // 'domain' => $request->get('id').'.'.'cristiancuellar.tech',
            'domain' => str_replace('http://',$request->get('id').'.',env('APP_URL')),
        ]);

        // cerar la empresadomain

        // $empresa = Empresa::create($request->only('nombre','id_plan'));
        $empresa = new Empresa();
        $empresa->nombre = $request->get('nombre');
        $empresa->id_plan = $request->get('id_plan');
        $empresa->id_tenant = $tenant->id;
        $empresa->save();

        // return redirect(url($request->get('id') . '/hola'));
        //redirigir a al listado de todos los tenants

        //crear usuario
       //creacion de usuario
       //acceder a la base de datos
    tenancy()->initialize($tenant);
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), //encripta la contra
        ]);
        // return redirect()->route('tenant.index')
        //     ->with('success', 'Inquilino creado exitosamente.');
        //iniciar session
        tenancy()->end();
        // dd($tenant->domains->first()->domain.'/dashboard');

        // return redirect()->route('dashboard', ['tenant' => $tenant->id]);

    //   return redirect($tenant->domains->first()->domain.'/dashboard');
        return redirect('http://'.$tenant->domains->first()->domain.':8000/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        return view('VistasTenant.show', [
            'tenant' => $tenant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {

        return view('VistasTenant.edit', [
            'tenant' => $tenant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate(
            [
                'id' => 'required|unique:tenants,id,'.$tenant->id,
              ]
        );

        //esta creanfo un inquilino
        $tenant->update([
            'id' => $request->get('id'),
        ]);

        //dandole dominio al inquilino
        $tenant->domains()->update([
            // 'domain' => $request->get('id').'.'.env('APP_URL'),
            'domain' => $request->get('id').'.'.'localhost',
        ]);

        //redirigir a al listado de todos los tenants
        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenant.index');
    }
}
