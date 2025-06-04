<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-indigo-100 min-h-screen font-sans flex items-center justify-center py-12">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-10">
        <h1 class="text-3xl font-bold text-center text-indigo-800 mb-8">Crear Nuevo Usuario</h1>

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="id" class="block text-sm font-semibold text-gray-700">ID</label>
                <input type="number" name="id" id="id" required
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label for="nombre" class="block text-sm font-semibold text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" required
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('usuarios.index') }}"
                   class="text-indigo-600 hover:underline text-sm font-medium">
                    ← Volver a la lista
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-full shadow hover:bg-indigo-700 transition">
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>

</body>
</html>
