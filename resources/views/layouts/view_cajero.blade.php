<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('Css/styleCajero.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/semantic.css') }}">
    <link rel="shortcut icon" href="{{ asset('Img/logox1.png') }}" type="image/x-icon">
    <script src="{{ asset('Js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('Js/semantic.js') }}"></script>

    <title>@yield('title') - Menu Cajero</title>

</head>

<body>

    <div class="ui grid">
        <div class="computer only row">
            <div class="column">
                <div class="ui menu inverted borderless">
                    <a class="item">
                        <div class="ui tiny circular image">
                            <img src="{{ asset('Img/logox1.png') }}" alt="">
                        </div>
                    </a>
                    <a class="item right">
                        <div class="ui small horizontal divided list">
                            <div class="item">
                                <img src="{{ asset('Img/jenny.jpg') }}" class="ui mini circular image">
                                <div class="content">
                                    <div class="ui header" style="color: rgb(255, 255, 255)">Bienvenido a la vista de
                                        Cajero</div>
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="right menu">
                        <div class="item">
                            @if (auth()->check())
                                <a class="item right" href="{{ route('login.destroy') }}">
                                    <button class="ui inverted red button">CERRAR SESIÓN</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tablet mobile only row">
            <div class="column">
                <div class="ui inverted segment">
                    <div class="ui inverted secondary menu">
                        <a id="mobile_item" class="item"><i class="bars icon"></i></a>
                        <a class="item right" href="{{ route('cajero.index') }}">
                            <h1 style="color: white; text-align:center; font-family:cursive">
                                Sushi To Go
                            </h1>
                        </a>
                        <a class="item left"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="ui pushable segment">
        <div class="ui sidebar vertical inverted menu">
            <div class="item logo">
                <a href="{{ route('cajero.index') }}">
                    <img src="{{ asset('Img/logox1.png') }}">
                </a>
            </div>
            <a href="{{ route('cajero.index') }}" class="item">
                Pedidos
            </a>
            <a href="{{ route('pedido.viewproceso') }}" class="item">
                Pedidos en Proceso
            </a>
            <a href="{{ route('pedido.viewterminado') }}" class="item">
                Pedidos Terminados
            </a>
            @if (auth()->check())
                <a class="item" href="{{ route('login.destroy') }}">
                    Cerrar Sesión
                </a>
            @endif
        </div>
        <div class="pusher">
            <div id="content" class="ui segment">

            </div>
        </div>
    </div>

    <br><br><br>

    <div class="contenedores">

        @yield('content')

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

    <script src="{{ asset('Js/Minimenu.js') }}"></script>

    <script>
        const openBtn = document.querySelector('.openbtn');
        const myMenu = document.querySelector('#myMenu');

        // Agregar evento para cambiar la clase del botón cuando se haga clic en él
        openBtn.addEventListener('click', function() {
            myMenu.classList.toggle('menu-open');
            openBtn.classList.toggle('btn-open');
        });

        // Agregar evento para cambiar la clase del botón cuando el ancho de la pantalla cambie
        window.addEventListener('resize', function() {
            if (window.innerWidth > 993) {
                myMenu.classList.remove('menu-open');
                openBtn.classList.remove('btn-open');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.openbtn').click(function() {
                $('#myMenu').toggle();
                $('.openbtn').toggleClass('active');
            });

            $(window).resize(function() {
                if ($(window).width() > 992) {
                    $('#myMenu').show();
                    $('.openbtn').removeClass('active');
                } else {
                    $('#myMenu').hide();
                    $('.openbtn').addClass('active');
                }
            });
        });
    </script>

</body>

</html>
