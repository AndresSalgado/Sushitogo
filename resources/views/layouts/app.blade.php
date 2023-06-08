<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('Css/styleApp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/semantic.css') }}">
    <link rel="shortcut icon" href="{{ asset('Img/logox1.png') }}" type="image/x-icon">
    <script src="{{ asset('Js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('Js/semantic.js') }}"></script>
    <title>@yield('title') - Menu</title>

</head>

<body>

    <div class="ui grid">

        <div class="computer only row">
            <div class="column">
                <div class="ui inverted segment">
                    <div class="ui inverted secondary menu">
                        <a class="item" href="{{ route('Home.index') }}">
                            <div class="ui tiny circular image">

                                <img src="{{ asset('Img/logox1.png') }}" alt="">

                            </div>
                        </a>
                        <a class="item right" href="{{ route('Home.index') }}">
                            INICIO
                        </a>
                        <a class="item" href="{{ route('Producto.view') }}">
                            MENU
                        </a>
                        <a class="item" href="{{ route('Restaurante.view') }}">
                            RESTAURANTE
                        </a>
                        <a class="item" href="{{ route('AcercaDe.view') }}">
                            ACERCA DE
                        </a>

                        @if (auth()->check())
                            <a class="item right" href="{{ route('cart.checkout') }}">
                                <i class="shopping cart icon"></i>
                                <div class="floating ui grey label">{{ Cart::getTotalQuantity() }}</div>
                            </a>

                            <div class="ui dropdown item">
                                PERFIL
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <a class="item" href="{{ route('perfil.edit') }}"><i class="edit icon"></i>
                                        EDITAR PERFIL
                                    </a>
                                    <a class="item" href="{{ route('Historial.view') }}"><i class="book icon"></i>
                                        HISTORIAL
                                    </a>
                                    <a class="item" href="{{ route('step.view') }}"><i class="clipboard list icon"></i>
                                        PROCESO PEDIDO
                                    </a>
                                    <a class="item" href="{{ route('login.destroy') }}">
                                        <i class="arrow alternate circle left icon"></i>
                                        CERRAR SESION
                                    </a>
                                </div>
                            </div>
                        @else
                            <a class="item right" href="{{ route('login.destroy') }}">
                                INGRESA
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="tablet mobile only row">
            <div class="column">
                <div class="ui inverted segment">
                    <div class="ui inverted secondary menu">
                        <a id="mobile_item" class="item"><i class="bars icon"></i></a>
                        <a class="item right" href="{{ route('Home.index') }}">
                            <h1 style="color: white; text-align:center; font-family:cursive">Sushi To Go</h1>
                        </a>

                        @if (auth()->check())
                            <a class="item right" href="{{ route('cart.checkout') }}">
                                <i class="shopping cart icon"></i>
                                <div class="floating ui grey label">{{ Cart::getTotalQuantity() }}</div>
                            </a>
                        @else
                            <a class="item left"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="ui pushable segment">
        <div class="ui sidebar vertical inverted menu">
            <a class="item" href="{{ route('Home.index') }}">
                <div class="ui tiny circular image">
                    <img src="{{ asset('Img/logox1.png') }}">
                </div>
            </a>
            <a class="item right" href="{{ route('Home.index') }}">
                INICIO
            </a>
            <a class="item" href="{{ route('Producto.view') }}">
                MENU
            </a>
            <a class="item" href="{{ route('Restaurante.view') }}">
                RESTAURANTE
            </a>
            <a class="item" href="{{ route('AcercaDe.view') }}">
                ACERCA DE
            </a>

            @if (auth()->check())
                <a class="item" href="{{ route('perfil.edit') }}">
                    EDITAR PERFIL
                </a>
                <a class="item" href="{{ route('Historial.view') }}">
                    HISTORIAL
                </a>
                <a class="item" href="{{ route('step.view') }}">
                    PROCESO PEDIDO
                </a>
                <a class="item" href="{{ route('login.destroy') }}">
                    CERRAR SESION
                </a>
            @else
                <a class="item right" href="{{ route('login.destroy') }}">
                    INGRESA
                </a>
            @endif
        </div>
        <div class="pusher">
            <div id="content" class="ui segment">

            </div>
        </div>
    </div>
    <br><br><br><br><br>

    @yield('content')

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
    <script src="{{ asset('Js/Minimenu.js') }}"></script>
    <script src="{{ asset('Js/Validaciones.js') }}"></script>

    {{-- Script para aumentar automaticamente la cantidad de los productos --}}
    <script>
        $(document).ready(function() {
            $('.update-cart').change(function() {
                var id = $(this).attr('data-id');
                var quantity = $(this).val();
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'post',
                    data: {
                        id: id,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>

    {{-- Script para aumentar automaticamente la cantidad de los productos con los botones --}}
    <script>
        function increaseQuantity(id) {
            var input = document.getElementById("quantity-" + id);
            var currentValue = parseInt(input.value);
            var maxValue = parseInt(input.max);
            if (currentValue < maxValue) {
                input.value = currentValue + 1;
                updateCart(id);
            }
        }

        function decreaseQuantity(id) {
            var input = document.getElementById("quantity-" + id);
            var currentValue = parseInt(input.value);
            var minValue = parseInt(input.min);
            if (currentValue > minValue) {
                input.value = currentValue - 1;
                updateCart(id);
            }
        }

        function updateCart(id) {
            var quantity = $('#quantity-' + id).val();
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'post',
                data: {
                    id: id,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    </script>

</body>

</html>
