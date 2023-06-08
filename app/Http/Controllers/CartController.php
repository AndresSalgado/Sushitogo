<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\producto;
use App\Models\pedido;
use App\Models\detalle;
use App\Models\municipio;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function store(Request $request)
    {

        $producto = Producto::find($request->producto_id);

        $cantidadActual = Cart::getContent()->where('id', $producto->id)->sum('quantity');

        if ($cantidadActual + $request->quantity > 10) {
            return redirect()->back()->with('error', 'No se pueden agregar más de 10 unidades del producto.');
        }

        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'quantity' => $request->quantity,
            'attributes' => [
                'imagen' => $producto->imagen,
            ],
        ]);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function checkout()
    {

        $municipio = municipio::all();
        $update = auth()->user();
        return view('client.checkout', compact('update', 'municipio'));
    }

    public function remove(Request $request)
    {
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', 'Producto Eliminado del Carrito');
    }

    public function update(Request $request)
    {

        Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return back();
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', 'Carrito Actualizado con Exito');
    }

    public function procesopedido(Request $request)
    {

        $subtotal = Cart::getSubTotal();
        if ($subtotal > 1000000) {
            return back()->with('error', 'Lo sentimos, su pedido supera el límite de $1,000,000.');
        }

        if (Cart::getContent()->count() > 0) :
            //procesamiento
            $precioEnvio = Auth::user()->municipio->PrecioEnvio;

            $pedido = new pedido();
            $pedido->codigo = 'COD: ' . uniqid();
            $pedido->subtotal = Cart::getSubTotal();
            $pedido->costoEnvio = $precioEnvio;
            $pedido->total = Cart::getSubTotal() + $precioEnvio;
            $pedido->estado_1 = 0;
            $pedido->estado_2 = 0;
            $pedido->user_id = Auth::user()->id;
            $pedido->save();

            foreach (Cart::getContent() as $r) :
                $detalle = new detalle();
                $detalle->cantidad = $r->quantity;
                $detalle->producto_id = $r->id;
                $detalle->pedido_id = $pedido->id;

                $detalle->save();
            endforeach;

            Cart::clear();

            return view('front.confirmacion')->with(['pedido' => $pedido->codigo]);
        else :

            $pedidos = auth()->user()->pedido;
            return view('client.step', ['pedidos' => $pedidos]);

        endif;
    }
}
