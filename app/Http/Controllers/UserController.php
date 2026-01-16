<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->adress = $request->adress;
        $user->zip_code = $request->zip_code;
        $user->city = $request->city;
        $user->customer_id = $request->customer_id;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User succesvol aangemaakt.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->adress = $request->adress;
        $user->zip_code = $request->zip_code;
        $user->city = $request->city;
        $user->customer_id = $request->customer_id;

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User succesvol bijgewerkt.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User succesvol verwijderd.');
    }
}
