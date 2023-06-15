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

    public function ventas(Request $request)
    {
        $mes = $request->input('mes');
        $anio = $request->input('anio');

        if (empty($mes) || empty($anio)) {
            // Manejar el error de valores faltantes
            // por ejemplo, redirigir o mostrar un mensaje de error
        }

        $inicioMes = Carbon::create($anio, $mes)->startOfMonth();
        $finMes = Carbon::create($anio, $mes)->endOfMonth();

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
