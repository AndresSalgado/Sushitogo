@extends('layouts.view_admin')

@section('title', 'Carta')

@section('content')



    <div class="ui container">
        <div class="ui container">

            <h1>Listado Cartas</h1>

            <div class="ui text menu">
                <div class="item">
                    <a href="{{ route('carta.create') }}">
                        <button type="submit" class="ui blue button">
                            <i class="ui pencil alternate icon"></i>
                            Crear
                        </button>
                    </a>
                </div>

                <div class="ui right item">
                    <form action="{{ route('carta.index') }}" method="get" class="ui form">
                        <div class="ui fluid category search">
                            <div class="ui icon input">
                                <input class="prompt" type="text" placeholder="Buscar..." name="search">
                                <i submit class="circular search link icon" onclick="submitForm()"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (@empty(session('Guardado')))
            @else
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ session('Guardado') }}
                    </div>
                </div>
            @endif

            @if (@empty(session('Actualizado')))
            @else
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ session('Actualizado') }}
                    </div>
                </div>
            @endif

            @if (@empty(session('Eliminado')))
            @else
                <div class="ui success message">
                    <i class="close icon"></i>
                    <div class="header">
                        {{ session('Eliminado') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                        Error al eliminar el registro
                    </div>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <!-- <th>Imagen</th> -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($carta) <= 0)
                        <tr>
                            <td colspan="4">No hay resultados</td>
                        </tr>
                    @else
                        @foreach ($carta as $c)
                            <tr>
                                <td>
                                    {{ $c->id }}
                                </td>
                                <td>
                                    {{ $c->nombre }}
                                </td>
                                <!-- <td>

                                    <div class="ui small images">
                                        <img src="{{ asset($c->imagen) }}">
                                    </div>

                                </td> -->
                                <td>
                                    <a href="{{ route('updateCarta', $c->id) }}">
                                        <button type="submit" class="ui circular green icon button" id="boton">
                                            <i class="ui undo alternate icon"></i>
                                        </button>
                                    </a>

                                    <a onclick="eliminarCarta('{{ $c->id }}')">
                                        <button type="submit" class="ui circular red icon button" id="boton"><i
                                                class="trash alternate icon"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            {{ $carta->links('vendor.pagination.semantic-ui') }}

        </div>
    </div>

    <script>
        function eliminarCarta(id) {
            swal({
                    title: "¿Está seguro que desea borrar el registro?",
                    text: "El registro será eliminado para siempre",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Redireccionar a la ruta para eliminar el registro
                        window.location.href = "{{ route('deleteCarta', ':id') }}".replace(':id', id);
                    } else {
                        swal("El registro no se ha borrado!", {
                            icon: "info",
                        });
                    }
                });
        }
    </script>

@endsection
