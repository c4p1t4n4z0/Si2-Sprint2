<?php

namespace App\Http\Controllers\Inquilinos;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use DragonCode\Contracts\Routing\Core\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('VistasTenancyInquilinos.tareas.index',[
            'tareas' => Tarea::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistasTenancyInquilinos.tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
        ]);
        // dd($data['imagen']);

        //subri imagenn es tal ubicaion, y devolvera la ruta de la imagenn
        $data['imagen'] = Storage::put('tareas', $request->file('imagen'));
        Tarea::create($data);

        return redirect()->route('tarea.index');
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
    public function edit(Tarea $tarea)
    {
        return view('VistasTenancyInquilinos.tareas.edit',[
            'tarea' => $tarea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
           // dd($request);
           $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable|image',
        ]);
        //verificar si se a subido una imagen
        if($request->hasFile('imagen')){
            //eliminar la imagen anterior
            Storage::delete($tarea->imagen);

            //guardar la nueva imagen
            $data['imagen'] = Storage::put('tareas', $request->file('imagen'));
        }

        $tarea->update($data);
        return redirect()->route('tarea.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //eliminar la imagen
        Storage::delete($tarea->imagen);
        $tarea->delete();

        return redirect()->route('tarea.index');
    }
}
