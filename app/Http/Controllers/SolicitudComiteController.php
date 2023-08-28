<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudComiteRequest;
use App\Http\Requests\UpdateSolicitudComiteRequest;
use App\Models\SolicitudComite;
use App\Models\Instructor;

class SolicitudComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudComites = SolicitudComite::latest()->paginate(5);
        return view('solicitudComites.index', compact('solicitudComites'))->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {
        $this->authorize('administrar');
        
        $instructors = Instructor::all(); // Obtén todos los instructores

        return view('solicitudComites.create', compact('instructors'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');
        
        SolicitudComite::create($request->validated());
        return redirect()->route('solicitudComites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitudComite $solicitudComite)
    {
        $this->authorize('administrar');
        return view('solicitudComites.show', compact('solicitudComite'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudComite $solicitudComite)
    {
        $this->authorize('administrar');
        $instructors = Instructor::all(); // Obtén todos los instructores
        return view('solicitudComites.edit', compact('solicitudComite','instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolicitudComiteRequest $request, SolicitudComite $solicitudComite)
    {
        $this->authorize('administrar');

        $solicitudComite->update($request->validated());
        return redirect()->route('solicitudComites.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudComite $solicitudComite)
    {
        $this->authorize('administrar');
        
        $solicitudComite->delete();
        return redirect()->route('solicitudComites.index');
    }
}
