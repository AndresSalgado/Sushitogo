@extends('layouts.app')

@section('title', 'Step')

@section('content')

    <div class="ui container">
        @if (Auth::check())
            @php
                $pedidosFiltrados = $pedidos->filter(function ($pedido) {
                    $estado_terminado = $pedido->estado_2 == 1;
                    $pedido_completado_at = $pedido->updated_at;
                    $hora_actual = now();
                    $hora_limite = $pedido_completado_at->addMinutes(60);
                    $hora_pasada = $hora_actual->greaterThan($hora_limite);
                    $mostrar_pedido = !($estado_terminado && $hora_pasada);
                
                    return $pedido->estado_1 == 0 || ($pedido->estado_1 == 1 && $pedido->estado_2 == 0) || $mostrar_pedido;
                });
            @endphp

            @if ($pedidosFiltrados->count() > 0)
                @foreach ($pedidosFiltrados->reverse() as $pedido)
                    @php
                        $estado_terminado = $pedido->estado_2 == 1;
                        $pedido_completado_at = $pedido->updated_at;
                        $hora_actual = now();
                        $hora_limite = $pedido_completado_at->addMinutes(60);
                        $hora_pasada = $hora_actual->greaterThan($hora_limite);
                        $mostrar_pedido = !($estado_terminado && $hora_pasada);
                    @endphp
                    @if ($mostrar_pedido)
                        <div class="ui very padded segment">
                            <div class="ui large top attached label" style="background-color: #00CCFF">
                                <div class="ui large horizontal divided list">
                                    <div class="item">
                                        <div class="header" style="color: #FFF">
                                            Codigo Pedido - {{ $pedido->codigo }}
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="header" style="color: #FFF">
                                            Fecha: {{ $pedido->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui ordered steps">
                                @if ($pedido->estado_1)
                                    <div class="step disabled">
                                        <div class="content">
                                            <div class="title">Pedido Sin Aceptar</div>
                                            <div class="description">Su pedido está a la espera de ser aceptado</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="step">
                                        <div class="content">
                                            <div class="title">Pedido Sin Aceptar</div>
                                            <div class="description">Su pedido está a la espera de ser aceptado</div>
                                        </div>
                                    </div>
                                @endif
                                <div
                                    class="{{ $pedido->estado_1 == 1 && $pedido->estado_2 != 1 ? 'completed' : 'disabled' }} step">
                                    <div class="content">
                                        <div class="title">Pedido Aceptado</div>
                                        <div class="description">Su pedido fue Aceptado</div>
                                    </div>
                                </div>
                                <div
                                    class="{{ $pedido->estado_1 == 1 && $pedido->estado_2 != 1 ? 'completed' : 'disabled' }} step">
                                    <div class="content">
                                        <div class="title">Pedido en Proceso</div>
                                        <div class="description">Su pedido esta en proceso</div>
                                    </div>
                                </div>
                                <div class="{{ $pedido->estado_2 ? 'completed' : 'disabled' }} step">
                                    <div class="content">
                                        <div class="title">Pedido Terminado</div>
                                        <div class="description">Su pedido fue terminado</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endif
                @endforeach
            @else
                <div class="ui segment" style="text-align: center">
                    <div class="ui segments">
                        <div class="ui segment">
                            <h1>No tienes ningún pedido en proceso</h1>
                        </div>
                        <div style="text-align: center;" class="ui secondary segment">
                            <a class="ui green button" href="{{ route('Producto.view') }}">
                                Comprar
                            </a>
                        </div>
                    </div>
                    <i class="massive shipping fast icon"></i>
                </div>
            @endif
        @else
            <div class="ui info message">
                <div class="header">
                    No haz Iniciado Sesion
                </div>
                <div class="content">
                    <p>Debe iniciar sesión para ver tus pedidos en proceso</p>
                </div>
            </div>
        @endif
    </div>

@endsection
