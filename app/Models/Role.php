<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $fillable = ['NombreRole'];

    public function usuario()
    {
        return $this->hasMany("App\Models\User");
    }

}
