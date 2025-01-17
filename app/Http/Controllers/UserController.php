<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required|int',
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');
    }

    public function resetPassword(Request $request){

        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => 'required',
            'old_password'=> 'required',
        ]);

        if(Hash::check($validatedData['old_password'], $user->password)){
            $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password
            $user->update(['password'=>$validatedData['password']]);
            return redirect()->route('dashboard');
        }
        return back()->withError('The provided credentials do not match our records');
            
    }
    public function resetPasswordForm()
    {
        return view('users.resetPassword');
    }
    public function updateInfo(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required|int',
            'image' => 'required',
        ]);
        $validatedData['email'] = $user['email'];

        $user->update($validatedData);  
        return redirect()->route('dashboard');
    }
    public function updateInfoForm()
    {
        $user = Auth::user();
        return view('users.updateInfo', compact('user'));
    }
}
