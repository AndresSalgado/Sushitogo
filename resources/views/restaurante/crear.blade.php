@extends('layouts.view_admin')

@section('title', 'Restaurante')

@section('content')


    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Crear Restaurante</h1>

            <form class="ui form" action="{{ route('InsertarRestaurante') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Restaurante: </label>
                        </div>

                        <input type="text" name="nombre" id="nombre" pattern="^(?!\s).*$"
                            title="No se permiten espacios en blanco" value="{{ old('nombre') }}">
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
                        <div class="ui large black label">
                            <label for="">Telefono Restaurante: </label>
                        </div>

                        <input type="number" name="telefono" id="telefono" value="{{ old('telefono') }}">
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
                            <option value="">Seleccione un Municipio</option>
                            @foreach ($municipio as $m)
                                <option value="{{ $m->id }}" @if (old('municipio_id') == $m->id) selected @endif>
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
                            <label for="">Direccion Restaurante: </label>
                        </div>

                        <input type="text" name="direccion" id="direccion" pattern="^(?!\s).*$"
                            title="No se permiten espacios en blanco" value="{{ old('direccion') }}">
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
                            <label for="">Imagen Restaurante: </label>
                        </div>

                        <input type="file" name="imagen" id="imagen" accept="image/*">
                        @error('imagen')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese una imagen</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="three wide field"></div>
                </div>

                <div class="botones">
                    <button class="ui blue button" type="submit">
                        <i class="ui save icon"></i>
                        Guardar
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

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#imagen').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.tarjet.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script> --}}

@endsection
