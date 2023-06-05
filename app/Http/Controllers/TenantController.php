<?php

namespace App\Http\Controllers;

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
        $planes = Plan::all();
        return view('welcome',compact('planes'));
    }
    public function index()
    {
        // $planes = Plan::all();
        // dd(Tenant::all());

        // $tenant = Empresa::join('tenants as t', 't.id', '=', 'empresas.id_tenant')
        //         ->join('plans as p', 'p.id', '=', 'empresas.id_plan')
        //         ->select('t.*','empresas.nombre','p.nombre as nombre_plan')
        //         ->get();
        // dd($tenant);

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // deberia estar en un tricash
        //validar la id
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

        // $t->save();
            //   dd($tenant);

        //dandole dominio al inquilino
        $tenant->domains()->create([
            'domain' => $request->get('id').'.'.'cristiancuellar.tech',
            // 'domain' => $request->get('id').'.'.'localhost',
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
    //    return redirect('http://'.$tenant->domains->first()->domain.':8000'.'/loguin/naze/'.$user->id);
      // return redirect('http://'.$tenant->domains->first()->domain.':8000'.'/dashboard');
       return redirect('http://'.$tenant->domains->first()->domain.'/dashboard');

       // //->with('success', 'Inquilino creado exitosamente.');
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
