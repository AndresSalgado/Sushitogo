@extends('layouts.app')

@section('title', 'Restaurante')

@section('content')

    <div class="ui container">
        <div class="ui raised segment">
            <div class="caja4">
                <div class="ui link cards">
                    @foreach ($restaurante as $r)
                        <div class="card">
                            <div class="image">
                                <img src="{{ asset($r->imagen) }}">
                            </div>
                            <div class="content">
                                <span class="right floated">
                                    <i class="icon building"></i>
                                    {{ $r->municipio->NombreMunicipio }}
                                </span>
                                <div class="header">{{ $r->nombre }}</div>
                            </div>
                            <div class="extra content">
                                <span class="right floated">
                                    <i class="phone icon"></i>
                                    {{ $r->telefono }}
                                </span>
                                <span>
                                    <i class="map icon"></i>
                                    {{ $r->direccion }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="caja5">
                <div class="ui items">
                    @foreach ($restaurante as $r)
                        <div class="item">
                            <div class="image">
                                <img src="{{ asset($r->imagen) }}">
                            </div>
                            <div class="content">
                                <a class="header">{{ $r->nombre }}</a>
                                <div class="meta">
                                    <span>
                                        <i class="phone icon"></i>
                                        {{ $r->telefono }}
                                    </span>
                                </div>
                                <div class="meta">
                                    <span>
                                        <i class="map icon"></i>
                                        {{ $r->direccion }}
                                    </span>
                                </div>
                                <div class="description">
                                    <i class="icon building"></i>
                                    {{ $r->municipio->NombreMunicipio }}
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
