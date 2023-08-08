<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFichaRequest;
use App\Http\Requests\UpdateFichaRequest;
use App\Models\Ficha;
use App\Models\Programa;
use App\Models\Instructor;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichas = Ficha::latest()->paginate(5);
        // Obtener los IDs únicos de los programas relacionados con las fichas consultadas
        $programaIds = $fichas->pluck('pro_id')->unique();
        // Obtener solo los programas relacionados con las fichas consultadas
        $programas = Programa::whereIn('id', $programaIds)->get();
        $instructors = Instructor::all();
        return view('fichas.index', compact('fichas', 'programas', 'instructors'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar fichas');

        $programas = Programa::all();
        return view('fichas.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFichaRequest $request)
    {
        $this->authorize('administrar fichas');

        Ficha::create($request->validated());
        return redirect()->route('fichas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ficha $ficha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ficha $ficha)
    {
        $this->authorize('administrar fichas');

        $programas = Programa::all();
        return view('fichas.edit', compact('ficha', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFichaRequest $request, Ficha $ficha)
    {
        $this->authorize('administrar fichas');

        $ficha->update($request->validated());
        return redirect()->route('fichas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ficha $ficha)
    {
        $this->authorize('administrar fichas');

        $ficha->delete();
        return redirect()->route('fichas.index');
    }
}