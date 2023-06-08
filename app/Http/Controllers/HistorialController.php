<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        $pedido = pedido::all();
        return view('client.historial', compact('pedido'));
    }
}
