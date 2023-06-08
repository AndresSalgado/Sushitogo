<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detalle;

class DetalleController extends Controller
{

    public function inicio($id)
    {

        $detalle = detalle::where('pedido_id', $id)->with('pedido.usuario')->get();

        return view('cajero.detalle.index', compact('detalle'));
    }
}
