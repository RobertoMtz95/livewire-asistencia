<div class="max-w-xl mx-auto bg-white rounded-2xl shadow-sm p-8">
    
    <h1 class="text-2xl font-bold text-gray-800 mb-1">
        Registro de asistencia
    </h1>
    <p class="text-sm text-gray-500 mb-6">
        Captura tus datos para registrar tu asistencia
    </p>

    {{-- Mensaje de exito --}}
    @if (session('ok'))
        <div class="mb-5 p-3 rounded-lg bg-green-100 text-green-800 text-sm">
            {{ session('ok') }}
        </div>
    @endif

    <form wire:submit="registrar" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input wire:model="nombre" type="text" class="mt-1 w-full rounded-lg border-gray-300">
            @error('nombre')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Apellido paterno</label>
            <input wire:model="apellido_paterno" type="text" class="mt-1 w-full rounded-lg border-gray-300">
            @error('apellido_paterno')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Apellido materno</label>
            <input wire:model="apellido_materno" type="text" class="mt-1 w-full rounded-lg border-gray-300">
            @error('apellido_materno')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input wire:model="fecha_nacimiento" type="date" class="mt-1 w-full rounded-lg border-gray-300">
            @error('fecha_nacimiento')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Ciudad</label>
            <input wire:model="ciudad" type="text" class="mt-1 w-full rounded-lg border-gray-300">
            @error('ciudad')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Colonia</label>
            <input wire:model="colonia" type="text" class="mt-1 w-full rounded-lg border-gray-300">
            @error('colonia')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input wire:model.blur="telefono" type="tel" inputmode="numeric" placeholder="10 dígitos" class="mt-1 w-full rounded-lg border-gray-300">
            @error('telefono')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <button type="submit" class="w-full py-2.5 bg-indigo-600 text-white">
                <span wire:loading.remove wire:target="registrar">Registrar asistencia</span>
                <span wire:loading wire:target="registrar">Guardando...</span>
            </button>
        </div>

    </form>

</div>
