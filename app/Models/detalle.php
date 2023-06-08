<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'producto_id', 'pedido_id'];

    public function pedido()
    {
        return $this->belongsTo("App\Models\pedido", "pedido_id");
    }

    public function producto()
    {
        return $this->belongsTo("App\Models\producto", "producto_id");
    }
}
