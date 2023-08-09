<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAprendizRequest;
use App\Http\Requests\UpdateAprendizRequest;
use App\Models\Aprendiz;
use App\Models\Ficha;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendizs = Aprendiz::latest()->paginate(5);
        $fichaIds = $aprendizs->pluck('fic_id')->unique();
        $fichas = Ficha::whereIn('id', $fichaIds)->get();
        return view('aprendizs.index', compact('aprendizs', 'fichas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fichas = Ficha::all();
        return view('aprendizs.create', compact('fichas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAprendizRequest $request)
    {
        Aprendiz::create($request->validated());
        return redirect()->route('aprendizs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aprendiz $aprendiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aprendiz $aprendiz)
    {
        $fichas = Ficha::all();
        return view('aprendizs.edit', compact('aprendiz', 'fichas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAprendizRequest $request, Aprendiz $aprendiz)
    {
        $aprendiz->update($request->validated());
        return redirect()->route('aprendizs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();
        return redirect()->route('aprendizs.index');
    }
}