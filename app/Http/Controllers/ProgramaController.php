<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramaRequest;
use App\Http\Requests\UpdateProgramaRequest;
use App\Models\Programa;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programas = Programa::latest()->paginate(5);
        return view('programas.index', compact('programas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar');

        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramaRequest $request)
    {
        $this->authorize('administrar');

        Programa::create($request->validated());
        return redirect()->route('programas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        $this->authorize('administrar');

        return view('programas.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramaRequest $request, Programa $programa)
    {
        $this->authorize('administrar');

        $programa->update($request->validated());
        return redirect()->route('programas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $this->authorize('administrar');

        $programa->delete();
        return redirect()->route('programas.index');
    }
}