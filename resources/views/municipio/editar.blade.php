@extends('layouts.view_admin')

@section('title', 'Municipio')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Municipio</h1>
            <form class="ui form" action="{{ route('updateBdMunicipio') }}" method="post">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Municipio: </label>
                        </div>

                        <input type="hidden" name="id" value="{{ $update->id }}">
                        <input type="text" name="NombreMunicipio" id="NombreMunicipio"
                            value="{{ $update->NombreMunicipio }}">
                        @error('NombreMunicipio')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese un Municipio</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Precio Envío: </label>
                        </div>

                        <input type="number" name="PrecioEnvio" id="PrecioEnvio" value="{{ $update->PrecioEnvio }}">
                        @error('PrecioEnvio')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese un precio para el envío</p>
                                </div>
                            </div>
                        @enderror
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
                <a href="{{ route('municipio.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>

        </div>


    </div>

@endsection
