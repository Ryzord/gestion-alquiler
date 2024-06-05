<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los ingresos
        $incomes = Income::all();

        // Calcular el total de ingresos
        $totalIncomes = $incomes->sum('total_invoice');

        // Obtener todos los gastos
        $expenses = Expense::all();

        // Calcular el total de gastos
        $totalExpenses = $expenses->sum('total_invoice');

        // Calcular el resultado
        $result = $totalIncomes - $totalExpenses;

        // Definir el trimestre actual
        $currentQuarter = ceil(Carbon::now()->quarter);

        // Calcular el total de ingresos y gastos del trimestre
        $totalQuarterlyIncomes = $incomes->sum('total_iva');
        $totalQuarterlyExpenses = $expenses->sum('total_iva');

        // Calcular el IVA trimestral
        $quarterlyVAT = $totalQuarterlyIncomes - $totalQuarterlyExpenses;

        return view('dashboard', [
            'incomes' => $incomes,
            'totalIncomes' => $totalIncomes,
            'expenses' => $expenses,
            'totalExpenses' => $totalExpenses,
            'result' => $result,
            'currentQuarter' => "Total Anual",
            'totalQuarterlyIncomes' => $totalQuarterlyIncomes,
            'totalQuarterlyExpenses' => $totalQuarterlyExpenses,
            'quarterlyVAT' => $quarterlyVAT, // Asegúrate de incluir esta variable en la vista
        ]);
    }

    public function calculateQuarterlyVAT(Request $request)
    {
        $quarter = $request->quarter;
        $year = Carbon::now()->year;

        // Definir las fechas de inicio y fin del trimestre según el trimestre seleccionado
        switch ($quarter) {
            case 1:
                $startOfQuarter = Carbon::create($year, 1, 1)->startOfDay();
                $endOfQuarter = Carbon::create($year, 3, 31)->endOfDay();
                break;
            case 2:
                $startOfQuarter = Carbon::create($year, 4, 1)->startOfDay();
                $endOfQuarter = Carbon::create($year, 6, 30)->endOfDay();
                break;
            case 3:
                $startOfQuarter = Carbon::create($year, 7, 1)->startOfDay();
                $endOfQuarter = Carbon::create($year, 9, 30)->endOfDay();
                break;
            case 4:
                $startOfQuarter = Carbon::create($year, 10, 1)->startOfDay();
                $endOfQuarter = Carbon::create($year, 12, 31)->endOfDay();
                break;
            default:
                // Manejar el caso de trimestre inválido
                return redirect()->back()->withErrors(['quarter' => 'Trimestre inválido']);
        }

        // Obtener todos los ingresos que caen dentro del trimestre seleccionado
        $quarterlyIncomes = Income::whereBetween('check_in', [$startOfQuarter, $endOfQuarter])->get();

        // Obtener todos los gastos que caen dentro del trimestre seleccionado
        $quarterlyExpenses = Expense::whereBetween('date', [$startOfQuarter, $endOfQuarter])->get();

        // Calcular el total de ingresos y gastos del trimestre
        $totalQuarterlyIncomes = $quarterlyIncomes->sum('total_iva');
        $totalQuarterlyExpenses = $quarterlyExpenses->sum('total_iva');

        // Calcular el IVA trimestral
        $quarterlyVAT = $totalQuarterlyIncomes - $totalQuarterlyExpenses;

        // Obtener todos los ingresos para mostrar en la vista general
        $incomes = Income::all();

        // Calcular el total de ingresos
        $totalIncomes = $incomes->sum('total_invoice');

        // Obtener todos los gastos para mostrar en la vista general
        $expenses = Expense::all();

        // Calcular el total de gastos
        $totalExpenses = $expenses->sum('total_invoice');

        // Calcular el resultado general
        $result = $totalIncomes - $totalExpenses;

        // Obtener el trimestre actual
        $currentQuarter = $quarter;

        // Pasar todas las variables a la vista
        return view('dashboard', [
            'incomes' => $incomes,
            'totalIncomes' => $totalIncomes,
            'expenses' => $expenses,
            'totalExpenses' => $totalExpenses,
            'result' => $result,
            'currentQuarter' => $currentQuarter."º trimestre",
            'quarterlyVAT' => $quarterlyVAT,
            'quarterlyIncomes' => $quarterlyIncomes,
            'totalQuarterlyIncomes' => $totalQuarterlyIncomes,
            'quarterlyExpenses' => $quarterlyExpenses,
            'totalQuarterlyExpenses' => $totalQuarterlyExpenses,
            'startOfQuarter' => $startOfQuarter,
            'endOfQuarter' => $endOfQuarter,
        ]);
    }

}
