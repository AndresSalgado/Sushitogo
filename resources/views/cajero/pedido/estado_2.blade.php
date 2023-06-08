@extends('layouts.view_cajero')

@section('title', 'Cajero')

@section('content')

    <div class="ui container">

        <div class="ui segment" style="background-color: rgba(240, 240, 240, 0.791); padding: 100px;">
            <h1 style="text-align: center;">Actualizar Pedido</h1>
            <form class="ui form" action="{{ route('updatepedido') }}" method="post">
                @csrf

                <div class="field">
                    <div class="ui large black label">
                        <label for="">Código Pedido: </label>
                    </div>
                    <input type="hidden" name="id" value="{{ $pedido->id }}">
                    <input type="text" name="codigo" id="codigo" value="{{ $pedido->codigo }}">
                </div>

                <div class="field">
                    <div class="ui toggle checkbox">
                        <input type="hidden" name="estado_2" value="{{ $pedido->estado_2 }}">
                        <input type="checkbox" name="estado_proceso" id="estado_proceso" value="1"
                            {{ $pedido->estado_2 ? 'checked' : '' }}>
                        <label>Estado Pedido</label>
                    </div>
                </div>

                <div class="botones">
                    <button class="ui blue button" type="submit">
                        <i class="ui edit icon"></i>
                        Guardar
                    </button>
                </div>

            </form>

            <div class="botones">
                <a href="{{ route('pedido.index') }}">
                    <button class="ui grey button">
                        <i class="ui backward icon"></i>
                        Cancelar
                    </button>
                </a>
            </div>
        </div>

    </div>

@endsection
