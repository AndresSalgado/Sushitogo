@extends('layouts.view_admin')

@section('title', 'Usuario')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Crear Usuario</h1>

            <form class="ui form" action="{{ route('InsertarUsuario') }}" method="post">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Usuario: </label>
                        </div>

                        <input type="text" name="name" id="name" pattern="^(?!\s).*$"
                            title="No se permiten espacios en blanco" value="{{ old('name') }}">
                        @error('name')
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
                            <label for="">Numero Telefono: </label>
                        </div>

                        <input type="tel" name="telefono" id="telefono" value="{{ old('telefono') }}">
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

                <div class="three fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Municipio Usuario: </label>
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
                            <label for="">Rol Usuario: </label>
                        </div>

                        <select name="role_id" class="ui selection dropdown">
                            <option value="">Seleccione un Rol</option>
                            @foreach ($role as $r)
                                <option value="{{ $r->id }}" @if (old('role_id') == $r->id) selected @endif>
                                    {{ $r->NombreRole }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor seleccione un rol</p>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Direccion: </label>
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

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Email: </label>
                        </div>

                        <input type="email" name="email" id="email" pattern="^(?!\s).*$"
                            title="No se permiten espacios en blanco" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            @if ($errors->first('email') == 'Este correo electrónico ya está en uso')
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            @else
                                @if ($errors->has('email'))
                                    <div class="field">
                                        <div class="ui mini negative message">
                                            <i class="close icon"></i>
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif

                    </div>

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Contraseña: </label>
                        </div>

                        <div class="ui icon input">
                            <input type="password" placeholder="Contraseña" id="password" name="password"
                                pattern="^(?!\s).*$" title="No se permiten espacios en blanco"
                                value="{{ old('password') }}">
                            <i class="inverted circular eye link icon" onclick="MostrarPassword()"></i>
                        </div>
                        @if ($errors->has('password'))
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>La contraseña debe tener entre 8 y 16 caracteres.</p>
                                </div>
                            </div>
                        @endif
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
                <a href="{{ route('usuario.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection
