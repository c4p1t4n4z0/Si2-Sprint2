<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PlanesControlador;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Models\Empresa;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;


Route::get('/prueba', function () {

    // dd('hola');
    $empresa =Empresa::first();

    return $empresa->plan->nombre;
    // return view('index2');
})->name('prueba');

//lo comentado es para cambiar de base de datos
// Route::get('/', function () {
    // dd('hola desde la web');
    ////sacando la id de un inquiloino, la primera id
    // $tenant = Tenant::first();
    // dd($tenant);
    // //cambiando de base de datos a donde esta el inquilino $tenant
    // tenancy()->initialize($tenant);

    // //sacando un usuario de la base de datos del inquilino
    // $user = App\Models\User::first();
    // // dd($user);

    // //ya deje de conectarme a la base de datos del inquilino, y se queda con la base central
    // tenancy()->end();
    // return view('welcome2');
    // return redirect()->route('dashboard');
// })->name('home');




Route::get('/dashboard', function () {
    // dd('sin logueo');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//rutas solo para los que esten logueados
Route::middleware('auth')->group(function () {
    //rutas para el perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //crud de inquilinos o empresas
    Route::resource('tenant', TenantController::class);
    Route::resource('planes', PlanesControlador::class);
});


//rutas para los que no estan logueados
Route::middleware('guest')->group(function () {
    Route::get('/',[ TenantController::class,'welcome'])->name('welcome');

    //registro del inquilino sin estar logueado, esta vista incluye crear un usuario
    Route::get('/registro/empresa',[ TenantController::class,'registro'])->name('empresa.create');
    Route::post('/registro/empresa',[ TenantController::class,'store'])->name('empresa.store');
    // Route::post('/registro/empresa',[ TenantController::class,'registro'])->name('login');
});

//importa el archivo auth.php
//__DIR__  = a la direccion donde estoy
require __DIR__.'/auth.php';
