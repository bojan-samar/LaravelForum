<div>
    <canvas id="{{ $chartId }}" style="max-height: 300px" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('{{ $chartId }}').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: '{{ $title }}',
                    data: {!! $chartData !!},
                    backgroundColor: ['#1f2937'],
                    borderColor: "#1f2937",
                    tension: 0.4,
                    fill: false,
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
