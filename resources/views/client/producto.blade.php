@extends('layouts.app')

@section('title', 'Producto')

@section('content')

    <div class="ui container">
        @if (session('error'))
            <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                    Limite de Producto!
                </div>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if (session('success'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    Exito!
                </div>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="ui piled segments">
            @foreach ($infocarta as $c)
                <div class="caja1">
                    <div class="tituloCarta">
                        <h2 class="ui red tag label block header">{{ $c->nombre }}:</h2>
                    </div>
                    <div class="ui link cards">
                        @foreach ($producto as $p)
                            @if ($p->carta_id == $c->id)
                                <div class="card">
                                    <div class="ui tyni image">
                                        <img src="{{ asset($p->imagen) }}">
                                    </div>
                                    <div class="content">
                                        <div class="header">{{ $p->nombre }}</div>
                                        <div class="description">
                                            {{ $p->descripcion }}
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        @if (auth()->check())
                                            <form action="{{ route('cart.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $p->id }}" name="producto_id"
                                                    id="producto_id">
                                                <input type="hidden" name="quantity" value="1" min="1">
                                                <span class="right floated">
                                                    <button type="submit" class="ui green compact icon button">
                                                        <i class="shopping basket icon"></i>
                                                        Agregar
                                                    </button>
                                                </span>
                                            </form>
                                        @else
                                            <span class="right floated">
                                                <a href="{{ route('login.destroy') }}" class="ui green compact icon button">
                                                    <i class="shopping basket icon"></i>
                                                    Agregar
                                                </a>
                                            </span>
                                        @endif
                                        <div class="ui basic blue label">
                                            <i class="dollar sign icon"></i>
                                            {{ $p->precio }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tituloCarta2">
                    <h2 class="ui red tag label block header">{{ $c->nombre }}:</h2>
                </div>
                <div class="caja2">
                    {{-- <div class="tituloCarta2">
                        <h2 class="ui red tag label block header">{{ $c->nombre }}:</h2>
                    </div> --}}
                    <div class="ui items">
                        @foreach ($producto as $p)
                            @if ($p->carta_id == $c->id)
                                <div class="item">
                                    <div class="image">
                                        <img src="{{ asset($p->imagen) }}">
                                    </div>
                                    <div class="content">
                                        <a class="header">{{ $p->nombre }}</a>
                                        <div class="description">
                                            <p>{{ $p->descripcion }}</p>
                                        </div>
                                        <div class="extra">
                                            @if (auth()->check())
                                                <form action="{{ route('cart.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $p->id }}" name="producto_id"
                                                        id="producto_id">
                                                    <span class="right floated">
                                                        <button type="submit" class="ui green compact icon button">
                                                            <i class="shopping basket icon"></i>
                                                            Agregar
                                                        </button>
                                                    </span>
                                                </form>
                                            @else
                                                <span class="right floated">
                                                    <a href="{{ route('login.destroy') }}"
                                                        class="ui green compact icon button">
                                                        <i class="shopping basket icon"></i>
                                                        Agregar
                                                    </a>
                                                </span>
                                            @endif
                                            <div class="ui basic blue label">
                                                <i class="dollar sign icon"></i>
                                                {{ $p->precio }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
