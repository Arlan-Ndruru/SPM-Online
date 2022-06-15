<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'unique_number' => 'required|unique:users|digits:16',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // 'password' => Hash::make($request->password),
            'no_hp' => 'required',
            'sr_upz' => 'required|mimes:pdf|max:2048',

            // 'foto' => 'image|file|max:2048',
        ]);
        if ($request->file('sr_upz')) {
            $validatedData['sr_upz'] = $request->file('sr_upz')->store('SR-UPZ/sr_upz');
        }
        
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['status'] = 0;

        // if ($request->file('foto')) {
        //     $validatedData['foto'] = $request->file('foto')->store('user-images');
        // }
        // dd($validatedData);
        
        $user = User::create($validatedData);
        // dd($user);
        $user->attachRole($request->role_id);
        //
            // $request->validate([
            //     'unique_number' => ['required', 'unique:users', 'digits:16'],
            //     'name' => ['required', 'string', 'max:255'],
            //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //     'password' => ['required', Rules\Password::defaults()],
            //     'no_hp' => ['required'],
                
            // ]);
            // $validatedData = $request->validate([
            //     'sr_upz' => ['required', 'mimes:pdf', 'max:2048'],
            // ]);

            // if ($request->file('sr_upz')) {
            //     $validatedData['sr_upz'] = $request->file('sr_upz')->store('SR-UPZ/sr_upz');
            // }

            // $user = User::create([
            //     'unique_number' => $request->unique_number,
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     'no_hp' => $request->no_hp,
            //     'status' => 0,
            // ],$validatedData);

            // dd($user);

            // $user->attachRole($request->role_id);
        //
        if ($user->status === 0) {
            Auth::logout($user);
            return redirect('/login')->with('need', "Registration Success, Login Please!");
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
