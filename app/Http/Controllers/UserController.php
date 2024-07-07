<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    public function register()
    {
        return view('users.register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'image' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password

        $user = User::create($validatedData);
        return redirect()->route('users.login');
    }

    public function login()
    {
        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        dd($credentials);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function dashboard()
    {
        $user = Auth::user();
        $activeCars = $user->cars()->wherePivot('status', 'active')->get();
        $pastCars = $user->cars()->wherePivot('status', 'past')->get();
    
        return view('users.dashboard', compact('user','activeCars', 'pastCars'));
    }
}
