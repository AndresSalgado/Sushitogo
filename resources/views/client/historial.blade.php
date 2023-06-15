@extends('layouts.app')

@section('title', 'Historial')

@section('content')

    <div class="ui container">
        <div class="ui raised very padded segment">
            <h1 style="text-align: center;">Historial de Pedidos</h1>
            @if (Auth::check())
                <h3 class="ui big orange label">Último Pedido:</h3>
                @forelse (Auth::user()->pedido->sortByDesc('created_at') as $pedido)
                    <div class="ui segments">
                        <div class="ui secondary segment">
                            <div class="ui large horizontal divided list">
                                <div class="item">
                                    <div class="header">
                                        Codigo Pedido - {{ $pedido->codigo }}
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="header">
                                        Fecha: {{ $pedido->created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui segment">
                            <table class="ui celled table">
                                <thead>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Precio Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($pedido->detalle as $d)
                                        <tr>
                                            <td>
                                                {{ $d->cantidad }}
                                            </td>
                                            <td>
                                                {{ $d->nombre_producto }}
                                            </td>
                                            <td>
                                                ${{ $d->precio_producto }}
                                            </td>
                                            <td>
                                                ${{ $d->precio_producto * $d->cantidad }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>SubTotal</th>
                                        <th>${{ $pedido->subtotal }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>Precio Envío:</th>
                                        <th>${{ $pedido->costoEnvio }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>Total</th>
                                        <th>${{ $pedido->total }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <a href="{{ route('Factura.detalle', ['id' => $pedido->id]) }}"
                                                class="ui button blue">Descargar Comprobante</a>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                @empty
                    <h3>No tienes pedidos</h3>
                @endforelse
            @else
                <div class="ui info message">
                    <div class="header">
                        No haz Iniciado Sesion
                    </div>
                    <div class="content">
                        <p>Debe iniciar sesión para ver su historial de pedidos</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
