<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;
use App\Notifications\PedidoCanceladoNotification;
use App\Notifications\PedidoTerminadoNotification;
use Illuminate\Support\Facades\Session;

class PedidoController extends Controller
{

    public function proceso(Request $request)
    {
        $search = $request->get('search');

        $pedido = pedido::select('pedidos.*')
            ->join('users', 'users.id', '=', 'pedidos.user_id')
            ->where('pedidos.id', 'like', '%' . $search . '%')
            ->orWhere('pedidos.codigo', 'like', '%' . $search . '%')
            ->orWhere('pedidos.created_at', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_1', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_2', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->paginate(7);

        return view('cajero.pedido.proceso', compact('pedido'));
    }

    public function terminado(Request $request)
    {
        $search = $request->get('search');

        $pedido = pedido::select('pedidos.*')
            ->join('users', 'users.id', '=', 'pedidos.user_id')
            ->where('pedidos.id', 'like', '%' . $search . '%')
            ->orWhere('pedidos.codigo', 'like', '%' . $search . '%')
            ->orWhere('pedidos.created_at', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_1', 'like', '%' . $search . '%')
            ->orWhere('pedidos.estado_2', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->paginate(7);

        return view('cajero.pedido.terminado', compact('pedido'));
    }

    public function show($id)
    {
        return redirect()->route('detalle.inicio', ['id' => $id]);
    }


    public function estado_1($id)
    {
        $pedido = pedido::whereId($id)->first();

        return view('cajero.pedido.estado_1', compact('pedido'));
    }

    public function estado_2($id)
    {
        $pedido = pedido::whereId($id)->first();

        return view('cajero.pedido.estado_2', compact('pedido'));
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return redirect('pedido/index')->with('Eliminado', 'No se encontró el pedido.');
        }

        $usuario = $pedido->usuario;

        $pedido->delete();

        $usuario->notify(new PedidoCanceladoNotification($pedido));

        return redirect('pedido/index')->with('Eliminado', 'El pedido se canceló, se envió un mensaje al correo del cliente y fue eliminado con éxito!!');
    }

    public function update(Request $request)
    {
        $pedido = pedido::findOrFail($request->id);

        $estado_aceptar = $request->has('estado_aceptar') ? $request->estado_aceptar : 0;
        $estado_proceso = $request->has('estado_proceso') ? $request->estado_proceso : 0;
        $estado_1_actual = $pedido->estado_1;

        if ($estado_aceptar != $pedido->estado_1) {
            $pedido->estado_1 = $estado_aceptar;
        }

        if ($estado_proceso != $pedido->estado_2) {
            $pedido->estado_2 = $estado_proceso;
            $pedido->estado_1 = $estado_1_actual;
        }

        $pedido->save();

        if ($estado_proceso == 1) {
            $usuario = $pedido->usuario;
            $usuario->notify(new PedidoTerminadoNotification($pedido));

            Session::flash('pedido_terminado', 'El pedido fue terminado, se ha enviado un mensaje al correo del cliente.');
        }

        return redirect()->route('pedido.index');
    }

    public function step()
    {
        $pedidos = auth()->user()->pedido;

        return view('client.step', compact('pedidos'));
    }

    //Metodo para reiniciar las estadisticas de las ventas al mes
    public function reiniciarEstadisticas()
    {

        return redirect()->back()->with('success', 'Las estadísticas se han reiniciado correctamente.');
    }
}
