@extends('layouts.view_admin')

@section('title', 'Restaurante')

@section('content')

    <div class="ui container">
        <div class="ui container">

            <h1>Listado Restaurantes</h1>

            <div class="ui text menu">
                <div class="item">
                    <a href="{{ route('restaurante.create') }}">
                        <button type="submit" class="ui blue button">
                            <i class="ui pencil alternate icon"></i>
                            Crear
                        </button>
                    </a>
                </div>

                <div class="ui right item">
                    <form action="{{ route('restaurante.index') }}" method="get" class="ui form">
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

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Municipio</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($restaurante) <= 0)
                        <tr>
                            <td colspan="6">No hay resultados</td>
                        </tr>
                    @else
                        @foreach ($restaurante as $c)
                            <tr>
                                <td>
                                    {{ $c->id }}
                                </td>

                                <td>
                                    {{ $c->nombre }}
                                </td>

                                <td>
                                    {{ $c->telefono }}
                                </td>

                                <td>
                                    {{ $c->direccion }}
                                </td>

                                <td>
                                    {{ $c->municipio->NombreMunicipio }}
                                </td>

                                <td>

                                    <div class="ui small images">
                                        <img src="{{ asset($c->imagen) }}">
                                    </div>

                                </td>
                                <td>
                                    <a href="{{ route('updateRestaurante', $c->id) }}">
                                        <button type="submit" class="ui circular green icon button" id="boton">
                                            <i class="ui undo alternate icon"></i>
                                        </button>
                                    </a>

                                    <a onclick="eliminarRestaurante('{{ $c->id }}')">
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

            {{ $restaurante->links('vendor.pagination.semantic-ui') }}

        </div>
    </div>

    <script>
        function eliminarRestaurante(id) {
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
                        window.location.href = "{{ route('deleteRestaurante', ':id') }}".replace(':id', id);
                    } else {
                        swal("El registro no se ha borrado!", {
                            icon: "info",
                        });
                    }
                });
        }
    </script>

@endsection
