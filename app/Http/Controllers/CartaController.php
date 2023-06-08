<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carta;

class CartaController extends Controller
{

    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $carta = carta::where('id', 'like', '%' . $search . '%')
            ->orWhere('nombre', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('carta.index', compact('carta'));
    }

    public function create()
    {

        return view('carta.crear');
    }

    public function store(Request $carta)
    {

        $carta->validate([
            'nombre' => 'required',
        ]);
        $instaciaCarta = new carta;
        $instaciaCarta->nombre = $carta->nombre;
        $instaciaCarta->save();

        return redirect('carta')->with('Guardado', 'La carta fue guardada con exito!!');
    }

    public function destroy(carta $id)
    {
        try {
            $id->delete();
            return redirect('carta')->with('Eliminado', 'La carta fue eliminada con exito!!');
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'No se puede eliminar el registro porque tiene productos relacionados.');
            } else {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function edit($id)
    {

        $update = carta::FindOrFail($id);
        return view('carta.editar', compact('update'));
    }

    public function editBd(Request $carta)
    {
        $carta->validate([
            'nombre' => 'required',
        ]);
        $instanciarcarta = carta::FindOrFail($carta->id);
        $estado = $carta->has('estado') ? $carta->estado : 0;

        if ($estado != $instanciarcarta->estado) {
            $instanciarcarta->estado = $estado;
            $instanciarcarta->save();
        }
        $instanciarcarta->nombre = $carta->nombre;
        $instanciarcarta->update();

        return redirect('carta')->with('Actualizado', 'La carta fue actualizada con exito!!');
    }
}
