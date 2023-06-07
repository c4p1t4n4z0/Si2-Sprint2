<?php

namespace App\Models;

//para la verificaion de correos
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//spati
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable  //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //para dar primary key
    public function empleado(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(Empleado::class);
    }

    public function cliente(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(Cliente::class);
    }
}
