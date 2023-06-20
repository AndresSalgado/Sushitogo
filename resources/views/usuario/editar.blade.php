@extends('layouts.view_admin')

@section('title', 'Usuario')

@section('content')

    <div class="ui container">
        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 class="titulo">Actualizar Usuario</h1>
            <form class="ui form" action="{{ route('updateBdUsuario') }}" method="post" id="myForm">
                @csrf

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Nombre Usuario: </label>
                        </div>

                        <input type="hidden" name="id" value="{{ $update->id }}">
                        <input type="text" name="name" id="name" value="{{ $update->name }}">
                        @error('name')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>* Por favor ingrese un nombre</p>
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
                        <div class="ui large black label">
                            <label for="">Número Teléfono: </label>
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
                            <label for="">Municipio Usuario: </label>
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
                            <label for="">Rol Usuario: </label>
                        </div>

                        <select name="role_id" class="ui selection dropdown" @if ($user->id == $restrictedUserId) disabled @endif>
                            @foreach ($role as $r)
                                <option value="{{ $r->id }}" @if ($r->id == $update->role_id) selected @endif>
                                    {{ $r->NombreRole }}
                                </option>
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
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Dirección: </label>
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

                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Email: </label>
                        </div>

                        <input type="email" id="email" name="email" value="{{ $update->email }}">

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
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui large black label">
                            <label for="">Contraseña: </label>
                        </div>

                        <div class="ui icon input">
                            <input type="password" name="password" id="password">
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
                        <div class="ui large black label">
                            <label for="">Confirmar Contraseña: </label>
                        </div>

                        <div class="ui icon input">
                            <input type="password" id="password-confirm" name="password_confirmation">
                            <i class="inverted circular eye link icon" onclick="MostrarPasswordConfirm()"></i>
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
