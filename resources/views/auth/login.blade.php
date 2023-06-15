@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="ui container">
        @if (session('status'))
            <div class="ui mini success message" style="margin-left: 30%; margin-right: 30%">
                <i class="close icon"></i>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <form action="" method="POST" class="ui large form">
            @csrf

            <div class="ui middle aligned center aligned grid">
                <div class="column" style="max-width: 450px;">
                    <div class="ui stacked segment">
                        <div class="content">
                            <div class="header">
                                <h1>Iniciar Sesión</h1>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="email" name="email" id="email" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui icon input">
                                <!-- <i class="lock icon"></i> -->
                                <input type="password" name="password" id="password" placeholder="Contraseña">
                                <i class="inverted circular eye link icon" onclick="MostrarPassword()"></i>
                            </div>
                        </div>

                        @error('message')
                            <div class="field">
                                <div class="ui mini negative message">
                                    <i class="close icon"></i>
                                    <p>
                                        Los datos no coinciden, asegurate que el correo y la contraseña esten correctos.
                                    </p>
                                </div>
                            </div>
                        @enderror

                        <button class="ui blue submit button">
                            Acceder
                        </button>
                    </div>
                    <div class="ui message">
                        <div class="ui list">
                        <div class="item">
                                ¿Estás registrado?
                                <a href="{{ route('register.index') }}">
                                    Registrarme
                                </a>
                            </div>
                            <div class="item">
                                ¿Has olvidado tu contraseña?
                                <a href="{{ route('password.request') }}">
                                    Recuperar contraseña
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
