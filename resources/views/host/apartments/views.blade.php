@extends('layouts.app')

@section('content')
    <div class="container min-vh-100">
        <div class=" d-flex align-items-center justify-content-between py-3">
            <a class="" href="{{ route('host.apartments.index') }}"><button
                    class="btn btn-primary text-white rounded-circle fs-4">
                    <i class="fa-solid fa-arrow-left"></i></button>
            </a>
            <h1 class="text-center py-3"><span class="text-primary">Views Chart</span> - {{ $apartment->title }}</h1>
        </div>


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

        var labels = viewsData.labels.slice(-12).map(function(month, index) {
            var currentYear = new Date().getFullYear();
            var currentMonth = new Date().getMonth() + 1;
            var year = currentYear - (currentMonth >= month ? 0 : 1);

            return monthLabels[month - 1] + (year < currentYear ? ' (' + year + ')' : '');
        });

        var colors = viewsData.labels.slice(-12).map(function(month) {
            var currentYear = new Date().getFullYear();
            var currentMonth = new Date().getMonth() + 1;
            var year = currentYear - (currentMonth >= month ? 0 : 1);

            return year < currentYear ? 'rgba(54, 162, 235, 0.2)' : 'rgba(255, 99, 132, 0.2)';
        });

        var darkBlue = 'rgba(0, 0, 255, 1)';

        // Recupera il riferimento al canvas
        var ctx = document.getElementById("myChart").getContext("2d");

        // Crea il grafico
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: '',
                    data: viewsData.data.slice(-12),
                    backgroundColor: colors,
                    borderColor: colors.map(function(color) {
                        return color === 'rgba(255, 99, 132, 0.2)' ? 'rgba(255, 99, 132, 1)' :
                            color;
                    }),
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: false // Rimuove la legenda
                    }
                }
            },
        });
    </script>
@endpush
