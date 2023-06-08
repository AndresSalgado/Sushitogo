@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

    <div class="ui container">
        <div class="ui segment" style="text-align: center;">
            <div class="ui segments">
                <div class="ui segment">
                    <h1>Confirmacion del Pedido</h1>
                </div>
                <div class="ui secondary segment">
                    <h4>
                        Se ha procesado el pedido, con el codigo: <span style="color: #000">"{{ $pedido }}"</span> con éxito.
                    </h4>
                </div>
            </div>
            <i class="massive mobile alternate icon"></i>
        </div>
    </div>

@endsection
