<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {

        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // $this->validateEmail($request);
        $this->validate($request, [
            'email' => 'required|email',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio.',
        ]);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', '¡Recordatorio de contraseña enviado! Por favor revisa tu correo electrónico.');
        } else {
            $error = $response === Password::INVALID_USER ? 'El correo electrónico ingresado no está registrado.' : 'Ha ocurrido un error al enviar el correo electrónico de restablecimiento de contraseña. Por favor, intenta nuevamente.';
            return back()->withErrors(['email' => $error]);
        }
    }
}
