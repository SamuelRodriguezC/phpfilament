<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // Validaciones del speaker
            'speaker_name' => ['required', 'string', 'max:255'],
            'speaker_phone_number' => ['required', 'string', 'max:20'],
            'speaker_bio' => ['required', 'string'],
            'speaker_twitter_handle' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol al usuario
        $user->assignRole('panel_user');

        // Crear el speaker relacionado con el usuario
        $user->speaker()->create([
            'name' => $request->speaker_name,
            'phone_number' => $request->speaker_phone_number,
            'bio' => $request->speaker_bio,
            'twitter_handle' => $request->speaker_twitter_handle,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 🔁 Redirigir según el rol
        if ($user->hasRole('super_admin')) {
            return redirect('/admin'); // Ajusta según tu panel de admin
        }

        if ($user->hasRole('panel_user')) {
            return redirect('/employer'); // Ajusta según tu panel de empleados
        }

        return redirect('/');
    }


}
