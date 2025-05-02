<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', [
            'roles' => $roles,
        ]);
    }


    //role create
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    //role store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);

        // ✅ ID থেকে Permission গুলো বের করে attach করা

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    //role edit
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    //role update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        // ✅ ID থেকে Permission গুলো বের করে attach করা
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    //role delete
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    //role show
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', [
            'role' => $role,
        ]);
    }
}
