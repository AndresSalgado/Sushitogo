<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $fillable = ['NombreMunicipio'];

    public function usuario()
    {
        return $this->hasMany("App\Models\User");
    }

    public function restaurante()
    {
        return $this->hasMany("App\Models\restaurante");
    }

    public function pedido()
    {
        return $this->hasMany("App\Models\pedido");
    }
}
