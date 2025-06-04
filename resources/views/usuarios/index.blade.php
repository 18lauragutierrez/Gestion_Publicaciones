<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-indigo-100 min-h-screen font-sans flex items-center justify-center py-12">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl p-10">
        
        <div class="mb-6">
            <a href="{{ route('publicaciones.index') }}"
                class="inline-block px-5 py-2 bg-indigo-500 text-white font-semibold rounded-full shadow hover:bg-indigo-700 transition">
                ← Regresar a publicaciones
            </a>
        </div>

        <h1 class="text-3xl font-bold text-center text-indigo-800 mb-8">Lista de Usuarios</h1>

        <div class="flex justify-end mb-6 gap-4">
            <a href="{{ route('usuarios.create') }}"
                class="px-5 py-2 bg-green-500 text-white font-semibold rounded-full shadow hover:bg-green-700 transition">
                + Añadir usuario
            </a>
        </div>

        <ul class="space-y-8">
            @foreach($usuarios as $usuario)
            <li
                class="flex flex-col md:flex-row justify-between items-start gap-6 bg-slate-50 border border-indigo-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="w-full md:w-2/3">
                    <div class="text-2xl font-bold text-indigo-800 mb-2">{{ $usuario->nombre }}</div>
                    <div class="text-gray-700 mb-3 text-justify leading-relaxed tracking-wide text-base">
                        <strong>Username:</strong> {{ $usuario->username }}
                    </div>
                    <div class="text-sm text-gray-500 italic mb-4">ID: {{ $usuario->id }}</div>

                    <div class="flex gap-3">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                            class="px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-semibold rounded-full shadow transition">
                            Editar
                        </a>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold rounded-full shadow transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</body>

</html>
