<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $user = User::latest();
        $userAdmin = User::whereRoleis(['Admin'])->latest();
        $userKetua = User::whereRoleis(['Ketua'])->latest();
        $userSD = User::whereRoleis(['Staf-Distribusi'])->latest();
        $userSR = User::whereRoleis(['Staf-Resepsionis'])->latest();
        $userCM = User::whereRoleis(['Calon-Mustahik'])->latest();
        if (Auth::user()->hasRole(['Admin', 'Ketua'])) {

            $params = [
                'users' => $user->filter(request(['search', 'searchDate']))->paginate(5),

                'usersAdmin' => $userAdmin->filter(request(['search', 'searchDate']))->paginate(1),
                'usersKetua' => $userKetua->filter(request(['search', 'searchDate']))->paginate(1),
                'usersSD' => $userSD->filter(request(['search', 'searchDate']))->paginate(1),
                'usersSR' => $userSR->filter(request(['search', 'searchDate']))->paginate(1),
                'usersCM' => $userCM->filter(request(['search', 'searchDate']))->paginate(1),
                // 'users' => User::latest()->paginate(2),
                'title' => "Kelola Pengguna",
            ]; 



        }
        else
        {
        $params = [
            'users' => $user->filter(request(['search', 'searchDate']))->paginate(5),
            // 'users' => User::latest()->paginate(2),
            'title' => "Kelola Pengguna",
        ];
        }
        return view('dash.users.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'roles' => Role::all(),
            'title' => "Tambah User"
        ];
        return view('dash.users.add')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'unique_number' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'no_hp' => 'required',
        
            // 'foto' => 'image|file|max:2048',
        ]);

        $validatedData['status'] = 1;

        // if ($request->file('foto')) {
        //     $validatedData['foto'] = $request->file('foto')->store('user-images');
        // }

        $role = Role::find($request->input('role_id'));

        $user = User::create($validatedData);
        $user->attachRole($role);
        return redirect('dashboard/users')->with('success', "User $user->name has successfully been created.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $params = [
            'user' => $user,
            'title' => "Detail User"
        ];
        return view('dash.users.show')->with($params);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $params = [
            'roles' => Role::all(),
            'title' => "Edit User",
            'user' => $user,
        ];
        return view('dash.users.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request) ;
        $rules = [
            'name' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            // 'foto' => 'image|file|max:2048',
        ];
        if ($request->unique_number != $user->unique_number) {
            $rules['unique_number'] = 'required|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }
        if ($request->password != null) {
            $validatedData['password'] = Hash::make($request->password);
        }

        $validatedData = $request->validate($rules);
        // dd($validatedData);
        // if ($request->file('foto')) {
        //     if ($request->oldFoto) {
        //         Storage::delete($request->oldFoto);
        //     }
        //     $validatedData['foto'] = $request->file('foto')->store('user-images');
        // }

        $role = Role::find($request->input('role_id'));

        $roles = $user->Roles;

        foreach ($roles as $key => $value) {
            $user->detachRole($value);
        }
        User::where('id', $user->id)
            ->update($validatedData);
        $user->attachRole($role);    
        return redirect('dashboard/users')->with('success', "User $user->name has successfully been Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // if ($user->foto) {
        //     Storage::delete($user->foto);
        // }
        User::destroy($user->id);
        return redirect('dashboard/users')->with('success', "User $user->name has successfully been deleted.");
    }
}
