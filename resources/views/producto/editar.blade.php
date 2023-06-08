@extends('layouts.view_admin')

@section('title', 'Producto')

@section('content')

    <div class="ui container">
        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Producto</h1>
            <form class="ui form" action="{{ route('updateBdProducto') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Producto: </label>
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
                        <div class="ui large black label">
                            <label for="">Precio Producto: </label>
                        </div>

                        <input type="number" name="precio" id="precio" min="1" max="500000"
                            value="{{ $update->precio }}">
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

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Carta Producto: </label>
                    </div>

                    <select name="carta_id" class="ui selection dropdown">
                        @foreach ($infocarta as $c)
                            <option value="{{ $c->id }}" @if ($c->id == $update->carta_id) selected @endif>
                                {{ $c->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <div class="ui segment">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="estado" id="estado" value="1"
                                {{ $update->estado ? 'checked' : '' }}>
                            <label>Estado Producto</label>
                        </div>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Descripcion Producto: </label>
                        </div>

                        <textarea name="descripcion" id="descripcion" rows="2">{{ $update->descripcion }}</textarea>
                        @error('descripcion')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese una descripcion</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Imagen Carta: </label>
                        </div>

                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <div class="ui tiny images">
                        <img src="{{ $update->imagen }}">
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