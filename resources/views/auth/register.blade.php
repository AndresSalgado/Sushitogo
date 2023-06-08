@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="ui container">
        <form action="" method="POST" class="ui large form">
            @csrf

            <div class="ui middle aligned center aligned grid">
                <div class="column" style="max-width: 450px;">
                    <div class="ui stacked segment">
                        <div class="content">
                            <div class="header">
                                <h1>Registro</h1>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="ui left icon input">
                                <input type="text" placeholder="Nombre" id="name" name="name"
                                    pattern="^(?!\s).*$" title="No se permiten espacios en blanco"
                                    value="{{ old('name') }}">
                                <i class="user icon"></i>
                            </div>

                            @error('name')
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        <p>Por favor llene el campo nombre
                                        </p>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="ui left icon input">
                                <input type="number" placeholder="Telefono" id="telefono" name="telefono"
                                    value="{{ old('telefono') }}">
                                <i class="phone icon"></i>
                            </div>

                            @if ($errors->has('telefono'))
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        <p>Por favor, ingrese un número de teléfono entre 7 y 10 dígitos</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="field">
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
                                        <p>Por favor seleccione un municipio
                                        </p>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="ui left icon input">
                                <input type="text" placeholder="Dirección" id="direccion" name="direccion"
                                    pattern="^(?!\s).*$" title="No se permiten espacios en blanco"
                                    value="{{ old('direccion') }}">
                                <i class="map icon"></i>
                            </div>

                            @error('direccion')
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        <p>Por favor llene el campo direccion
                                        </p>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="ui left icon input">
                                <input type="email" placeholder="Correo Electronico" id="email" name="email"
                                    value="{{ old('email') }}">
                                <i class="envelope icon"></i>
                            </div>


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
                            <div class="ui icon input">
                                <!-- <i class="lock icon"></i> -->
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

                        <button class="ui blue submit button">Registrarme</button>
                    </div>

                    <div class="ui message">
                        ¿Ya estas registrado? <a href="{{ route('login.index') }}">Iniciar Sesion</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
