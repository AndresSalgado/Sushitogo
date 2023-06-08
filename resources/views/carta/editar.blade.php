@extends('layouts.view_admin')

@section('title', 'Carta')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Carta</h1>
            <form class="ui form" action="{{ route('updateBdCarta') }}" method="post" id="cartaForm">
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

                    <div class="field">
                        <div id="nombreError" class="ui mini negative message hidden">
                            <i class="close icon"></i>
                            <p>Por favor llene el campo nombre sin espacios en blanco</p>
                        </div>
                    </div>
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

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(event) {
                var name = $('#nombre').val();
                if (name.trim() === '') {
                    $('#nombreError').addClass('hidden');
                    if ($('#nombre').is(':invalid')) {
                        $('#nombreError').removeClass('hidden');
                        event.preventDefault();
                    } else {
                        $('#nombreError').addClass('hidden');
                    }
                } else if (/^\s/.test(name)) {
                    $('#nombreError').removeClass('hidden');
                    event.preventDefault();
                } else {
                    $('#nombreError').addClass('hidden');
                }
            });
        });
    </script>

@endsection
