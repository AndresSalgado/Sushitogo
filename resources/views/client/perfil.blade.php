@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

    <div class="ui container">
        @if (session('success'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="ui segment" style="background-color: rgba(255, 255, 255, 0.791); padding: 100px;">
            <h1 class="titulo">Mi Perfil</h1>
            @if (Auth::check())
                <form class="ui form" action="{{ route('perfil.actualizar') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="two fields">
                        <div class="field">
                            <div class="ui large black label">
                                <label for="">Nombre Usuario: </label>
                            </div>

                            <input type="hidden" name="id" value="{{ $update->id }}">
                            <input type="text" name="name" id="name" value="{{ $update->name }}"
                                pattern="^(?!\s).*$" title="No se permiten espacios en blanco">
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

                    <div class="fields">
                        <div class="twelve wide field">
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
                                    <div class="ui negative message">
                                        <i class="close icon"></i>
                                        <p>* Por favor seleccione un municipio</p>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="field">
                            <div class="ui large black label">
                                <label for="">Direccion: </label>
                            </div>

                            <input type="text" name="direccion" id="direccion" value="{{ $update->direccion }}"
                                pattern="^(?!\s).*$" title="No se permiten espacios en blanco">
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

                            <input type="email" placeholder="Correo Electronico" id="email" name="email"
                                value="{{ $update->email }}">

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
                                <input type="password" name="password" id="password" pattern="^(?!\s).*$"
                                    title="No se permiten espacios en blanco">
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
                            <i class="ui edit icon"></i>
                            Actualizar
                        </button>
                    </div>

                </form>
            @else
                <div class="ui info message">
                    <div class="header">
                        No haz Iniciado Sesion
                    </div>
                    <div class="content">
                        <p>Debe iniciar sesión para ver su perfil</p>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
