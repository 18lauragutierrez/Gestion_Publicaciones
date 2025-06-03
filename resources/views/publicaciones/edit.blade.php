<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Publicación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-indigo-100 min-h-screen font-sans flex items-center justify-center py-12">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-10">
        <h1 class="text-3xl font-bold text-center text-indigo-800 mb-8">Editar Publicación</h1>

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('publicaciones.update', $publicacion->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block text-sm font-semibold text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" required value="{{ $publicacion->titulo }}"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label for="cuerpo" class="block text-sm font-semibold text-gray-700">Cuerpo</label>
                <textarea name="cuerpo" id="cuerpo" required rows="4"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ $publicacion->cuerpo }}</textarea>
            </div>

            <div>
                <label for="imagen" class="block text-sm font-semibold text-gray-700">Imagen (desde tu PC)</label>
                <input type="file" name="imagen" id="imagen"
                    class="mt-1 w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-500 file:text-white hover:file:bg-indigo-600 transition">
                @if($publicacion->imagen)
                <p class="mt-2 text-sm text-indigo-600">Imagen actual:</p>
                <img src="{{ $publicacion->imagen }}" alt="Imagen actual" class="mt-1 rounded border max-w-xs max-h-32">
                @endif
            </div>

            <div>
                <label for="usuario_id" class="block text-sm font-semibold text-gray-700">Usuario ID</label>
                <input type="number" name="usuario_id" id="usuario_id" required value="{{ $publicacion->usuario_id }}"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">

            </div>
            <div class="flex justify-between items-center mt-6">
            <a href="{{ route('publicaciones.index') }}"
                class="text-indigo-600 hover:underline text-sm font-medium">
                ← Volver
            </a>
            <button type="submit"
                class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-full shadow hover:bg-indigo-700 transition">
                Guardar cambios
            </button>
    </div>

    </form>