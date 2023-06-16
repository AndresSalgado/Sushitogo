@extends('layouts.view_cajero')

@section('title', 'Cajero')

@section('content')

    <div class="ui container">
        <div class="ui very padded raised segment">

            <h1 style="text-align: center;">Detalle Pedido</h1>

            @if ($detalle->count() > 0)

                <div class="ui list">
                    <div class="item">
                        <i class="barcode icon"></i>
                        <div class="content">
                            Código Pedido: {{ $detalle[0]->pedido->codigo }}
                        </div>
                    </div>
                    <div class="item">
                        <i class="user icon"></i>
                        <div class="content">
                            Nombre: {{ $detalle[0]->pedido->usuario->name }}
                        </div>
                    </div>
                    <div class="item">
                        <i class="mail icon"></i>
                        <div class="content">
                            Email: {{ $detalle[0]->pedido->usuario->email }}
                        </div>
                    </div>
                    <div class="item">
                        <i class="phone icon"></i>
                        <div class="content">
                            Telefono: {{ $detalle[0]->pedido->usuario->telefono }}
                        </div>
                    </div>
                    <div class="item">
                        <i class="map alternate icon"></i>
                        <div class="content">
                            Municipio: {{ $detalle[0]->nombre_municipio }}
                        </div>
                    </div>
                    <div class="item">
                        <i class="map marker alternate icon"></i>
                        <div class="content">
                            Direccion: {{ $detalle[0]->direccion_cliente }}
                        </div>
                    </div>
                </div>

                <table class="ui celled table">
                    <thead>
                        <tr>
                            {{-- <th>N°</th> --}}
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalle as $m)
                            <tr>
                                {{-- <td>
                                    {{ $m->id }}
                                </td> --}}
                                <td>
                                    {{ $m->cantidad }}
                                </td>
                                <td>
                                    {{ $m->nombre_producto }}
                                </td>
                                <td>
                                    ${{ $m->precio_producto }}
                                </td>
                                <td>
                                    ${{ $m->precio_producto * $m->cantidad }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"></th>
                            <th>SubTotal:</th>
                            <th>${{ $detalle[0]->pedido->subtotal }}</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Precio Envío:</th>
                            <th>${{ $detalle[0]->pedido->costoEnvio }}</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Total:</th>
                            <th>${{ $detalle[0]->pedido->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            @else
                <p>No se encontraron detalles para este pedido.</p>
            @endif

            <div class="botones">
                <a href="{{ route('pedido.index') }}">
                    <button class="ui blue button">
                        <i class="ui backward icon"></i>
                        Atras
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection
