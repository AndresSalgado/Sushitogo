<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = ['codigo', 'total', 'estado_1', 'estado_2', 'user_id'];

    protected $dates = ['deleted_at'];

    public function usuario()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function detalle()
    {
        return $this->hasMany("App\Models\detalle");
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
