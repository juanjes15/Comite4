<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $this->authorize('administrar');

        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('administrar');

        User::create($request->validated());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $this->authorize('administrar');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('administrar');

        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $this->authorize('administrar');

        $user->delete();
        return redirect()->route('users.index');
    }
}
