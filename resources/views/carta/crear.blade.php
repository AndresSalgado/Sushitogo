@extends('layouts.view_admin')

@section('title', 'Carta')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Crear Carta</h1>

            <form class="ui form" action="{{ route('InsertarCarta') }}" method="post" id="cartaForm">
                @csrf

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Nombre Carta: </label>
                    </div>

                    <input type="text" name="nombre" id="nombre">

                    @error('nombre')
                        <div class="field">
                            <div class="ui mini negative message">
                                <i class="close icon"></i>
                                <p>* Por favor ingrese un nombre</p>
                            </div>
                        </div>
                    @enderror

                    <div class="field">
                        <div id="nombreError" class="ui mini negative message hidden">
                            <i class="close icon"></i>
                            <p>Por favor llene el campo nombre sin espacios en blanco</p>
                        </div>
                    </div>
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
