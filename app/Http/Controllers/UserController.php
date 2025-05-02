<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    //users create
    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    //user store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|exists:roles,id', // ID validate করছি
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Role ID থেকে নাম বের করে assign করা
        $role = Role::findById($request->role);
        $user->assignRole($role->name);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }



    //users edit 
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    //user update
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $role = Role::findById($request->role);
        $user->syncRoles([$role->name]);
        $user->save();
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    //user delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


    //users show
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }
}
