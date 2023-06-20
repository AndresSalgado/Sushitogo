@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="ui container">
        <div class="ui segment">
            <div class="owl-carousel" id="product-carousel">
                @foreach ($productos as $p)
                    <div class="ui card">
                        <div class="content">
                            <img class="right floated mini ui image" src="{{ asset($p->imagen) }}">
                            <div class="header">
                                <h3>{{ $p->nombre }}</h3>
                            </div>
                            <div class="meta">
                                Precio ${{ $p->precio }}
                            </div>
                            <div class="description">
                                {{ $p->descripcion }}
                            </div>
                        </div>
                        <div class="extra content">
                            @if (auth()->check())
                                <form action="{{ route('cart.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $p->id }}" name="producto_id" id="producto_id">
                                    <input type="hidden" name="quantity" value="1" min="1">
                                    <button type="submit" class="ui green compact icon button">
                                        <i class="shopping basket icon"></i>
                                        Agregar
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login.destroy') }}" class="ui green compact icon button">
                                    <i class="shopping basket icon"></i>
                                    Agregar
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br><br>

    <div class="ui justified container">
        <div class="ui raised very padded text container segment">
            <p class="">
                <span class="span1">Sushi to go</span>, hace del sushi la comida ideal para disfrutar y alimentarse
                sanamente. En la preparación <span class="span1">Sushi to go</span>, se balancean cuidadosamente los
                ingredientes para que las ventajas de los Omegas, los vegetales y la energía de los carbohidratos se
                combinen en un alimento bajo en grasa y con todo el sabor natural de la gastronomía japonesa.
            </p>
            <p class="">
                APRECIADO CLIENTE. Para nosotros es un motivo de orgullo darles el mejor servicio y los mejores productos.
                Te invitamos a descubrir este sitio web para que te enteres de nuestro menú, precios, promociones y dejanos
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
                prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                nextArrow: '<button type="button" class="slick-next">Next</button>',
                autoplay: true, // Agrega esta línea para habilitar el movimiento automático
                autoplaySpeed: 3000, // Define la velocidad de desplazamiento automático en milisegundos
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>

@endsection
