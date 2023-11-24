<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAprendizRequest;
use App\Http\Requests\UpdateAprendizRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Aprendiz;
use App\Models\Ficha;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $aprendizs = Aprendiz::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->whereHas('ficha', function (Builder $subquery) use ($search) {
                    $subquery->where('fic_codigo', 'like', "%{$search}%");
                })->orWhere('apr_identificacion', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('aprendizs.index', compact('aprendizs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

        $fichas = Ficha::with('programa')
                ->join('programas', 'fichas.pro_id', '=', 'programas.id')
                ->orderBy('programas.pro_nombre')
                ->orderBy('fichas.fic_codigo')
                ->get();
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
