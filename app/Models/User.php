<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
class User extends Authenticatable implements CanResetPassword
{

    use Notifiable, CanResetPasswordTrait;
    
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'telefono',
        'direccion',
        'email',
        'password',
        'municipio_id',
        'role_id'
    ];

    public function municipio()
    {
        return $this->belongsTo("App\Models\municipio", "municipio_id");
    }

    public function pedido()
    {
        return $this->hasMany("App\Models\pedido");
    }

    public function role()
    {
        return $this->belongsTo("App\Models\Role", "role_id");
    }

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
    ];

    public function setPasswordAttribute($password)
    {

        $this->attributes['password'] = bcrypt($password);
    }
}
