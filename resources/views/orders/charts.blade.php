<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Charts') }}
        </h2>
    </x-slot>

    <section class="mx-2 my-3">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Charts</h5>
        <canvas id="orderStatusChart"></canvas>
    </section>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Define color mapping for each status
            var statusColors = {
                'reject': 'rgba(255, 99, 132, 0.2)',
                'accept': 'rgba(75, 192, 192, 0.2)',
                'pending': 'rgba(255, 205, 86, 0.2)'
            };

            // Get the chart context
            var ctx = document.getElementById('orderStatusChart').getContext('2d');

            // Prepare data
            var labels = {!! json_encode($orderStatuses->keys()) !!};
            var data = {!! json_encode($orderStatuses->values()) !!};

            // Map labels to colors
            var backgroundColors = labels.map(status => statusColors[status] || 'rgba(0, 0, 0, 0.2)');
            var borderColors = labels.map(status => statusColors[status] || 'rgba(0, 0, 0, 1)');

            // Create the chart
            var orderStatusChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Order Statuses',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
