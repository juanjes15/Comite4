<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComiteRequest;
use App\Http\Requests\UpdateComiteRequest;
use App\Models\Comite;
use App\Models\SolicitudComite;

class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comites = Comite::latest()->paginate(5);
        return view('comites.index', compact('comites'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar');

        $solicitudComites = SolicitudComite::all();
        return view('comites.create', compact('solicitudComites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComiteRequest $request)
    {
        $this->authorize('administrar');

        Comite::create($request->validated());
        return redirect()->route('comites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comite $comite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comite $comite)
    {
        $this->authorize('administrar');

        $solicitudComites = SolicitudComite::all();
        return view('comites.edit', compact('comite', 'solicitudComites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComiteRequest $request, Comite $comite)
    {
        $this->authorize('administrar');

        $comite->update($request->validated());
        return redirect()->route('comites.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comite $comite)
    {
        $this->authorize('administrar');
        
        $comite->delete();
        return redirect()->route('comites.index');
    }
}