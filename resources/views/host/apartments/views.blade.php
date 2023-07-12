@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Views Chart - {{ $apartment->title }}</h1>

        <canvas id="myChart"></canvas>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/views.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var monthLabels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        var viewsData = {!! json_encode($viewsData) !!};

        var labels = viewsData.labels.map(function(month) {
            return monthLabels[month - 1];
        });

        // Recupera il riferimento al canvas
        var ctx = document.getElementById("myChart").getContext("2d");

        // Crea il grafico
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Views",
                    data: viewsData.data,
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: "rgba(255, 99, 132, 1)",
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
@endpush
