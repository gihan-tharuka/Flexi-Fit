<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <h2 class="text-lg font-semibold">Weekly Exercise Progress</h2>

            @if($exerciseProgress)
                <div x-data="{ data: @entangle('exerciseProgress') }">
                    <canvas id="exerciseChart" width="400" height="200"></canvas>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const ctx = document.getElementById('exerciseChart').getContext('2d');

                            const labels = Object.keys(data[Object.keys(data)[0]]);
                            const datasets = [];

                            for (const [exercise, progress] of Object.entries(data)) {
                                datasets.push({
                                    label: exercise,
                                    data: labels.map(label => progress[label] || 0),
                                    fill: false,
                                    borderColor: getRandomColor(),
                                    tension: 0.1
                                });
                            }

                            new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: labels,
                                    datasets: datasets
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            display: true,
                                        },
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                        },
                                    },
                                }
                            });

                            function getRandomColor() {
                                const letters = '0123456789ABCDEF';
                                let color = '#';
                                for (let i = 0; i < 6; i++) {
                                    color += letters[Math.floor(Math.random() * 16)];
                                }
                                return color;
                            }
                        });
                    </script>
                </div>
            @else
                <p>No workout data available for this week.</p>
            @endif
        </div>

    </x-filament::section>
</x-filament-widgets::widget>
