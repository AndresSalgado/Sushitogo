<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('Css/styleAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/semantic.css') }}">
    <link rel="shortcut icon" href="{{ asset('Img/logox1.png') }}" type="image/x-icon">
    <script src="{{ asset('Js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('Js/semantic.js') }}"></script>

    <title>@yield('title') - Menu Admin</title>

</head>

<body>

    <div class="ui grid">
        <div class="three wide column">
            <div class="ui inverted sidebar vertical left menu overlay visible">
                <div class="item logo">
                    <a href="{{ route('admin.index') }}">
                        <img src="{{ asset('Img/logox1.png') }}">
                    </a>
                </div>
                <div class="ui accordion">
                    <a href="{{ route('admin.index') }}" class="item" style="color: rgb(255, 255, 255)">
                        Inicio
                    </a>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="dropdown icon"></i> Usuarios
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('usuario.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('usuario.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="dropdown icon"></i> Cartas
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('carta.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('carta.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="dropdown icon"></i> Productos
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('producto.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('producto.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="dropdown icon"></i> Restaurantes
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('restaurante.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('restaurante.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="dropdown icon"></i> Municipios
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('municipio.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('municipio.create') }}">Crear
                        </a>
                    </div>
                    <a href="{{ route('view.venta') }}" class="item" style="color: rgb(255, 255, 255)">
                        Ventas
                    </a>
                    <a href="{{ route('seguimiento.pedidos') }}" class="item" style="color: rgb(255, 255, 255)">
                        Seguimientos
                    </a>
                    <a href="{{ route('login.destroy') }}" class="item" style="color: rgb(255, 255, 255)">
                        Cerrar Sesión
                    </a>
                </div>
            </div>


            <div class="ui inverted sidebar vertical icon menu overlay visible">
                <a href="{{ route('admin.index') }}" class="item">
                    <div class="menu">
                        <img src="{{ asset('Img/logox1.png') }}" class="logo_movil">
                    </div>
                </a>

                <div class="ui accordion">
                    <a href="{{ route('admin.index') }}" class="item" style="color: rgb(255, 255, 255)">
                        Inicio
                    </a>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="icon users"></i>Usuarios
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('usuario.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('usuario.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="icon clipboard list"></i>Cartas
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('carta.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('carta.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="icon utensils"></i> Productos
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('producto.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('producto.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="icon warehouse"></i> Restaurantes
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('restaurante.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('restaurante.create') }}">Crear
                        </a>
                    </div>

                    <div class="title item" style="color: rgb(255, 255, 255)">
                        <i class="icon building"></i> Municipios
                    </div>
                    <div class="content">
                        <a class="item" href="{{ route('municipio.index') }}">Listado
                        </a>
                        <a class="item" href="{{ route('municipio.create') }}">Crear
                        </a>
                    </div>
                    <a href="{{ route('view.venta') }}" class="item">
                        <i class="icon dollar sign"></i>
                        Ventas
                    </a>
                    <a href="{{ route('seguimiento.pedidos') }}" class="item">
                        <i class="icon eye"></i>
                        Seguimientos
                    </a>
                    <a href="{{ route('login.destroy') }}" class="item" style="color: rgb(255, 255, 255)">
                        <i class="icon sign-out"></i>
                        Salir
                    </a>

                </div>
            </div>
        </div>

        <div class="thirteen wide column">
            <div class="contenedores">

                @yield('content')

            </div>
        </div>
    </div>

    <div id="footer">
        <div class="ui equal width grid">
            <div class="column"></div>
        </div>
        <div class="ui equal width grid">
            <div class="column">
                <table class="ui very basic table">
                    <thead>
                        <tr>
                            <th colspan="3">CONTÁCTATE CON NOSOTROS</th>
                        </tr>
                        <tr>
                            <td>
                                Mall Lleras. Poblado
                                Parque Lleras. Calle 9A No. 38-26
                                Tel: 311 06 52
                            </td>
                            <td>
                                Mall Plaza. Poblado
                                Mall plaza, Transversal inferior
                                TEL: 266 74 09
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mall La Sebastiana. Envigado
                                TEL: 301 88 44
                            </td>
                            <td>
                                Mall Terraza. Laureles
                                Mall La Terraza, Avenida Nutibara.
                                TEL: 362 98 01
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="column">
                <table class="ui very basic table">
                    <thead>
                        <tr>
                            <th colspan="3">HORARIOS DE ATENCION</th>
                        </tr>
                        <tr>
                            <td>
                                LUNES A JUEVES
                            </td>
                            <td>
                                VIERNES Y SABADOS
                            </td>
                        </tr>
                        <tr>
                            <td>
                                12M - 10PM
                            </td>
                            <td>
                                12M - 11PM
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="ui grid">
            <div class="four column row">
                <div class="left floated column">
                    Colombia, Antioquia, Medellin.
                </div>
                <div class="right floated column">
                    <button class="ui circular facebook icon button">
                        <i class="facebook icon"></i>
                    </button>
                    <button class="ui circular violet icon button">
                        <i class="instagram icon"></i>
                    </button>
                    <button class="ui circular green icon button">
                        <i class="whatsapp icon"></i>
                    </button>
                    <button class="ui circular red icon button">
                        <i class="envelope icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('Js/Aplication.js') }}"></script>
    <script src="{{ asset('Js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Js/Validaciones.js') }}"></script>

    <script>
        $('.ui.checkbox')
            .checkbox();
    </script>

    <script>
        window.onload = function() {
            document.querySelector('.item.openbtn').setAttribute('disabled', 'disabled');
        }
    </script>

</body>

</html>
