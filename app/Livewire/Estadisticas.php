<?php

namespace App\Livewire;

// Modelo
use App\Models\Asistente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] // layout autenticado de Breeze
class Estadisticas extends Component
{
    public function render()
    {
        // Asistentes por colonia
        $porColonia = Asistente::select('colonia', DB::raw('COUNT(*) as total'))
            ->groupBy('colonia')
            ->orderByDesc('total')
            ->get();

        // Asistentes por rango de edad
        $rangos = [
            '0-17' => 0, '18-25' =>0, '26-35' => 0,
            '36-50' => 0, '51+' =>0,
        ];

        foreach (Asistente::all() as $a){
            $edad = $a->edad; // usa el accesor del modelo
            match (true) {
                $edad <= 17 => $rangos['0-17']++,
                $edad <= 25 => $rangos['18-25']++,
                $edad <= 35 => $rangos['26-35']++,
                $edad <= 50 => $rangos['36-50']++,
                default => $rangos['51+']++,
            };
        }

        return view('livewire.estadisticas', [
            'coloniaLabels' => $porColonia->pluck('colonia'),
            'coloniaData' => $porColonia->pluck('total'),
            'edadLabels' => array_keys($rangos),
            'edadData' => array_values($rangos),
        ]);
    }
}
