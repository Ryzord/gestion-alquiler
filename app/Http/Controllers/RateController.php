<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = Rate::with('apartment')->get();
        return view('rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('rates.create', compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'apartment_id' => 'required|exists:apartments,id',
            'iva' => 'nullable|numeric'
        ]);

        Rate::create($request->all());
        return redirect()->route('rates.index')->with('success', 'Tarifa creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rate $rate)
    {
        return view('rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rate $rate)
    {
        $apartments = Apartment::all();
        return view('rates.edit', compact('rate', 'apartments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rate $rate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_night' => 'required|numeric',
            'apartment_id' => 'required|exists:apartments,id',
            'iva' => 'nullable|numeric'
        ]);

        $rate->update($request->all());
        return redirect()->route('rates.index')->with('success', 'Tarifa actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('rates.index')->with('success', 'Tarifa eliminada correctamente.');
    }
}
