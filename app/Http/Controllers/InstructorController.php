<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::latest()->paginate(5);
        return view('instructors.index', compact('instructors'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('administrar');

        return view('instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructorRequest $request)
    {
        $this->authorize('administrar');

        Instructor::create($request->validated());
        return redirect()->route('instructors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        $this->authorize('administrar');

        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $this->authorize('administrar');

        $instructor->update($request->validated());
        return redirect()->route('instructors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $this->authorize('administrar');
        
        $instructor->delete();
        return redirect()->route('instructors.index');
    }
}