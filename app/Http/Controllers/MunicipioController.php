<?php

namespace App\Http\Controllers;

use App\Models\municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $municipio = municipio::where('id', 'like', '%' . $search . '%')
            ->orWhere('NombreMunicipio', 'like', '%' . $search . '%')
            ->orWhere('PrecioEnvio', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('municipio.index', compact('municipio'));
    }

    public function create()
    {
        return view('municipio.crear');
    }

    public function store(Request $municipio)
    {

        $municipio->validate([
            'NombreMunicipio' => 'required',
            'PrecioEnvio' => 'required'
        ]);

        $insertar = new municipio;
        $insertar->NombreMunicipio = $municipio->NombreMunicipio;
        $insertar->PrecioEnvio = $municipio->PrecioEnvio;
        $insertar->save();

        return redirect('municipio')->with('Guardado', 'El municipio fue guardado con exito!!');
    }

    public function destroy(municipio $id)
    {
        try {
            // Código para eliminar el registro de municipios
            $id->delete();
            return redirect('municipio')->with('Eliminado', 'El municipio fue eliminado con exito!!');
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                // Si se produce un error de integridad de datos, agregar un mensaje de sesión con Semantic UI
                return redirect()->back()->with('error', 'No se puede eliminar el registro porque tiene usuarios relacionados.');
            } else {
                // Si se produce otro tipo de error, mostrar el mensaje de error original
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function edit($id)
    {

        $update = municipio::FindOrFail($id);
        return view('municipio.editar', compact('update'));
    }

    public function editBd(Request $municipio)
    {
        $municipio->validate([
            'NombreMunicipio' => 'required',
            'PrecioEnvio' => 'required'
        ]);
        $insertar = municipio::FindOrFail($municipio->id);
        $insertar->NombreMunicipio = $municipio->NombreMunicipio;
        $insertar->PrecioEnvio = $municipio->PrecioEnvio;
        $insertar->update();

        return redirect('municipio')->with('Actualizado', 'El municipio fue actualizado con exito!!');
    }
}
