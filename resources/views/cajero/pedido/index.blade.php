@extends('layouts.view_cajero')

@section('title', 'Cajero')

@section('content')

    <div class="ui container">

        <h1 style="text-align: center;">Pedidos</h1>

        @if (session('Eliminado'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ session('Eliminado') }}
                </div>
            </div>
        @endif

        @if (Session::has('pedido_terminado'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ Session::get('pedido_terminado') }}
                </div>
            </div>
        @endif


        <div class="ui text menu">
            <div class="ui right item">
                <form action="{{ route('pedido.index') }}" method="get" class="ui form">
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
            <div class="contededor1">
                <div class="ui grid">
                    <div class="five wide column">
                        <h2 class="ui big blue label">Pedidos sin Aceptar</h2>
                        @foreach ($pedido as $m)
                            @if (!$m->estado_1)
                                <a href="{{ route('pedido.detalle', ['id' => $m->id]) }}">
                                    <div class="ui link card">
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
                                            <a href="{{ route('pedido.estado_1', $m->id) }}">
                                                <button type="submit" class="ui circular green icon button" id="boton">
                                                    <i class="ui check icon">
                                                    </i>
                                                </button>
                                            </a>
                                            <a onclick="eliminarPedido('{{ $m->id }}')">
                                                <button type="submit" class="ui circular red icon button" id="boton"><i
                                                        class="trash alternate icon"></i>
                                                </button>
                                            </a>
                                            <span class="right floated">
                                                <a href="{{ route('Factura.detalle', ['id' => $m->id]) }}"
                                                    class="ui circular gray icon button">
                                                    <i class="file pdf icon"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="five wide column">
                        <h2 class="ui big orange label">Pedidos en Proceso</h2>
                        @foreach ($pedido as $m)
                            @if ($m->estado_1 == 1 && $m->estado_2 != 1)
                                <a href="{{ route('pedido.detalle', ['id' => $m->id]) }}">
                                    <div class="ui link card">
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
                                            <a href="{{ route('pedido.estado_2', $m->id) }}">
                                                <button type="submit" class="ui circular green icon button" id="boton">
                                                    <i class="ui check icon">
                                                    </i>
                                                </button>
                                            </a>
                                            <a onclick="eliminarPedido('{{ $m->id }}')">
                                                <button type="submit" class="ui circular red icon button" id="boton"><i
                                                        class="trash alternate icon"></i>
                                                </button>
                                            </a>
                                            <span class="right floated">
                                                <a href="{{ route('Factura.detalle', ['id' => $m->id]) }}"
                                                    class="ui circular gray icon button">
                                                    <i class="file pdf icon"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="five wide column">
                        <h2 class="ui big green label">Pedidos Terminados</h2>
                        @foreach ($pedido as $m)
                            @if ($m->estado_2)
                                <a href="{{ route('pedido.detalle', ['id' => $m->id]) }}">
                                    <div class="ui link card">
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
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="contenedor2">
                <h2 style="text-align: center">Pedidos sin Aceptar</h2>
                <div class="ui link cards">
                    @foreach ($pedido as $m)
                        @if (!$m->estado_1)
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
                                        <a href="{{ route('pedido.estado_1', $m->id) }}">
                                            <button type="submit" class="ui circular green icon button" id="boton">
                                                <i class="ui check icon">
                                                </i>
                                            </button>
                                        </a>
                                        <span class="right floated">
                                            <a href="{{ route('Factura.detalle', ['id' => $m->id]) }}"
                                                class="ui circular gray icon button">
                                                <i class="file pdf icon"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{ $pedido->links('vendor.pagination.semantic-ui') }}

    </div>

    <script>
        function eliminarPedido(id) {
            swal({
                    title: "¿Está seguro que desea borrar el pedido?",
                    text: "El pedido será eliminado para siempre",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Redireccionar a la ruta para eliminar el registro
                        window.location.href = "{{ route('deletePedido', ':id') }}".replace(':id', id);
                    } else {
                        swal("El pedido no se ha borrado!", {
                            icon: "info",
                        });
                    }
                });
        }
    </script>

@endsection
