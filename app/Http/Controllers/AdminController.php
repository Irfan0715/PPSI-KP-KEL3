<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $roleStats = Role::withCount('users')->get();

        return view('admin.dashboard', compact('totalUsers', 'totalRoles', 'roleStats'));
    }

    public function users()
    {
        $users = User::with('roles')->paginate(10);
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $role = Role::find($request->role_id);

        // Hapus role lama dan assign role baru
        $user->roles()->detach();
        $user->roles()->attach($role);

        return back()->with('success', 'Role berhasil diubah');
    }
}
