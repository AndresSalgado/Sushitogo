<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\municipio;
use App\Models\Role;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function inicio(Request $request)
    {
        $search = $request->get('search');

        $usuario = User::select('users.*')
            ->join('municipios', 'municipios.id', '=', 'users.municipio_id')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', 'like', '%' . $search . '%')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->orWhere('users.telefono', 'like', '%' . $search . '%')
            ->orWhere('users.direccion', 'like', '%' . $search . '%')
            ->orWhere('users.email', 'like', '%' . $search . '%')
            ->orWhere('municipios.NombreMunicipio', 'like', '%' . $search . '%')
            ->orWhere('roles.NombreRole', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('usuario.index', compact('usuario'));
    }

    public function create()
    {

        $municipio = municipio::all();
        $role = Role::all();
        return view('usuario.crear', compact('municipio', 'role'));
    }

    public function store(Request $usuario)
    {

        $usuario->validate([
            'name' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail|GMAIL|hotmail|HOTMAIL)\.(com|COM|co|CO)$/i'],
            'password' => 'required|between:8,16',
            'municipio_id' => 'required',
            'role_id' => 'required',
        ], [
            'email.required' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'email.regex' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co'
        ]);

        if (User::where('email', request('email'))->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este correo electrónico ya está en uso']);
        }

        $instaciaUsuario = new user;
        $instaciaUsuario->name = $usuario->name;
        $instaciaUsuario->telefono = $usuario->telefono;
        $instaciaUsuario->direccion = $usuario->direccion;
        $instaciaUsuario->email = $usuario->email;
        $instaciaUsuario->password = $usuario->password;
        $instaciaUsuario->municipio_id = $usuario->municipio_id;
        $instaciaUsuario->role_id = $usuario->role_id;
        $instaciaUsuario->save();

        return redirect('usuario')->with('Guardado', 'El usuario fue guardada con exito!!');
    }

    public function destroy(user $id)
    {
        $id->delete();
        return redirect('usuario')->with('Eliminado', 'El usuario fue eliminada con exito!!');
    }

    //Aqui carga la vista para actualizar usuario desde el admin
    public function edit($id)
    {

        $municipio = municipio::all();
        $role = Role::all();
        $update = user::FindOrFail($id);
        return view('usuario.editar', compact('update', 'municipio', 'role'));
    }

    //Aqui el usuario actualiza sus datos
    public function perfil()
    {
        $municipio = municipio::all();
        $update = auth()->user();
        return view('client.perfil', compact('update', 'municipio'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail|GMAIL|hotmail|HOTMAIL)\.(com|COM|co|CO)$/i'],
            'municipio_id' => 'required',
            'password' => 'nullable|between:8,16'
        ], [
            'email.required' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'email.regex' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co'
        ]);

        $usuario = [
            'name' => $request->input('name'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'municipio_id' => $request->input('municipio_id'),
        ];

        if ($usuario['email'] !== $user->email && User::where('email', $usuario['email'])->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este correo electrónico ya está en uso']);
        }

        if ($request->filled('password')) {
            $usuario['password'] = $request->input('password');
        }

        $user->update($usuario);

        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado con éxito.');
    }

    //Aqui el usuario actualiza sus datos antes del pedido
    public function carritoPerfil(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail|GMAIL|hotmail|HOTMAIL)\.(com|COM|co|CO)$/i'],
            'municipio_id' => 'required',
        ], [
            'email.required' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'email.regex' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co'
        ]);

        $usuario = [
            'name' => $request->input('name'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'municipio_id' => $request->input('municipio_id'),
        ];

        if ($usuario['email'] !== $user->email && User::where('email', $usuario['email'])->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este correo electrónico ya está en uso']);
        }

        $user->update($usuario);

        return redirect()->route('cart.checkout')->with('success', 'Perfil actualizado con éxito.');
    }

    //Aqui lo actualiza el admin
    public function editBd(Request $user)
    {

        $user->validate([
            'name' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail|GMAIL|hotmail|HOTMAIL)\.(com|COM|co|CO)$/i'],
            'municipio_id' => 'required',
            'role_id' => 'required',
            'password' => 'nullable|between:8,16'
        ], [
            'email.required' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'email.regex' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co'
        ]);

        $instanciarusuario = user::FindOrFail($user->id);

        if ($user['email'] !== $instanciarusuario->email && User::where('email', $user['email'])->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este correo electrónico ya está en uso']);
        }

        $instanciarusuario->name = $user->name;
        $instanciarusuario->telefono = $user->telefono;
        $instanciarusuario->direccion = $user->direccion;
        $instanciarusuario->email = $user->email;
        $instanciarusuario->municipio_id = $user->municipio_id;
        $instanciarusuario->role_id = $user->role_id;

        if ($user->filled('password')) {
            $instanciarusuario->password = $user->password;
        }

        $instanciarusuario->update();

        return redirect('usuario')->with('Actualizado', 'El usuario fue actualizada con exito!!');
    }
}
