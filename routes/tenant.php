<?php

declare(strict_types=1);

use App\Http\Controllers\Inquilinos\CreditosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;




Route::middleware([
    'web',  //proteger al formularios con los tokers crsf
    InitializeTenancyByDomain::class,  //cambiar el uso de la base de datos
    PreventAccessFromCentralDomains::class, //
])->group(function () {

    //grupo de rutas con el prefijo
    // Route::prefix('/{tenant}')->group(function () {
        Route::get('/', function () {

            // dd('hola desde tenant ');
              //como entrar a la base de datos central desde un inquilino
            //    $user = tenancy()->central(function(){
            //        return App\Models\User::first();
            //     }); //saliendo de la fucniones se cambia a la base de datos del inquilino
            //     // dd($user);
            //     dd(App\Models\User::first());

            return redirect()->route('dashboard');
    //         return 'Hola, estan usanod la base de datos de ' . tenant('id'). ' bienvendio !!';
        });
    // });

    // grupo de rutas para el inquilino logeuados
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            // dd('hola xd  es es dashboars');
            return view('VistasTenancyInquilinos.dashboard');
        })->name('dashboard');

        Route::resource('tarea', App\Http\Controllers\Inquilinos\TareaController::class)->names('tarea');
        Route::resource('empleados', App\Http\Controllers\Inquilinos\EmpleadoController::class)->names('empleados');
        Route::resource('clientes', App\Http\Controllers\Inquilinos\ClienteController::class)->names('clientes');
        Route::resource('areas', App\Http\Controllers\Inquilinos\AreaController::class)->names('areas');
        Route::get('roles', function(){
            return view('VistasTenancyInquilinos.Roles.index');
        })->name('roles.index');
        Route::get('roles/create', function(){
            return view('VistasTenancyInquilinos.Roles.create');
        })->name('roles.create');
        // Route::resource('tipos', TipoControlle::class)->names('tipos');
        Route::resource('tipos', App\Http\Controllers\Inquilinos\TiposController::class)->names('tipos');
        Route::get('creditos/create2', [App\Http\Controllers\Inquilinos\CreditosController::class,'create2'])->name('creditos.create2');
        Route::resource('creditos', App\Http\Controllers\Inquilinos\CreditosController::class)->except('create')->names('creditos');
        Route::get('creditos/create/{cliente}', [App\Http\Controllers\Inquilinos\CreditosController::class,'create'])->name('creditos.create');
        Route::get('creditos/documento/{credito}', [App\Http\Controllers\Inquilinos\CreditosController::class,'create_documento'])->name('creditos.create.documento');
        Route::post('creditos/documento/{credito}', [App\Http\Controllers\Inquilinos\CreditosController::class,'store_documento'])->name('creditos.store.documento');


    });



    Route::get('login/naze/{user}', [App\Http\Controllers\Auth\AuthenticatedSessionController::class,'loguin_naze'])->name('login.naze');


    //para el acceso de las imagenes
    Route::get('/file/{path}',function($path){
        //ruta donde se encuentra la imagen
        $ruta = Storage::path($path);
        //retorna en fomato archivo imagen
        return response()->file($ruta);
    })->where('path','.*')->name('file');

    //trae las rutsa de auth
    require __DIR__.'/auth.php';

});
