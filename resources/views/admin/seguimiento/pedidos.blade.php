@extends('layouts.view_admin')

@section('title', 'Admin')

@section('content')
    <div class="ui container">

        <div class="ui segments">
            <div class="ui segment">
                <h1>Seguimiento de pedidos en proceso</h1>
            </div>
            <div class="ui segments">
                <div class="ui segment">
                    <table class="ui table celled">
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Usuario</th>
                                <th>Estado Proceso</th>
                                <th>Fecha de Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pedidosEstado1 as $pedido)
                                @if ($pedido->estado_1 == 1 && $pedido->estado_2 != 1)
                                    <tr>
                                        <td>{{ $pedido->codigo }}</td>
                                        <td>{{ $pedido->updatedBy->name }}</td>
                                        <td>{{ $pedido->estado_1 }}</td>
                                        <td>{{ $pedido->updated_at }}</td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4">No se encontraron pedidos actualizados para el Estado 1.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pedidosEstado1->links('vendor.pagination.semantic-ui') }}
                </div>
            </div>
        </div>

        <div class="ui segments">
            <div class="ui segment">
                <h1>Seguimiento de pedidos terminados</h1>
            </div>
            <div class="ui segments">
                <div class="ui segment">
                    <table class="ui table celled">
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Usuario</th>
                                <th>Estado Terminado</th>
                                <th>Fecha de Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pedidosEstado2 as $pedido)
                                @if ($pedido->estado_2)
                                    <tr>
                                        <td>{{ $pedido->codigo }}</td>
                                        <td>{{ $pedido->updatedBy->name }}</td>
                                        <td>{{ $pedido->estado_2 }}</td>
                                        <td>{{ $pedido->updated_at }}</td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4">No se encontraron pedidos actualizados para el Estado 2.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pedidosEstado2->links('vendor.pagination.semantic-ui') }}
                </div>
            </div>
        </div>

        <div class="ui segments">
            <div class="ui segment">
                <h1>Seguimiento de pedidos eliminados</h1>
            </div>
            <div class="ui segments">
                <div class="ui segment">
                    <table class="ui table celled">
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Usuario</th>
                                <th>Fecha de Eliminación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pedidosEliminados as $pedido)
                                <tr>
                                    <td>{{ $pedido->codigo }}</td>
                                    <td>{{ $pedido->deletedBy->name }}</td>
                                    <td>{{ $pedido->deleted_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No se encontraron pedidos eliminados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pedidosEliminados->links('vendor.pagination.semantic-ui') }}
                </div>
            </div>
        </div>
    </div>
@endsection
