<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {

        if (auth()->attempt(request(['email', 'password'])) == false) {

            return back()->withErrors(['message' => 'El correo o contraseña son incorrectos, por favor intentelo de nuevo']);
        } else {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('admin.index');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('cajero.index');
            } else {
                return redirect()->to('/Producto');
            }
        }
    }

    public function destroy(Request $request)
    {

        auth()->logout();
        Auth::logout();
        Session::forget('cart');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }
}
