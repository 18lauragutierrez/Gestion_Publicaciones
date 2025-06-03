<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::all();
        return view('publicaciones.index', compact('publicaciones'));
    }

    public function create()
    {
        return view('publicaciones.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            'usuario_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('publicaciones', 'public');
            $data['imagen'] = asset('storage/' . $ruta);
        } else {
            $data['imagen'] = null;
        }


        Publicacion::create($data);

        return redirect()->route('publicaciones.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $publicacion = Publicacion::findOrFail($id);
        return view('publicaciones.edit', compact('publicacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
            'usuario_id' => 'required|integer'
        ]);

        $publicacion = Publicacion::findOrFail($id);
        $publicacion->titulo = $request->titulo;
        $publicacion->cuerpo = $request->cuerpo;
        $publicacion->usuario_id = $request->usuario_id;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('publicaciones', 'public');
            $publicacion->imagen = asset('storage/' . $path);
        }

        $publicacion->save();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada correctamente.');
    }
}
