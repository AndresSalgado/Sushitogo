@extends('layouts.view_admin')

@section('title', 'Producto')

@section('content')


    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Crear Producto</h1>

            <form class="ui form" action="{{ route('InsertarProducto') }}" enctype="multipart/form-data" method="post"
                id="productoForm">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Producto: </label>
                        </div>

                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
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
                            <label for="">Precio Producto: </label>
                        </div>

                        <input type="number" min="1" max="500000" name="precio" id="precio"
                            value="{{ old('precio') }}">
                        @error('precio')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese un precio</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Carta Producto: </label>
                        </div>

                        <select name="carta_id" class="ui selection dropdown">
                            <option value="">Seleccione una Carta</option>
                            @foreach ($infocarta as $c)
                                <option value="{{ $c->id }}" @if (old('carta_id') == $c->id) selected @endif>
                                    {{ $c->nombre }}</option>
                            @endforeach
                        </select>
                        @error('carta_id')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor seleccione una carta</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Imagen Producto: </label>
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
                </div>

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Descripcion Producto: </label>
                    </div>

                    <textarea name="descripcion" id="descripcion" rows="2" pattern="^(?!\s).*$"
                        title="No se permiten espacios en blanco">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <div class="field">
                            <div class="ui mini negative message">
                                <i class="close icon"></i>
                                <p>* Por favor ingrese una descripcion</p>
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
                <a href="{{ route('producto.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection
