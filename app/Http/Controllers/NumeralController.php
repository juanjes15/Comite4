<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumeralRequest;
use App\Http\Requests\UpdateNumeralRequest;
use App\Models\Articulo;
use App\Models\Numeral;

class NumeralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numerals = Numeral::latest()->paginate(5);
        return view('numerals.index', compact('numerals'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar');

        $articulos = Articulo::all();
        return view('numerals.create', compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNumeralRequest $request)
    {
        $this->authorize('administrar');

        Numeral::create($request->validated());
        return redirect()->route('numerals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Numeral $numeral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Numeral $numeral)
    {
        $this->authorize('administrar');

        $articulos = Articulo::all();
        return view('numerals.edit', compact('numeral', 'articulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNumeralRequest $request, Numeral $numeral)
    {
        $this->authorize('administrar');

        $numeral->update($request->validated());
        return redirect()->route('numerals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Numeral $numeral)
    {
        $this->authorize('administrar');
        
        $numeral->delete();
        return redirect()->route('numerals.index');
    }
}