<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    function create()
    {
        return view('users.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required',
            'level' => 'required',
            'store_id' => 'required',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' =>$request->name,
            'username' =>$request->username,
            'email' =>$request->email,
            'level' =>$request->level,
            'store_id' =>$request->store_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('users.index'));
    }

    function show(User $user)
    {
        //
    }

    function edit(User $user)
    {
        //
    }

    function update(Request $request, User $user)
    {;
        $user->update($request->all());

        return redirect(route('location.create'));
    }

    function destroy(User $user)
    {
        //
    }
}
