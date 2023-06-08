<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\municipio;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create()
    {
        $municipio = municipio::all();
        return view('auth.register', compact('municipio'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'telefono' => 'required|between:7,10',
            'direccion' => 'required',
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@(gmail|GMAIL|hotmail|HOTMAIL)\.(com|COM|co|CO)$/i'],
            'password' => 'required|min:8|max:16|confirmed',
            'municipio_id' => 'required',
        ], [
            'email.required' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'email.regex' => 'El correo electrónico debe ser de Gmail o Hotmail y tener la extensión .com o .co',
            'password.required' => 'Por favor llene el campo contraseña',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.max' => 'La contraseña no puede exceder los 16 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);

        if (User::where('email', request('email'))->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este correo electrónico ya está en uso']);
        }

        $defaultRole = Role::where('NombreRole', 'cliente')->first();

        $user = new User();
        $user->name = $request->input('name');
        $user->telefono = $request->input('telefono');
        $user->direccion = $request->input('direccion');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->municipio_id = $request->input('municipio_id');
        $user->role_id = $defaultRole->id;

        $user->save();

        Auth::login($user);

        return redirect('/Producto');
    }
}
