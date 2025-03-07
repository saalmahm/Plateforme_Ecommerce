<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.gestion_users', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:client,admin',
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.gestion_users')->with('success', 'Role updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.gestion_users')->with('success', 'User deleted successfully!');
    }
}
