<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Publicaciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-indigo-100 min-h-screen font-sans flex items-center justify-center py-12">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl p-10">
        <h1 class="text-3xl font-bold text-center text-indigo-800 mb-8">Lista de Publicaciones</h1>

        <div class="flex justify-end mb-6 gap-4">
            <a href="{{ route('publicaciones.create') }}"
                class="px-5 py-2 bg-indigo-500 text-white font-semibold rounded-full shadow hover:bg-indigo-700 transition">
                + Crear nueva publicación
            </a>
            <a href="{{ route('usuarios.create') }}"
                class="px-5 py-2 bg-green-500 text-white font-semibold rounded-full shadow hover:bg-green-700 transition">
                + Añadir usuario
            </a>
        </div>

        <ul class="space-y-8">
            @foreach($publicaciones as $publicacion)
            <li class="flex flex-col md:flex-row justify-between items-start gap-6 bg-slate-50 border border-indigo-100 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="w-full md:w-2/3">
                    <div class="text-2xl font-bold text-indigo-800 mb-2">{{ $publicacion->titulo }}</div>
                    <div class="text-gray-700 mb-3 text-justify leading-relaxed tracking-wide text-base">
                        {{ $publicacion->cuerpo }}
                    </div>
                    <div class="text-sm text-gray-500 italic mb-4">Usuario ID: {{ $publicacion->usuario_id }}</div>
                    <div class="flex gap-3">
                        <a href="{{ route('publicaciones.edit', $publicacion->id) }}"
                            class="px-4 py-2 bg-indigo-400 hover:bg-indigo-500 text-white text-sm font-semibold rounded-full shadow transition">
                            Editar
                        </a>

                        <form action="{{ route('publicaciones.destroy', $publicacion->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de eliminar esta publicación?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold rounded-full shadow transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                @if($publicacion->imagen)
                <div class="w-full md:w-1/3 flex justify-center md:justify-end">
                    <img src="{{ $publicacion->imagen }}" alt="Imagen"
                        class="rounded-lg border border-indigo-200 shadow max-h-40 object-cover">
                </div>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>