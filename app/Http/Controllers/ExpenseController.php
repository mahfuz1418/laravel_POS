<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('d/m/y');
        $expense = Expense::where('date', $date)->get();
        return view('project.expense.today_expense', compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.expense.add_expense');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        Expense::insert([
            'details' => $request->details,
            'amount' => $request->amount,
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'created_at' => now(),
        ]);


        $notification = array(
            'message' => 'Today Expense Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('project.expense.edit_expense', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $expense->update([
            'details' => $request->details,
            'amount' => $request->amount,
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'updated_at' => now(),
        ]);


        $notification = array(
            'message' => 'Today Expense Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }


    public function MonthlyExpense()
    {
        $month = date('F');
        $monthly_expense = Expense::where('month', $month)->get();
        return view('project.expense.monthly_expense', compact('monthly_expense'));
    }

    public function YearlyExpense()
    {
        $year = date('Y');
        $yearly_expense = Expense::where('year', $year)->get();
        $total = Expense::where('year', $year)->sum('amount');
        return view('project.expense.yearly_expense', compact('yearly_expense', 'total'));
    }

    public function JanuaryExpense()
    {
        $month = 'January';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense', 'total'));
    }

    public function FebruaryExpense()
    {
        $month = 'February';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function MarchExpense()
    {
        $month = 'March';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function AprilExpense()
    {
        $month = 'April';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function MayExpense()
    {
        $month = 'May';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function JuneExpense()
    {
        $month = 'June';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function JulyExpense()
    {
        $month = 'July';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function AugustExpense()
    {
        $month = 'August';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function SeptemberExpense()
    {
        $month = 'September';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function OctoberExpense()
    {
        $month = 'October';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function NovemberExpense()
    {
        $month = 'November';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense','total'));
    }

    public function DecemberExpense()
    {
        $month = 'December';
        $monthly_expense = Expense::where('month', $month)->get();
        $total = Expense::where('month', $month)->sum('amount');
        return view('project.expense.monthly_expense', compact('monthly_expense', 'total'));
    }
}
