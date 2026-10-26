<?php

namespace App\Livewire;

// Modelo
use App\Models\Asistente;
use Livewire\Component;
use Livewire\Attributes\On;

class PanelResumen extends Component
{
    // Cuando llega un registro nuevo, se vuelve a renderizar
    #[On('asistente-registrado')]
    public function refrescar() {}

    public function render()
    {
        return view('livewire.panel-resumen', [
            'total' => Asistente::count(),
            'hoy' => Asistente::whereDate('created_at', today())->count(),
            'colonias' => Asistente::distinct('colonia')->count('colonia'),
        ]);
    }
}
