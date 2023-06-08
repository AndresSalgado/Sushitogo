@extends('layouts.view_admin')

@section('title', 'Carta')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Crear Carta</h1>

            <form class="ui form" action="{{ route('InsertarCarta') }}" method="post">
                @csrf

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Nombre Carta: </label>
                    </div>

                    <input type="text" name="nombre" id="nombre" pattern="^(?!\s).*$"
                        title="No se permiten espacios en blanco">
                    @error('nombre')
                        <div class="field">
                            <div class="ui mini negative message">
                                <i class="close icon"></i>
                                <p>* Por favor ingrese un nombre</p>
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="botones">
                    <button class="ui blue button" type="submit">
                        <i class="ui save icon"></i>
                        Guardar
                    </button>
                </div>

            </form>

            <div class="botones">
                <a href="{{ route('carta.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection
