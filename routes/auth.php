<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

//esto es un grupo de ruta, en la que tenran middleware guest, usuarios no legueados
Route::middleware('guest')->group(function () {
    //registro de usuario
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    //login, inicio de seccion
    Route::get('login', [AuthenticatedSessionController::class, 'createxd'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'storexd']);

    //para obtener el link del reseteo de contrasena
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    //para resetear la contrasenia
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
}); //end de middleware guest


//grupo de rutas con el middleware auth, los que ya estan logueados
Route::middleware('auth')->group(function () {
    //para verificar el emial
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    //para confirmar contrasena
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    //para cerrar seccion
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
