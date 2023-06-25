@extends('layouts.view_admin')

@section('title', 'Producto')

@section('content')

    <div class="ui container">
        <div class="ui container">

            <h1>Listado Producto</h1>

            <div class="ui text menu">
                <div class="item">
                    <a href="{{ route('producto.create') }}">
                        <button type="submit" class="ui blue button">
                            <i class="ui pencil alternate icon"></i>
                            Crear
                        </button>
                    </a>
                </div>

                <div class="ui right item">
                    <form action="{{ route('producto.index') }}" method="get" class="ui form">
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

            @if (session('Error'))
                <div class="ui negative message">
                    <i class="close icon"></i>
                    <div class="header">
                        Error al eliminar el registro
                    </div>
                    <p>{{ session('Error') }}</p>
                </div>
            @endif

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Carta/Menú</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($producto) <= 0)
                        <tr>
                            <td colspan="7">No hay resultados</td>
                        </tr>
                    @else
                        @foreach ($producto as $c)
                            <tr>
                                <td>
                                    {{ $c->id }}
                                </td>
                                <td>
                                    {{ $c->nombre }}
                                </td>
                                <td>
                                    {{ $c->precio }}
                                </td>
                                <td>
                                    {{ $c->descripcion }}
                                </td>
                                <td>
                                    {{ $c->carta->nombre }}
                                </td>
                                <td>

                                    <div class="ui small images">
                                        <img src="{{ asset($c->imagen) }}">
                                    </div>

                                </td>
                                <td>
                                    <a href="{{ route('updateProducto', $c->id) }}">
                                        <button type="submit" class="ui circular green icon button" id="boton">
                                            <i class="ui undo alternate icon"></i>
                                        </button>
                                    </a>

                                    <a onclick="eliminarProducto('{{ $c->id }}')">
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

            {{ $producto->links('vendor.pagination.semantic-ui') }}

        </div>
    </div>



    <script>
        $('.ui.basic.modal')
            .modal('show');
    </script>

    <script>
        function eliminarProducto(id) {
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
                        window.location.href = "{{ route('deleteProducto', ':id') }}".replace(':id', id);
                    } else {
                        swal("El registro no se ha borrado!", {
                            icon: "info",
                        });
                    }
                });
        }
    </script>

@endsection
