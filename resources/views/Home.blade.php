@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- <div class="ui container">
        <div class="ui segment">
            <div class="owl-carousel" id="product-carousel">
                @foreach ($productos as $p)
                    <div class="ui link card">
                        <a class="image" href="{{ route('Producto.view') }}">
                            <img src="{{ asset($p->imagen) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br><br> --}}

    <div class="ui justified container">
        <div class="ui raised very padded text container segment">
            <p class="">
                <span class="span1">Sushi to go</span>, hace del sushi la comida ideal para disfrutar y alimentarse
                sanamente. En la preparación <span class="span1">Sushi to go</span>, se balancean cuidadosamente los
                ingredientes para que las ventajas de los Omegas, los vegetales y la energía de los carbohidratos se
                combinen en un alimento bajo en grasa y con todo el sabor natural de la gastronomía japonesa.
            </p>
            <p class="">
                APRECIADO CLIENTE. Para nosotros es un motivo de orgullo darles el mejor servicio y los mejores
                productos.
                Te invitamos a descubrir este sitio web para que te enteres de nuestro menú, precios, promociones y
                dejanos
                tus comentarios en nuestras redes sociales.
            </p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#product-carousel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev custom-button">Previous</button>',
                nextArrow: '<button type="button" class="slick-next custom-button">Next</button>',
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    </script>

@endsection

