@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

    <div class="ui container">
        @if (session('error'))
            <div class="ui warning message">
                <i class="close icon"></i>
                <div class="header">
                    {{ session('error') }}
                </div>
                <div>
                    Por favor haga un pedido mas bajo, o intente comunicarse con la empresa para hacer un pedido con mayor
                    costo.
                </div>
            </div>
        @endif
        @if (Auth::check())
            @if (count(Cart::getContent()))
                <div class="ui stackable grid">
                    <div class="twelve wide computer twelve wide tablet sixteen wide mobile column">
                        {{-- Vista desde un movil --}}
                        <div class="caja3">
                            <div class="ui segment">
                                <div class="ui divided items">
                                    @foreach (Cart::getContent() as $p)
                                        <div class="item">
                                            <div class="image">
                                                <img class="left floated mini ui image"
                                                    src="{{ asset($p->attributes->imagen) }}">
                                            </div>
                                            <div class="content">
                                                <div class="ui right floated">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                                        <span class="right floated">
                                                            <button type="submit" class="ui circular icon button"
                                                                id="boton"><i class="close icon"></i>
                                                            </button>
                                                        </span>
                                                    </form>
                                                </div>
                                                <a class="header">{{ $p->name }}</a>
                                                <div class="description">
                                                    <p>Descripcion: {{ $p->attributes->descripcion }}</p>
                                                </div>
                                                <div class="extra">
                                                    <div class="ui right floated">
                                                        <div class="ui orange label">SubTotal:
                                                            ${{ Cart::get($p->id)->getPriceSum() }}
                                                        </div>
                                                    </div>
                                                    <div class="ui black label">Precio: ${{ $p->price }}</div>
                                                    <br><br>
                                                    <div class="quantity-input">
                                                        <button class="ui tiny button icon red"
                                                            onclick="decreaseQuantity({{ $p->id }})">
                                                            <i class="minus icon"></i>
                                                        </button>
                                                        <div class="ui tiny input">
                                                            <input type="number" min="1" max="10"
                                                                value="{{ $p->quantity }}"
                                                                id="quantity-{{ $p->id }}" name="quantity"
                                                                class="update-cart" data-id="{{ $p->id }}">
                                                        </div>
                                                        <button class="ui tiny button icon green"
                                                            onclick="increaseQuantity({{ $p->id }})">
                                                            <i class="plus icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $p->id }}">
                                <span class="right floated">
                                    <button type="submit" class="ui blue button" id="boton">
                                        <i class="trash alternate outline icon"></i>
                                        Limpiar Carrito
                                    </button>
                                </span>
                            </form>
                        </div>
                        {{-- Aui termina vista desde un movil --}}
                    </div>

                    <div class="four wide computer four wide tablet sixteen wide mobile column">
                        <div class="ui segment">
                            <div class="ui unstackable items">
                                <div class="item">
                                    <table class="ui very basic table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    Total Carrito
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Producto
                                                </th>
                                                <th>
                                                    SubTotal
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach (Cart::getContent() as $p)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $p->name }}
                                                    </td>
                                                    <td>
                                                        ${{ Cart::get($p->id)->getPriceSum() }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <th style="font-weight: bold">
                                                    Total:
                                                </th>
                                                <th style="font-weight: bold">
                                                    ${{ Cart::getTotal() }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">
                                                    <a data-target=".ui.modal" id="show">
                                                        <button class="ui brown button">
                                                            Comprar
                                                        </button>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="ui segment" style="text-align: center">
                    <div class="ui segments">
                        <div class="ui segment">
                            <h1>Carrito Vacío</h1>
                        </div>
                        <div style="text-align: center;" class="ui secondary segment">
                            <a class="ui green button" href="{{ route('Producto.view') }}">
                                Comprar
                            </a>
                        </div>
                    </div>
                    <i class="massive cart arrow down icon"></i>
                </div>
            @endif

            <div class="ui modal">
                <div class="header">
                    <h2>Pedido</h2>
                </div>
                <div class="scrolling content">
                    <div class="ui stackable grid">
                        <div class="twelve wide computer twelve wide tablet sixteen wide mobile column">
                            @if (session('success'))
                                <div class="ui success message">
                                    <i class="close icon"></i>
                                    <div class="header">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <div class="ui segment" style="background-color: rgba(255, 255, 255, 0.791);padding: 10%;">
                                <h1 class="titulo">Verifica tu Información</h1>
                                <form class="ui form" action="{{ route('carrito.perfil.actualizar') }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui large black label">
                                                <label for="">Nombre Usuario: </label>
                                            </div>

                                            <input type="hidden" name="id" value="{{ $update->id }}">
                                            <input type="text" name="name" id="name"
                                                value="{{ $update->name }}" pattern="^(?!\s).*$"
                                                title="No se permiten espacios en blanco">
                                            @error('name')
                                                <div class="field">
                                                    <div class="ui mini negative message">
                                                        <i class="close icon"></i>
                                                        <p>* Por favor ingrese un nombre</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <div class="ui large black label">
                                                <label for="">Numero Telefono: </label>
                                            </div>

                                            <input type="text" name="telefono" id="telefono"
                                                value="{{ $update->telefono }}">
                                            @if ($errors->has('telefono'))
                                                <div class="field">
                                                    <div class="ui mini negative message">
                                                        <i class="close icon"></i>
                                                        <p>Por favor, ingrese un número de teléfono entre 7 y 10 dígitos</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="two fields">
                                        <div class="field">
                                            <div class="ui large black label">
                                                <label for="">Municipio Usuario: </label>
                                            </div>

                                            <select name="municipio_id" class="ui selection dropdown">
                                                @foreach ($municipio as $m)
                                                    <option value="{{ $m->id }}"
                                                        @if ($m->id == $update->municipio_id) selected @endif>
                                                        {{ $m->NombreMunicipio }}</option>
                                                @endforeach
                                            </select>

                                            @error('municipio_id')
                                                <div class="field">
                                                    <div class="ui mini negative message">
                                                        <i class="close icon"></i>
                                                        <p>* Por favor seleccione un municipio</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <div class="ui large black label">
                                                <label for="">Direccion: </label>
                                            </div>

                                            <input type="text" name="direccion" id="direccion"
                                                value="{{ $update->direccion }}" pattern="^(?!\s).*$"
                                                title="No se permiten espacios en blanco">
                                            @error('direccion')
                                                <div class="field">
                                                    <div class="ui mini negative message">
                                                        <i class="close icon"></i>
                                                        <p>* Por favor ingrese una direccion</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="fields">
                                        <div class="three wide field"></div>
                                        <div class="ten wide field">
                                            <div class="ui large black label">
                                                <label for="">Email: </label>
                                            </div>

                                            <input type="email" placeholder="Correo Electronico" id="email"
                                                name="email" value="{{ $update->email }}">

                                            @if ($errors->has('email'))
                                                @if ($errors->first('email') == 'Este correo electrónico ya está en uso')
                                                    <div class="field">
                                                        <div class="ui mini negative message">
                                                            <i class="close icon"></i>
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    </div>
                                                @else
                                                    @if ($errors->has('email'))
                                                        <div class="field">
                                                            <div class="ui mini negative message">
                                                                <i class="close icon"></i>
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                        <div class="three wide field"></div>
                                    </div>

                                    <div class="botones">
                                        <button class="ui blue button" type="submit">
                                            <i class="ui edit icon"></i>
                                            Guardar
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <br>
                        <div class="four wide computer four wide tablet sixteen wide mobile column">
                            <div class="ui segment">
                                <div class="ui unstackable items">
                                    <div class="item">
                                        <table class="ui very basic table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        Total Carrito
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Producto
                                                    </th>
                                                    <th>
                                                        SubTotal
                                                    </th>
                                                </tr>
                                            </thead>
                                            @foreach (Cart::getContent() as $p)
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ $p->name }}
                                                        </td>
                                                        <td>
                                                            ${{ Cart::get($p->id)->getPriceSum() }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th style="font-weight: bold">
                                                        Total:
                                                    </th>
                                                    <th style="font-weight: bold">
                                                        ${{ Cart::getTotal() }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">
                                                        <a href="{{ route('pedido.proceso') }}">
                                                            <button class="ui brown button">
                                                                Comprar
                                                            </button>
                                                        </a>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="ui info message">
                <div class="header">
                    No has iniciado sesión
                </div>
                <div class="content">
                    <p>Debe iniciar sesión para usar el carrito de compras</p>
                </div>
            </div>
        @endif
    </div>

@endsection
