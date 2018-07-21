<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::where('user_type', 'user')->get();

    	return view('dashboard.users.users', compact('users'));
    }

    public function edit($id)
    {
    	$user = User::find($id);

    	return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id) 
    {
    	$this->validate(request(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users,phone,'.$id,
            'email'=>'required|email|unique:users,email,'.$id,
        ]);

        User::where('id', $id)->update($request->except(['_token', '_method']));

        session()->flash('message', 'User Is Updated');

        return redirect('/admin/all-users');

    }

}
