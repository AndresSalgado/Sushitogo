@extends('layouts.view_cajero')

@section('title', 'Cajero')

@section('content')

    <div class="ui container">

        <div class="ui text menu">
            <div class="ui right item">
                <form action="{{ route('pedido.viewterminado') }}" method="get" class="ui form">
                    <div class="ui fluid category search">
                        <div class="ui icon input">
                            <input class="prompt" type="text" placeholder="Buscar..." name="search">
                            <i submit class="circular search link icon" onclick="submitForm()"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ui very padded raised segment">
            <div class="contenedor4">
                <h2 style="text-align: center">Pedidos Terminados</h2>
                <div class="ui link cards">
                    @foreach ($pedido as $m)
                        @if ($m->estado_2)
                            @php
                                $pedido_completado_at = $m->updated_at;
                                $hora_actual = now();
                                $hora_limite = $pedido_completado_at->addHours(12);
                                $hora_pasada = $hora_actual->greaterThan($hora_limite);
                                $mostrar_pedido = !$hora_pasada;
                            @endphp

                            @if ($mostrar_pedido)
                                <a href="{{ route('pedido.detalle', ['id' => $m->id]) }}">
                                    <div class="card">
                                        <div class="content">
                                            <div class="header">
                                                <h4 style="color: rgb(0, 0, 0); padding: 10px 10px 2px 10px;">
                                                    {{ $m->codigo }}
                                                </h4>
                                            </div>
                                        </div>
                                        <hr style="border: 1px solid rgb(224, 224, 224)">
                                        <div class="content">
                                            <h4 style="color: rgb(0, 0, 0); padding: 10px 10px 2px 10px;">
                                                {{ $m->usuario->name }}
                                            </h4>
                                            <div class="event">
                                                <div class="content">
                                                    <h5 style="color: rgb(0, 0, 0); padding: 2px 10px 10px 10px;">
                                                        Fecha: {{ $m->created_at }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <a class="item"></a>
                                            <span class="right floated">
                                                <a href="{{ route('Factura.detalle', ['id' => $m->id]) }}"
                                                    class="ui icon button circular gray">
                                                    <i class="file pdf icon"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
