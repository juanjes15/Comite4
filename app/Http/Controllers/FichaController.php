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
        return view('fichas.index', compact('fichas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar');

        $programas = Programa::all();
        $instructors = Instructor::all();
        return view('fichas.create', compact('programas', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFichaRequest $request)
    {
        $this->authorize('administrar');

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
        $this->authorize('administrar');

        $programas = Programa::all();
        $instructors = Instructor::all();
        return view('fichas.edit', compact('ficha', 'programas', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFichaRequest $request, Ficha $ficha)
    {
        $this->authorize('administrar');

        $ficha->update($request->validated());
        return redirect()->route('fichas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ficha $ficha)
    {
        $this->authorize('administrar');
        
        $ficha->delete();
        return redirect()->route('fichas.index');
    }
}