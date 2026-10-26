<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    // campos que se pueden guardar con create()
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'ciudad',
        'colonia',
        'telefono',
    ];

    // Convierte fecha_nacimiento en un objeto Carbon (fechas)
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
        ];

    }

    // Accesos: $asistente->edad devuelve la edad en años
    public function getEdadAttribute(): int
    {
        return $this->fecha_nacimiento->age;
    }
}
