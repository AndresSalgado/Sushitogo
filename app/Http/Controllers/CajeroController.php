<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;

class CajeroController extends Controller
{
    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $pedido = pedido::select('pedidos.*')
            ->join('users', 'users.id', '=', 'pedidos.user_id')
            ->where('pedidos.id', 'like', '%' . $search . '%')
            ->orWhere('pedidos.codigo', 'like', '%' . $search . '%')
            ->orWhere('pedidos.created_at', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_1', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_2', 'like', '%' . $search . '%')
            ->orderBy('updated_at', 'desc')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('cajero.pedido.index', compact('pedido'));
    }
}
