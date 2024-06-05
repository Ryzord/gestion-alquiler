<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('expenses.create', compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'concept' => 'required|string|max:255',
            'date' => 'required|date',
            'provider_nif' => 'nullable|string|max:255',
            'expense' => 'required|numeric',
            'iva' => 'nullable|numeric',
            'paid' => 'required|boolean'
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'Gasto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $apartments = Apartment::all();
        return view('expenses.edit', compact('expense', 'apartments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'concept' => 'required|string|max:255',
            'date' => 'required|date',
            'provider_nif' => 'nullable|string|max:255',
            'expense' => 'required|numeric',
            'iva' => 'nullable|numeric',
            'paid' => 'required|boolean'
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Gasto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Gasto eliminado correctamente.');
    }
}
