<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Aprendiz;
use App\Models\Instructor;
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

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('administrar');

        $user->update($request->validated());

        if ($user->rol === 'estudiante') {
            $aprendizs = Aprendiz::all();
            return view('users.addEstudiante', compact('user', 'aprendizs'));
        } else if ($user->rol === 'instructor') {
            $instructors = Instructor::all();
            return view('users.addInstructor', compact('user', 'instructors'));
        } else {
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('administrar');

        $user->delete();
        return redirect()->route('users.index');
    }

    public function addEstudiante(User $user)
    {
        // Implementa la lógica para agregar un estudiante aquí
        return view('users.addEstudiante', compact('user'));
    }

    public function addInstructor(User $user)
    {
        // Implementa la lógica para agregar un instructor aquí
        return view('users.addInstructor', compact('user'));
    }

    public function storeEstudiante(Request $request, User $user)
    {
        $this->authorize('administrar');

        $validatedData = $request->validate([
            'apr_id' => 'required',
        ]);

        $user->aprendiz()->associate($validatedData['apr_id']);
        if ($user->ins_id !== null) {
            $user->instructor()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function storeInstructor(Request $request, User $user)
    {
        $this->authorize('administrar');

        $validatedData = $request->validate([
            'ins_id' => 'required',
        ]);

        $user->instructor()->associate($validatedData['ins_id']);
        if ($user->apr_id !== null) {
            $user->aprendiz()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }
}
