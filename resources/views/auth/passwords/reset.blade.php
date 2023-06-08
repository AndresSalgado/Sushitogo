@extends('layouts.app')

@section('title', 'Cambiar Contraseña')

@section('content')

    <div class="ui container">
        @error('email')
            <div class="ui mini warning message" style="margin-left: 30%; margin-right: 30%">
                <i class="close icon"></i>
                <div class="header">
                    {{ $message }}
                </div>
            </div>
        @enderror
        @error('password')
            <div class="ui mini warning message" style="margin-left: 30%; margin-right: 30%">
                <i class="close icon"></i>
                <div class="header">
                    {{ $message }}
                </div>
            </div>
        @enderror

        <form class="ui form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="ui middle aligned center aligned grid">
                <div class="column" style="max-width: 450px;">
                    <div class="ui stacked segment">
                        <div class="content">
                            <div class="header">
                                <h1>Cambiar Contraseña</h1>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="field">
                            <input id="email" type="email" class="@error('email') error @enderror" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                placeholder="Correo Electronico">
                        </div>

                        <div class="field">
                            <div class="ui icon input">
                                <input id="password" type="password" class="@error('password') error @enderror"
                                    name="password" required autocomplete="new-password" placeholder="Contraseña">
                                <i class="inverted circular eye link icon" onclick="MostrarPassword()"></i>
                            </div>
                        </div>

                        <div class="field">
                            <div class="ui icon input">
                                <input id="password-confirm" type="password" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Confirmar Contraseña">
                                <i class="inverted circular eye link icon" onclick="MostrarPasswordConfirm()"></i>
                            </div>
                        </div>

                        <button class="ui blue submit button">
                            Restablecer Contraseña
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
