<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    // use HasFactory;

    protected $fillable = ['codigo','subtotal','costoEnvio','total','estado_1','estado_2','user_id'];
    
    public function usuario()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function detalle()
    {
        return $this->hasMany("App\Models\detalle");
    }
}
