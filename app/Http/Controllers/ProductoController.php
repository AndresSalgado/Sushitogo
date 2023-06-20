<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\producto;
use App\Models\carta;

use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $producto = producto::select('productos.*')
            ->join('cartas', 'cartas.id', '=', 'productos.carta_id')
            ->where('productos.id', 'like', '%' . $search . '%')
            ->orWhere('productos.nombre', 'like', '%' . $search . '%')
            ->orWhere('productos.precio', 'like', '%' . $search . '%')
            ->orWhere('productos.descripcion', 'like', '%' . $search . '%')
            ->orWhere('cartas.nombre', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('producto.index', compact('producto'));
    }

    public function create()
    {

        $infocarta = carta::all();
        return view('producto.crear', compact('infocarta'));
    }

    public function store(Request $producto)
    {

        $producto->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1|max:9999999',
            'descripcion' => 'required',
            'imagen' => 'required|image|max:2048',
            'carta_id' => 'required'
        ]);

        $instaciaProducto = new producto;
        $imagenes = $producto->file('imagen')->store('public/producto');
        $ruta = Storage::url($imagenes);
        $instaciaProducto->nombre = $producto->nombre;
        $instaciaProducto->precio = $producto->precio;
        $instaciaProducto->descripcion = $producto->descripcion;
        $instaciaProducto->imagen = $ruta;
        $instaciaProducto->carta_id = $producto->carta_id;
        $instaciaProducto->save();

        return redirect('producto')->with('Guardado', 'El producto fue guardado con exito!!');
    }

    public function destroy(producto $id)
    {
        DB::beginTransaction();

        try {
            $url = Storage::url($id->imagen);
            Storage::delete($url);

            $id->delete();

            DB::commit();

            return redirect('producto')->with('Eliminado', 'El producto fue eliminado con exito!!');
        } catch (\Exception $e) {
            DB::rollback();

            if ($e->getCode() == 23000) {
                return redirect()->back()->with('Error', 'El producto no se puede eliminar porque esta relacionado con el detalle del pedido.');
            } else {
                return back()->with('Error', $e->getMessage());
            }
        }
    }

    public function edit($id)
    {

        $infocarta = carta::all();
        $update = producto::FindOrFail($id);
        return view('producto.editar', compact('update', 'infocarta'));
    }

    public function editBd(Request $producto)
    {
        $producto->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1|max:9999999',
            'descripcion' => 'required',
            'carta_id' => 'required',
        ]);

        $instanciarproducto = producto::FindOrFail($producto->id);

        if ($producto->hasFile('imagen')) {
            // Obtener la ruta de la imagen anterior
            $ruta_anterior = $instanciarproducto->imagen;

            // Guardar la nueva imagen
            $imagenes = $producto->file('imagen')->store('public/producto');

            if ($imagenes && filled($imagenes)) {
                $ruta = Storage::url($imagenes);
                $instanciarproducto->imagen = $ruta;

                // Eliminar la imagen anterior si existe
                if ($ruta_anterior && $ruta_anterior != $ruta) {
                    Storage::delete(str_replace('/storage', 'public', $ruta_anterior));
                }
            }
        }

        $estado = $producto->has('estado') ? $producto->estado : 0;

        if ($estado != $instanciarproducto->estado) {
            $instanciarproducto->estado = $estado;
            $instanciarproducto->save();
        }

        $instanciarproducto->nombre = $producto->nombre;
        $instanciarproducto->precio = $producto->precio;
        $instanciarproducto->descripcion = $producto->descripcion;
        $instanciarproducto->carta_id = $producto->carta_id;
        $instanciarproducto->update();

        return redirect('producto')->with('Actualizado', 'El producto fue actualizado con exito!!');
    }

    public function vista()
    {

        $producto = producto::where('estado', 1)->get();
        $infocarta = carta::where('estado', 1)->get();
        return view('client.producto', compact('producto', 'infocarta'));
    }
}
