<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-indigo-100 min-h-screen flex items-center justify-center py-12">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-8">
        <h1 class="text-3xl font-bold text-indigo-800 mb-8 text-center">Editar Usuario</h1>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $usuario->username) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('usuarios.index') }}"
                    class="px-5 py-2 bg-gray-400 text-white rounded-full hover:bg-gray-500 transition">Cancelar</a>

                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>

</body>

</html>
