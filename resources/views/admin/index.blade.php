@extends('layouts.view_admin')

@section('title', 'Admin')

@section('content')

    <br><br><br><br><br>
    <div class="ui container">
        <div style="text-align: center;margin-left:40px" class="ui small images">
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('usuario.index') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Usuarios</div>
                    <i class="massive user black icon"></i>
                </a>
            </div>
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('carta.index') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Cartas</div>
                    <i class="massive clipboard list black icon"></i>
                </a>
            </div>
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('producto.index') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Productos</div>
                    <i class="massive boxes black icon"></i>
                </a>
            </div>
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('restaurante.index') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Restaurantes</div>
                    <i class="massive warehouse black icon"></i>
                </a>
            </div>
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('municipio.index') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Municipios</div>
                    <i class="massive building black icon"></i>
                </a>
            </div>
            <div class="ui fluid image" style="margin-right: 20px">
                <a href="{{ route('view.venta') }}">
                    <div class="ui basic bottom attached label" style="color: black;">Ventas</div>
                    <i class="massive dollar sign black icon"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
