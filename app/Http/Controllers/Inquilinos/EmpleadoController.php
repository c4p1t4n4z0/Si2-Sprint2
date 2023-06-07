<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Empleado;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\DB;
//para enviar mensajes de error
use Illuminate\Validation\ValidationException;

class EmpleadoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = User::join('empleados as e','e.id_usuario','=','users.id')
        ->join('areas as a','a.id','=','e.id_area')
        ->orderBy('e.id_usuario')->paginate(7);

        return view('VistasTenancyInquilinos.Empleados.index',compact('empleados',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::get();
        return view('VistasTenancyInquilinos.Empleados.create',compact('areas',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r,)
    {
        $r->validate([
            'nombre' => ['required','string', 'max:255',],
            'apellido' => ['required','string', 'max:255'],
            'cedula' => ['required', 'numeric','unique:users,ci'],
            'telefono' => ['nullable', 'numeric'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
          'contrasena' => ['required', Rules\Password::defaults()],

        ]);

        try {
        DB::transaction(function () use ($r) {
        $usuario = new User();
        $usuario->name = $r->nombre;
        $usuario->apellido = $r->apellido;
        $usuario->ci = $r->cedula;
        $usuario->domicilio = $r->domicilio;
        $usuario->fecha_nac = $r->fecha_nac;
        $usuario->telefono = $r->telefono;
        $usuario->email = $r->correo;
        $usuario->password = bcrypt($r->contrasena);
            if ($r->hasFile('foto')) {
            $file = $r->file('foto');
            $destino = 'img/Empleados/';
            $fotos = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $r->file('foto')->move($destino, $fotos);
        } else {
           $fotos = "defecto.png"; //DEFAUDL
        }
        $usuario->foto = $fotos;
        $usuario->save();

        $emp = new Empleado();
        $emp->id_usuario = $usuario->id;
        $emp->id_area = $r->area ;
        $emp->save();
        });
            DB::commit();
        } catch (\Exception $e) {
            dd('hubo error ', $e);
            DB::rollBack();
            $c = User::where('email',$r->correo)->first();
            if($c){
                throw ValidationException::withMessages([
                    //meustra el eeroror del correo
                    'correo_mal' => 'Correo ya existe',
                ]);
            }
            return back();
        }

        return redirect()->route('empleados.index')->with('success','Empleado creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $empleado,)
    {

          $empleado = User::join('empleados as e','e.id_usuario','=','users.id')
            ->join('areas as a','a.id','=','e.id_area')
            ->select('users.*','e.id_area','a.nombre as area')
          ->where('users.id',$empleado->id)
          ->first();

          return view('VistasTenancyInquilinos.Empleados.show', compact('empleado'));
    }


    public function edit(User $empleado,)
    {
        // dd('ya llegue aqui ');
        $areas = Area::get();
        // dd($empleado);
        $empleado = User::join('empleados as e','e.id_usuario','=','users.id')
        ->where('users.id',$empleado->id)
        ->first();

        // dd($empleado);
        return view('VistasTenancyInquilinos.Empleados.edit', compact('empleado','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, User $empleado,)
    {

        $r->validate([
            'nombre' => ['required','string', 'max:255'],
            // 'apellido' => ['required','string', 'max:255'],
        'contrasena' => ['nullable', Rules\Password::defaults()],

        ]);

      //  empleado en ralidad es de al tabla user
        if($r->correo != $empleado->email){
            $r->validate([
                'correo' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            ]);
        }

        if($r->cedula != $empleado->ci){
            $r->validate([
                'cedula' => ['required', 'numeric','unique:users,ci'],
            ]);
        }



        try {
        DB::transaction(function () use ($r,$empleado) {
        $usuario = $empleado;
        $usuario->name = $r->nombre;
        $usuario->apellido = $r->apellido;
        $usuario->ci = $r->cedula;
        $usuario->domicilio = $r->domicilio;
        $usuario->fecha_nac = $r->fecha_nac;
        $usuario->telefono = $r->telefono;
        $usuario->email = $r->correo;
        $usuario->password = bcrypt($r->contrasena);
            if ($r->hasFile('foto')) {
            $file = $r->file('foto');
            $destino = 'img/Empleados/';
            $fotos = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $r->file('foto')->move($destino, $fotos);
        } else {
           $fotos = "defecto.png"; //DEFAUDL
        }
        $usuario->foto = $fotos;
        $usuario->save();

        $emp = Empleado::where('id_usuario',$usuario->id)->first();
        $emp->id_usuario = $usuario->id;
        $emp->id_area = $r->area ;
        $emp->save();
        });
            DB::commit();
        } catch (\Exception $e) {
            dd('hubo error ', $e);
            DB::rollBack();
            $c = User::where('email',$r->correo)->first();
            if($c){
                throw ValidationException::withMessages([
                    //meustra el eeroror del correo
                    'correo_mal' => 'Correo ya existe',
                ]);
            }
            return back();
        }

        return redirect()->route('empleados.index')->with('success','Empleado '.$empleado->name.' '.$empleado->apellido.' actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $empleado,)
    {
        $user = $empleado;
        $empleado = Empleado::where('id_usuario',$user->id)->first();
        $empleado ->delete();
        $user->delete();

        return redirect()->route('empleados.index');
    }
}
