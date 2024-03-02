<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Organizer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            'role' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->role == 'client'){
            $client = Client::create(['user_id' => $user->id]);
        }elseif ($request->role == 'organizer'){
            $organizer = Organizer::create([
                'user_id' => $user->id
            ]);
        }elseif ($request->role == 'admin'){
            $admin = Admin::create(['user_id' => $user->id]);
        }

        if ($user->role == 'client') {
            Auth::login($user);
            return redirect()->route('home');
        } elseif ($user->role == 'organizer') {
            Auth::login($user);
            return redirect()->route('/organizer');
        }elseif ($user->role == 'admin'){
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function role()
    {
        if (auth()->user()->role === 'admin') {
            return redirect('/dashboard');
        } elseif (auth()->user()->role === 'organizer') {
            return redirect('/organizer');
        } else {
            return redirect('/');
        }
    }
}
