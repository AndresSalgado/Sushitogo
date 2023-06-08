@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="ui container">
        <form action="" method="POST" class="ui large form" id="myForm">
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

                            <div class="field">
                                <div id="nameError" class="ui mini negative message hidden">
                                    <i class="close icon"></i>
                                    <p>Por favor llene el campo nombre sin espacios en blanco</p>
                                </div>
                            </div>
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
                                    value="{{ old('direccion') }}">
                                <i class="map icon"></i>
                            </div>

                            @error('direccion')
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        <p>Por favor llene el campo dirección
                                        </p>
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

                        <div class="field">
                            <div class="ui left icon input">
                                <input type="email" placeholder="Correo Electrónico" id="email" name="email"
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
                                    value="{{ old('password') }}">
                                <i class="inverted circular eye link icon" onclick="MostrarPassword()"></i>
                            </div>

                            @error('password')
                                <div class="field">
                                    <div class="ui mini negative message">
                                        <i class="close icon"></i>
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror

                            <div class="field">
                                <div id="passwordError" class="ui mini negative message hidden">
                                    <i class="close icon"></i>
                                    <p>Por favor llene el campo contraseña sin espacios en blanco</p>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="ui icon input">
                                <input type="password" placeholder="Confirmar Contraseña" id="password-confirm" name="password_confirmation">
                                <i class="inverted circular eye link icon" onclick="MostrarPasswordConfirm()"></i>
                            </div>
                        </div>

                        <button class="ui blue submit button">Registrarme</button>
                    </div>

                    <div class="ui message">
                        ¿Ya estás registrado? <a href="{{ route('login.index') }}">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
