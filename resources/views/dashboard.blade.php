<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de asistencia
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            {{-- Tarjetas de resumen --}}
            <livewire:panel-resumen />

            {{-- Aceeso a estadisticas --}}
            <a href="{{ route('estadisticas') }}" wire:navigate class="inline-block px-5 py-2.5 bg-indigo-600 text-white rounded-lg">
                Ver estadisticas ->
            </a>
        </div>
    </div>
</x-app-layout>
