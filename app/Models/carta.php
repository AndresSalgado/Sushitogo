<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carta extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'estado'];

    public function producto()
    {
        return $this->hasMany("App\Models\producto");
    }
}
