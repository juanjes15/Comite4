<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePruebaRequest;
use App\Http\Requests\UpdatePruebaRequest;
use App\Models\Prueba;
use App\Models\SolicitudComite;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebas = Prueba::latest()->paginate(5);
        return view('pruebas.index', compact('pruebas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $solicitudComites = SolicitudComite::all();
        return view('pruebas.create', compact('solicitudComites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePruebaRequest $request)
    {

        Prueba::create($request->validated());
        return redirect()->route('pruebas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prueba $prueba)
    {

        $solicitudComites = SolicitudComite::all();
        return view('pruebas.edit', compact('prueba', 'solicitudComites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePruebaRequest $request, Prueba $prueba)
    {

        $prueba->update($request->validated());
        return redirect()->route('pruebas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prueba $prueba)
    {
        
        $prueba->delete();
        return redirect()->route('pruebas.index');
    }
}