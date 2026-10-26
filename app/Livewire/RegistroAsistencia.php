<?php

namespace App\Livewire;

// Modelo
use App\Models\Asistente;
use Livewire\Component;
use Livewire\Attributes\Validate;

#[Layout('layouts.guest')] // Layout publico de Breeze
class RegistroAsistencia extends Component
{
    // Una pripiedad por campo del formulario
    #[Validate('required|string|min:2|max:60')]
    public string $nombre = '';

    #[Validate('required|string|min:2|max:60')]
    public string $apellido_paterno = '';

    #[Validate('nullable|string|max:60')]
    public string $apellido_materno = '';

    #[Validate('required|date|before:today')]
    public string $fecha_nacimiento = '';

    #[Validate('required|string|max:80')]
    public string $ciudad = '';

    #[Validate('required|string|max:80')]
    public string $colonia = '';

    // Regla clave: unique
    #[Validate('required|digits_between:10,15|unique:asistentes,telefono')]
    public string $telefono = '';

    // Mensajes en español
    protected function messages(): array
    {
        return [
            'telefono.unique' => 'Este teléfono ya fue registrado.',
            'telefono.digits_between' => 'El teléfono debe tener entre 10 y 15 digitos',
            'fecha_nacimiento.before' => 'La fecha de nacimiento no es válida',
        ];
    }

    public function registrar()
    {
        // Validar TODO
        $datos = $this->validate();

        try {Asistente::create($datos);
        } catch (QueryException $e) {
            $this->addError('telefono', 'Ese teléfono acaba de ser registrado.');
            return;
        }

        // Limpiar formulario para el siguiente asistente
        $this->reset();

        // Mensajes de exito y aviso para que el panel se actualice
        session()->flash('ok', '¡Registro exitoso! Gracias por asistir.');
        $this->dispatch('asistente-registrado');
    }

    public function render()
    {
        return view('livewire.registro-asistencia');
    }
}
