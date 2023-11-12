<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'Invitado'
        ]);

        event(new Registered($user));
        return redirect()->route('users.index');
        //Auth::login($user);
        //return redirect(RouteServiceProvider::HOME);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'rol' => ['required', 'string', 'max:55'],
        ]);

        // Actualización de los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');
        $user->save();

        if ($user->rol === 'Aprendiz') {
            $aprendizs = Aprendiz::all();
            return view('users.addRolAprendiz', compact('user', 'aprendizs'));
        } else if ($user->rol === 'Instructor') {
            $instructors = Instructor::all();
            return view('users.addRolInstructor', compact('user', 'instructors'));
        } else {
            //Si el usuario anteriormente era un instructor, eliminamos dicha asociación
            if ($user->ins_id !== null) {
                $user->instructor()->dissociate();
            }
            //Si el usuario anteriormente era un estudiante, eliminamos dicha asociación
            if ($user->apr_id !== null) {
                $user->aprendiz()->dissociate();
            }
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('administrar');

        $user->delete();
        return redirect()->route('users.index');
    }

    public function addRolAprendiz(User $user)
    {
        // Implementa la lógica para agregar un estudiante aquí
        return view('users.addRolAprendiz', compact('user'));
    }

    public function addRolInstructor(User $user)
    {
        // Implementa la lógica para agregar un instructor aquí
        return view('users.addRolInstructor', compact('user'));
    }

    public function storeRolAprendiz(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'apr_id' => ['required', 'exists:aprendizs,id'],
        ]);

        $user->aprendiz()->associate($validatedData['apr_id']);
        if ($user->ins_id !== null) {
            $user->instructor()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function storeRolInstructor(Request $request, User $user)
    {
        $this->authorize('administrar');

        $validatedData = $request->validate([
            'ins_id' => ['required', 'exists:instructors,id'],
        ]);

        $user->instructor()->associate($validatedData['ins_id']);
        if ($user->apr_id !== null) {
            $user->aprendiz()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }
}
