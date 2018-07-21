<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class RolesController extends Controller
{
    public function showPanel()
    {
    	return view('dashboard.home');
    }
    
    public function showUsers()	
    {
    	$users = User::get();
        return view('dashboard.showUsers', compact('users'));
    }

    public function addRole(Request $request)
    {
    	$user = User::where('email', $request['email'])->first();

        $user->roles()->detach();

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }

        if($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name', 'editor')->first());
        }

        if($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }

        return redirect()->back();
    }
}
