<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Intermediary;
use App\Models\Apartment;
use App\Models\Rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::with(['intermediary', 'apartment', 'rate'])->get();
        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $intermediaries = Intermediary::all();
        $apartments = Apartment::all();
        $rates = Rate::all();
        return view('incomes.create', compact('intermediaries', 'apartments', 'rates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'intermediary_id' => 'nullable|exists:intermediaries,id',
            'apartment_id' => 'required|exists:apartments,id',
            'rate_id' => 'required|exists:rates,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_nif' => 'required|string|max:255',
            'client_phone' => 'required|string|max:255',
            'number_of_people' => 'required|integer',
            'discount' => 'required|numeric',
            'observations' => 'nullable|string'
        ]);
    
        $nights = (new \DateTime($request->check_out))->diff(new \DateTime($request->check_in))->days;
        $rate = Rate::findOrFail($request->rate_id);
        $base_amount = $rate->price_per_night * $request->number_of_people * $nights;
        $discount_amount = $base_amount * ($request->discount / 100);
        $total_after_discount = $base_amount - $discount_amount;
        $total_iva = $total_after_discount * ($rate->iva / 100);
        $total_invoice = $total_after_discount + $total_iva;
    
        $income = new Income($request->all());
        $income->nights = $nights;
        $income->total_iva = $total_iva;
        $income->total_invoice = $total_invoice;
        $income->save();
    
        return redirect()->route('incomes.index')->with('success', 'Ingreso creado correctamente.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $intermediaries = Intermediary::all();
        $apartments = Apartment::all();
        $rates = Rate::all();
        return view('incomes.edit', compact('income', 'intermediaries', 'apartments', 'rates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        $request->validate([
            'intermediary_id' => 'nullable|exists:intermediaries,id',
            'apartment_id' => 'required|exists:apartments,id',
            'rate_id' => 'required|exists:rates,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_nif' => 'required|string|max:255',
            'client_phone' => 'required|string|max:255',
            'number_of_people' => 'required|integer',
            'discount' => 'required|numeric',
            'observations' => 'nullable|string'
        ]);
    
        $nights = (new \DateTime($request->check_out))->diff(new \DateTime($request->check_in))->days;
        $rate = Rate::findOrFail($request->rate_id);
        $base_amount = $rate->price_per_night * $request->number_of_people * $nights;
        $discount_amount = $base_amount * ($request->discount / 100);
        $total_after_discount = $base_amount - $discount_amount;
        $total_iva = $total_after_discount * ($rate->iva / 100);
        $total_invoice = $total_after_discount + $total_iva;
    
        $income->fill($request->all());
        $income->nights = $nights;
        $income->total_iva = $total_iva;
        $income->total_invoice = $total_invoice;
        $income->save();
    
        return redirect()->route('incomes.index')->with('success', 'Ingreso actualizado correctamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Ingreso eliminado correctamente.');
    }

    /**
     * Load rates for the selected apartment currently
     */
    public function getRatesForApartment($apartment_id)
    {
        $rates = Rate::where('apartment_id', $apartment_id)->get();
        return response()->json($rates);
    }
}
