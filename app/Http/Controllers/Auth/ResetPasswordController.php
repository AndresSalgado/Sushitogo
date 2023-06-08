<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|between:8,16',
        ], [
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.between' => 'La contraseña debe tener entre 8 y 16 caracteres.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'El correo electrónico no se encuentra.']);
        }

        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Por favor, elige una contraseña diferente.']);
        }

        if ($request->filled('password')) {
            $user['password'] = $request->input('password');
        }

        $user->save();

        return redirect()->route('login.index')->with('status', 'Contraseña fue actualizada correctamente.');
    }
}
