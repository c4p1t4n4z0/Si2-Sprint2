<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
//para enviar mensajes de error
use Illuminate\Validation\ValidationException;

class ClienteController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::join('clientes as e','e.id_usuario','=','users.id')
        ->orderBy('e.id_usuario')->paginate(7);
        return view('VistasTenancyInquilinos.Clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistasTenancyInquilinos.Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r);
        $r->validate([
            'nombre' => ['required','string', 'max:255'],
            'cedula' => ['required', 'numeric','unique:users,ci'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
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
            // $usuario->password = bcrypt($r->contrasena);
            $usuario->password = bcrypt(12345678);
                if ($r->hasFile('foto')) {
                $file = $r->file('foto');
                $destino = 'img/Clientes/';
                $fotos = time() . '-' . $file->getClientOriginalName();
                $subirImagen = $r->file('foto')->move($destino, $fotos);
            } else {
               $fotos = "img/Clientes/defecto.jpg"; //DEFAUDL
            }
            $usuario->foto = $fotos;
            $usuario->save();

            $emp = new Cliente();
            $emp->id_usuario = $usuario->id;
            if($r->ingresos)
            $emp->ingresos = $r->ingresos;
            $emp->tipo_ingresos = $r->tipo_ingresos;
            if($r->empresa)
            $emp->empresa = $r->empresa;
            $emp->tipo_empresa = $r->tipo_empresa;
            $emp->save();
            });

            DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                //retorna una vista indicando hubo algun error
                dd($e->getMessage());
                // Log::error($e->getMessage()); // se registra la excepción en el log
                //identificar el error
                $c = User::where('email',$r->correo)->first();
                if($c){
                    throw ValidationException::withMessages([
                        //meustra el eeroror del correo
                        'correo_mal' => 'Correo ya existe',
                    ]);
                }
                return back();
            }
        return redirect()->route('clientes.index')->with('success ', 'Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $cliente)
    {
     // dd('llegfamos');
        return view('VistasTenancyInquilinos.Clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $cliente)
    {
        // dd('estamos en editar cliente');
    // dd('ya llegue aqui ');

    // dd($empleado);
    // $cliente = User::join('empleados as e','e.id_usuario','=','users.id')
    // ->where('users.id',$cliente->id)
    // ->first();
    // dd($empleado);
    return view('VistasTenancyInquilinos.Clientes.edit', compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, User $cliente)
    {
        // dd($r);
       try {
           DB::transaction(function () use ($r,$cliente) {
        //    $usuario = User::where('id',$empleado);
        //    dd($empleado);
            $cliente->name = $r->nombre;
            $cliente->ap_paterno = $r->paterno;
            $cliente->ap_materno = $r->materno;
            $cliente->ci = $r->cedula;
            $cliente->domicilio = $r->domicilio;
            $cliente->fecha_nac = $r->fecha_nac;
            $cliente->telefono = $r->telefono;

            if( $cliente->email == $r->correo){
                // dd('si son iguales ');
            }else {
                // dd('no son iguales ');
                $cliente->email = $r->correo;
            }
            $cliente->password = bcrypt($r->contrasena);
                if ($r->hasFile('foto')) {
                $file = $r->file('foto');
                $destino = 'img/Clientes/';
                $fotos = time() . '-' . $file->getClientOriginalName();
                $subirImagen = $r->file('foto')->move($destino, $fotos);
            } else {
               $fotos = "defecto.jpg"; //DEFAUDL
            }
            $cliente->foto = $fotos;
            $cliente->save();


            });
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // dd($e);
                $c = User::where('email',$r->correo)->first();
                if($c){
                    throw ValidationException::withMessages([
                        //meustra el eeroror del correo
                        'correo_mal' => 'Correo ya existe',
                    ]);
                }
                return back();
            }


            return redirect()->route('clientes.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $cliente)
    {
        $user =  $cliente;
         $cliente = Cliente::where('id_usuario',$user->id)->first();
         $cliente ->delete();
        $user->delete();

        return redirect()->route('clientes.index');
    }
}
