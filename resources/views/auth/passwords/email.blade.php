@extends('layouts.app')

@section('title', 'Cambiar Contraseña')

@section('content')

    <div class="ui container">
        @error('email')
            <div class="ui mini warning message" style="margin-left: 30%; margin-right: 30%">
                <i class="close icon"></i>
                <div class="content">
                    {{ $message }}
                </div>
            </div>
        @enderror
        <form class="ui form" method="POST" action="{{ route('password.email') }}">
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
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input id="email" type="email" class="@error('email') error @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Correo Electrónico">
                            </div>
                            @if (session('status'))
                                <div class="ui mini positive message">
                                    <i class="close icon"></i>
                                    <div class="content">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            @endif

                        </div>
                        <button class="ui blue submit button">
                            Enviar Link
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
