<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;
use App\Models\Capitulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::latest()->paginate(5);
        $capituloIds = $articulos->pluck('cap_id')->unique();
        $capitulos = Capitulo::whereIn('id', $capituloIds)->get();
        return view('articulos.index', compact('articulos', 'capitulos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $capitulos = Capitulo::all();
        return view('articulos.create', compact('capitulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticuloRequest $request)
    {
        Articulo::create($request->validated());
        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        $capitulos = Capitulo::all();
        return view('articulos.edit', compact('articulo', 'capitulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $articulo->update($request->validated());
        return redirect()->route('articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}