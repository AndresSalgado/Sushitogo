@extends('layouts.view_admin')

@section('title', 'Venta')

@section('content')

    <div class="ui container">
        <h1 id="titulo-estadisticas">Estadísticas de ventas por día durante el mes</h1>

        @if (session('success'))
            <div class="ui success message">
                <i class="close icon"></i>
                <div class="header">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="ui small horizontal divided list">
            <div class="item">
                <img src="{{ asset('Img/signodollar.png') }}" class="ui mini circular image">
                <div class="content">
                    <div class="ui header">Total de ventas en el mes:</div>
                    ${{ number_format($totalVentasMes) }}
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('Img/pedido.png') }}" class="ui mini circular image">
                <div class="content">
                    <div class="ui header">Total de pedidos en el mes:</div>
                    {{ $totalPedidosMes }}
                </div>
            </div>
            <div class="item">
                <form class="ui form" action="{{ route('estadisticas.ventas') }}" method="GET">
                    <div class="three fields">
                        <div class="field">
                            <label>Mes:</label>
                            <select class="ui fluid dropdown" name="mes">
                                <option value="1" {{ \Carbon\Carbon::now()->month == 1 ? 'selected' : '' }}>Enero
                                </option>
                                <option value="2" {{ \Carbon\Carbon::now()->month == 2 ? 'selected' : '' }}>Febrero
                                </option>
                                <option value="3" {{ \Carbon\Carbon::now()->month == 3 ? 'selected' : '' }}>Marzo
                                </option>
                                <option value="4" {{ \Carbon\Carbon::now()->month == 4 ? 'selected' : '' }}>Abril
                                </option>
                                <option value="5" {{ \Carbon\Carbon::now()->month == 5 ? 'selected' : '' }}>Mayo
                                </option>
                                <option value="6" {{ \Carbon\Carbon::now()->month == 6 ? 'selected' : '' }}>Junio
                                </option>
                                <option value="7" {{ \Carbon\Carbon::now()->month == 7 ? 'selected' : '' }}>Julio
                                </option>
                                <option value="8" {{ \Carbon\Carbon::now()->month == 8 ? 'selected' : '' }}>Agosto
                                </option>
                                <option value="9" {{ \Carbon\Carbon::now()->month == 9 ? 'selected' : '' }}>Septiembre
                                </option>
                                <option value="10" {{ \Carbon\Carbon::now()->month == 10 ? 'selected' : '' }}>Octubre
                                </option>
                                <option value="11" {{ \Carbon\Carbon::now()->month == 11 ? 'selected' : '' }}>Noviembre
                                </option>
                                <option value="12" {{ \Carbon\Carbon::now()->month == 12 ? 'selected' : '' }}>Diciembre
                                </option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Año:</label>
                            <input type="number" name="anio" value="{{ \Carbon\Carbon::now()->format('Y') }}">
                        </div>
                        <div class="field">
                            <label style="color: rgba(255, 255, 255, 0)">boton</label>
                            <button type="submit" class="ui blue button">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ui statistics">
            <canvas id="ventasChart" width="400" height="200"></canvas>
        </div>
        <br><br><br><br><br>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('ventasChart').getContext('2d');

            var labels = {!! json_encode($estadisticas->keys()) !!};
            var data = {!! json_encode($estadisticas->pluck('totalVentas')) !!};
            var cantidadPedidos = {!! json_encode($estadisticas->pluck('cantidadPedidos')) !!};

            var ventasChart;

            var toggleChart = function(chartType) {
                if (ventasChart) {
                    ventasChart.destroy();
                }

                var datasets = [];

                if (chartType === 'ventas') {
                    datasets.push({
                        label: 'Total de ventas en el día',
                        data: data,
                        backgroundColor: 'rgba(128, 128, 128, 0.2)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 1
                    });
                    document.getElementById('titulo-estadisticas').textContent =
                        'Estadísticas de ventas por día durante el mes';
                } else if (chartType === 'pedidos') {
                    datasets.push({
                        label: 'Cantidad de pedidos realizados en el día',
                        data: cantidadPedidos,
                        backgroundColor: 'rgba(128, 128, 128, 0.2)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 1
                    });
                    document.getElementById('titulo-estadisticas').textContent =
                        'Estadísticas de pedidos por día durante el mes';
                }

                ventasChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }
                    }
                });
            };

            toggleChart('ventas'); // Mostrar gráfica de ventas por defecto

            // Evento de cambio de gráfica
            var toggleButtons = document.querySelectorAll('.toggle-button');

            toggleButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var chartType = event.target.dataset.chartType;
                    toggleChart(chartType);
                });
            });
        });
    </script>

    <div class="ui buttons" style="float: right">
        <button class="ui button green toggle-button" data-chart-type="ventas">Total de ventas</button>
        <button class="ui button orange toggle-button" data-chart-type="pedidos">Cantidad de pedidos</button>
        <form id="reiniciar-form" action="{{ route('estadisticas.reiniciar') }}" method="POST">
            @csrf
            <button type="submit" class="ui button red" onclick="mostrarConfirmacion(event)">
                Reiniciar estadísticas
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function mostrarConfirmacion(event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Se reiniciarán las estadísticas. Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, reiniciar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reiniciar-form').submit();
                } else {
                    Swal.fire('Las estadísticas no se han reiniciado.', '', 'info');
                }
            });
        }
    </script>

@endsection
