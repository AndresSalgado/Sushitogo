<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function ventas()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $pedidos = Pedido::where('estado_2', '1')
            ->whereBetween('updated_at', [$inicioMes, $finMes])
            ->get();

        $estadisticas = $pedidos->groupBy(function ($pedido) {
            return $pedido->updated_at->format('Y-m-d');
        })->sortBy(function ($pedidosPorDia, $fecha) {
            return Carbon::parse($fecha);
        })->map(function ($pedidosPorDia) {
            return [
                'cantidadPedidos' => $pedidosPorDia->count(),
                'totalVentas' => $pedidosPorDia->sum('total'),
            ];
        });

        $totalVentasMes = $pedidos->sum('total');
        $totalPedidosMes = $pedidos->count();

        return view('admin.venta.venta', compact('estadisticas', 'totalVentasMes', 'totalPedidosMes'));
    }
}
