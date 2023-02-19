<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $user = User::create([
            'password' => Hash::make($request['password']),
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'role' => $request['role'],
        ]);

        $user->save();

        event(new Registered($user));
        return redirect()->route('user')->with(['success' => 'user created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //validate form
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required']
        ]);

        $fields = [
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ];

        if ($request['password'] == null) {
            unset($fields['password']);
        }

        $user->update($fields);

        return redirect()->route('user')->with(['success' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        User::whereId($id)->delete();
        return redirect()->route('user')->with(['success' => 'User deleted!']);
    }
}
