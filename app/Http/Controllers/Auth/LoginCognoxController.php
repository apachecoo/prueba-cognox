<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginCognoxController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // dd(Hash::make($request->password));
        
        // dd($request->all());
        $credentials = $request->validate([
            'identification_document' => ['required', 'numeric'],
            'password' => ['required','numeric','digits_between:1,4'],
        ]);

        $user = User::where('identification_document', $request->identification_document)->first();

        if (!empty($user) && Hash::check($request->password, $user->password)) {
            Auth::login($user,($request->remember? true:false));
            $request->session()->regenerate();
            return redirect()->intended('home');
        } else {
            return back()->withErrors([
                'password' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
            ]);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
