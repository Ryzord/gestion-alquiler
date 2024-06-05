<?php

namespace App\Http\Controllers;

use App\Models\Intermediary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntermediaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intermediaries = Intermediary::all();
        return view('intermediaries.index', compact('intermediaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intermediaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'commission' => 'required|numeric',
        ]);

        Intermediary::create($request->all());
        return redirect()->route('intermediaries.index')->with('success', 'Intermediario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Intermediary $intermediary)
    {
        return view('intermediaries.show', compact('intermediary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intermediary $intermediary)
    {
        return view('intermediaries.edit', compact('intermediary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intermediary $intermediary)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'commission' => 'required|numeric',
        ]);

        $intermediary->update($request->all());
        return redirect()->route('intermediaries.index')->with('success', 'Intermediario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intermediary $intermediary)
    {
        $intermediary->delete();
        return redirect()->route('intermediaries.index')->with('success', 'Intermediario eliminado correctamente.');
    }
}
