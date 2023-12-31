<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapituloRequest;
use App\Http\Requests\UpdateCapituloRequest;
use App\Models\Capitulo;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capitulos = Capitulo::latest()->paginate(5);
        return view('capitulos.index', compact('capitulos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('capitulos.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCapituloRequest $request)
    {
        

        Capitulo::create($request->validated());
        return redirect()->route('capitulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Capitulo $capitulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Capitulo $capitulo)
    {
        

        return view('capitulos.edit', compact('capitulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCapituloRequest $request, Capitulo $capitulo)
    {
        

        $capitulo->update($request->validated());
        return redirect()->route('capitulos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Capitulo $capitulo)
    {
        
        
        $capitulo->delete();
        return redirect()->route('capitulos.index');
    }
}