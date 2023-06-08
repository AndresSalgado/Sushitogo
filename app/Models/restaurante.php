<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurante extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'telefono', 'direccion', 'imagen', 'municipio_id'];

    public function municipio()
    {
        return $this->belongsTo("App\Models\municipio", "municipio_id");
    }
}
