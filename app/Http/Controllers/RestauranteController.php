<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\restaurante;
use App\Models\municipio;

class RestauranteController extends Controller
{
    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $restaurante = restaurante::where('id', 'like', '%' . $search . '%')
            ->orWhere('nombre', 'like', '%' . $search . '%')
            ->orWhere('telefono', 'like', '%' . $search . '%')
            ->orWhere('direccion', 'like', '%' . $search . '%')
            ->paginate(5);
        return view('restaurante.index', compact('restaurante'));
    }

    public function create()
    {

        $municipio = municipio::all();
        return view('restaurante.crear', compact('municipio'));
    }

    public function store(Request $restaurante)
    {

        $restaurante->validate([
            'nombre' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'imagen' => 'required|image|max:2048',
            'municipio_id' => 'required'
        ]);
        $instanciaRestaurante = new restaurante;
        $imagenes = $restaurante->file('imagen')->store('public/restaurante');
        $ruta = Storage::url($imagenes);
        $instanciaRestaurante->nombre = $restaurante->nombre;
        $instanciaRestaurante->telefono = $restaurante->telefono;
        $instanciaRestaurante->direccion = $restaurante->direccion;
        $instanciaRestaurante->imagen = $ruta;
        $instanciaRestaurante->municipio_id = $restaurante->municipio_id;
        $instanciaRestaurante->save();

        return redirect('restaurante')->with('Guardado', 'El restaurante fue guardado con exito!!');
    }

    public function destroy(restaurante $id)
    {

        $url = str_replace('storage', 'public', $id->imagen);
        Storage::delete($url);

        $id->delete();
        return redirect('restaurante')->with('Eliminado', 'El restaurante fue eliminado con exito!!');
    }

    public function edit($id)
    {

        $municipio = municipio::all();
        $update = restaurante::FindOrFail($id);
        return view('restaurante.editar', compact('update', 'municipio'));
    }

    public function editBd(Request $restaurante)
    {
        $restaurante->validate([
            'nombre' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'municipio_id' => 'required'
        ]);

        $instanciarestaurante = restaurante::FindOrFail($restaurante->id);
        if ($restaurante->hasFile('imagen')) {
            // Obtener la ruta de la imagen anterior
            $ruta_anterior = $instanciarestaurante->imagen;

            // Guardar la nueva imagen
            $imagenes = $restaurante->file('imagen')->store('public/restaurante');

            if ($imagenes && filled($imagenes)) {
                $ruta = Storage::url($imagenes);
                $instanciarestaurante->imagen = $ruta;

                // Eliminar la imagen anterior si existe
                if ($ruta_anterior && $ruta_anterior != $ruta) {
                    Storage::delete(str_replace('/storage', 'public', $ruta_anterior));
                }
            }
        }
        $instanciarestaurante->nombre = $restaurante->nombre;
        $instanciarestaurante->telefono = $restaurante->telefono;
        $instanciarestaurante->direccion = $restaurante->direccion;
        $instanciarestaurante->municipio_id = $restaurante->municipio_id;
        $instanciarestaurante->update();

        return redirect('restaurante')->with('Actualizado', 'El restaurante fue actualizado con exito!!');
    }

    public function vista()
    {

        $restaurante = restaurante::all();
        return view('client.restaurante', compact('restaurante'));
    }
}
