@extends('layouts.view_admin')

@section('title', 'Restuarante')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Restaurante</h1>
            <form class="ui form" action="{{ route('updateBdRestaurante') }}" enctype="multipart/form-data" method="post" id="restauranteForm">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Restaurante: </label>
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
                        <div class="ui large black label">
                            <label for="">Telefono Restaurante: </label>
                        </div>

                        <input type="number" name="telefono" id="telefono" value="{{ $update->telefono }}">
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
                            <label for="">Municipio Restaurante: </label>
                        </div>

                        <select name="municipio_id" class="ui selection dropdown">
                            @foreach ($municipio as $m)
                                <option value="{{ $m->id }}" @if ($m->id == $update->municipio_id) selected @endif>
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
                            <label for="">Dirección Restaurante: </label>
                        </div>

                        <input type="text" name="direccion" id="direccion" value="{{ $update->direccion }}">
                        @error('direccion')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese una dirección</p>
                                </div>
                            </div>
                        @enderror

                        <div class="field">
                            <div id="direccionError" class="ui mini negative message hidden">
                                <i class="close icon"></i>
                                <p>Por favor llene el campo dirección sin espacios en blanco</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fields">
                    <div class="three wide field"></div>
                    <div class="ten wide field">
                        <div class="ui large black label">
                            <label for="">Imagen Restaurante: </label>
                        </div>

                        <input type="file" name="imagen" id="imagen" value="{{ $update->imagen }}">
                    </div>
                    <div class="ui tiny images">
                        <img src="{{ $update->imagen }}">
                    </div>
                    <div class="three wide field"></div>
                </div>

                <div class="botones">
                    <button class="ui blue button" type="submit">
                        <i class="ui edit icon"></i>
                        Actualizar
                    </button>
                </div>
            </form>

            <div class="botones">
                <a href="{{ route('restaurante.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection
