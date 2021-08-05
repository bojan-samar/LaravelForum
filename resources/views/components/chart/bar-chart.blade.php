<div>
    <canvas id="{{ $chartId }}" style="max-height: 300px" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('{{ $chartId }}').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: '{{ $title }}',
                    barThickness: 10,
                    maxBarThickness: 25,
                    borderWidth: 2,
                    borderRadius: Number.MAX_VALUE,
                    borderSkipped: false,
                    data: {!! $chartData !!},
                    backgroundColor: ['#1f2937'],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        }
                    },
                }
            }
        });
    </script>
</div>
