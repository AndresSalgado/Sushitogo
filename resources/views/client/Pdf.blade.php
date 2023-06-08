<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ui.container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .ui.raised.very.padded.segment {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        h3 {
            padding-left: 10px;
            padding-right: 10px;
        }

        table.ui.celled.table {
            width: 100%;
            border-collapse: collapse;
        }

        table.ui.celled.table th,
        table.ui.celled.table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table.ui.celled.table thead th {
            background-color: #f5f5f5;
        }


        table.ui.celled.table tfoot th:last-child {
            font-weight: bold;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-image {
            max-width: 200px;
        }
    </style>

</head>

<body>
    <div class="ui container">
        <div class="logo-container">
            <h1>Sushi To Go</h1>
        </div>
        <div class="ui raised very padded segment"
            style="background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
            <h3 style="text-align: center; margin-top: 0; margin-bottom: 0">Información del Cliente</h3>
            <div style="display: flex; flex-direction: column; align-items: center;">
                <p style="margin-bottom: 10px;"><strong>Nombre Cliente:</strong> {{ $Pedido->usuario->name }}</p>
                <p style="margin-bottom: 10px;"><strong>Email:</strong> {{ $Pedido->usuario->email }}</p>
            </div>
        </div>
        <br>
        <div class="ui raised very padded segment">
            <h3>
                Comprobante Pedido - {{ $Pedido->codigo }}
                <span style="float: right; color:rgb(119, 118, 118)">
                    Fecha: {{ $Pedido->created_at }}
                </span>
            </h3>
            <div class="ui very padded segment">
                <table class="ui celled table">
                    <thead>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Precio Total</th>
                    </thead>
                    <tbody>
                        @foreach ($Pedido->detalle as $d)
                            <tr>
                                <td>{{ $d->cantidad }}</td>
                                <td>{{ $d->producto->nombre }}</td>
                                <td>${{ $d->producto->precio }}</td>
                                <td>${{ $d->producto->precio * $d->cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"></th>
                            <th>SubTotal</th>
                            <th>${{ $Pedido->subtotal }}</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Precio Envío:</th>
                            <th>${{ $Pedido->usuario->municipio->PrecioEnvio }}</th>
                        </tr>
                        <tr>
                            <th colspan="2"></th>
                            <th>Total</th>
                            <th>${{ $Pedido->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
