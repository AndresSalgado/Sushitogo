<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'imagen',
        'estado',
        'carta_id'
    ];


    public function carta()
    {
        return $this->belongsTo("App\Models\carta", "carta_id");
    }

    public function detalle()
    {
        return $this->hasMany("App\Models\detalle");
    }
}
