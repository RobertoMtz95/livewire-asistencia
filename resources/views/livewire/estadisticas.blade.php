<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
    <h1 class="text-2xl font-bold text-gray-800">Estadisticas</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Grafica por colonia --}}
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-semibold mb-3">Asistentes por colonia</h3>
            <div wire:ignore>
                <canvas id="graficaColonia"></canvas>
            </div>
        </div>

        {{-- Grafica por rango de edad --}}
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-semibold mb-3">Asistentes por rango de edad</h3>
            <div wire:ignore>
                <canvas id="graficaEdad"></canvas>
            </div>
        </div>

    </div>
    
    @script
    <script>
        // Datos que vienen de PHP, convertidos a JS de forma segura
        const colonia = {
            labels: @js($coloniaLabels),
            data: @js($coloniaData),
        };
        const edad = {
            labels: @js($edadLabels),
            data: @js($edadData),
        };

        // Grafica de barras por colonia
        new Chart(document.getElementById('graficaColonia'), {
            type: 'bar',
            data: {
                labels: colonia.labels,
                datasets: [{ label: 'Asistentes', data: colonia.data, backgroundColor: '#4f46e5' }],
            },
            options: { responsive: true, plugins: { legend: {display: false} } },
        });

        // Grafica de dona por rango de edad
        new Chart(document.getElementById('graficaEdad'), {
            type: 'doughnut',
            data: {
                labels: edad.labels,
                datasets: [{ data: edad.data, backgroundColor: ['#4f46e5', '#16a34a', '#d97706', '#dc2626', '#0891b2'] }],
            },
            options: { responsive: true },
        });
    </script>
    @endscript
</div>
