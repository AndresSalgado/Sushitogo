@extends('layouts.view_admin')

@section('title', 'Carta')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Carta</h1>
            <form class="ui form" action="{{ route('updateBdCarta') }}" method="post">
                @csrf

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Nombre Carta: </label>
                    </div>

                    <input type="hidden" name="id" value="{{ $update->id }}">
                    <input type="text" name="nombre" id="nombre" value="{{ $update->nombre }}">
                    @error('nombre')
                        <div class="field">
                            <div class="ui mini negative message">
                                <i class="close icon"></i>
                                <p>* Por favor ingrese un nombre</p>
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <div class="ui segment">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="estado" id="estado" value="1"
                                {{ $update->estado ? 'checked' : '' }}>
                            <label>Estado Carta</label>
                        </div>
                    </div>
                </div>

                <div class="botones">
                    <button class="ui blue button" type="submit">
                        <i class="ui edit icon"></i>
                        Actualizar
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
