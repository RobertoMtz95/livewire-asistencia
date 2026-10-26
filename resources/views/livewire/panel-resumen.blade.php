<div wire:poll.30s class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Total registrados</p>
        <p class="text-3xl font-bold text-indigo-600">{{ $total }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Registrados hoy</p>
        <p class="text-3xl font-bold text-indigo-600">{{ $hoy }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Colonias distintas</p>
        <p class="text-3xl font-bold text-indigo-600">{{ $colonias }}</p>
    </div>
</div>
