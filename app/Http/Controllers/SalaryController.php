<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function AddAdvanceSalary()
    {
        return view('project.salary.add_advance_salary' );
    }

    public function StoreAdvanceSalary(Request $request)
    {
        $request->validate([
            'emp_id'         => 'required',
            'advance_salary' => 'required',
            'month'          => 'required',
            'year'           => 'required',
        ]);

        $emp_id = $request->emp_id;
        $month  = $request->month;
        $year   = $request->year;

        $advance = AdvanceSalary::where('emp_id', $emp_id)
                                ->where('month', $month)
                                ->where('year', $year)
                                ->first();

        if ($advance === NULL) {
            AdvanceSalary::insert([
                'emp_id'         => $request->emp_id,
                'month'          => $request->month,
                'year'           => $request->year,
                'advance_salary' => $request->advance_salary,
                'created_at'     => now(),
            ]);
    
            $notification = array(
                'message'    => 'Advance Salary Given Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);


        } else {
            $notification = array(
                'message' => 'Already Advance given to this employee on this month!!',
                'alert-type' => 'error'
            );
            return back()->with($notification);

        }
        

        

    }

    public function AllAdvanceSalary()
    {
        $employee = DB::table('employees')
                    ->join('advance_salaries', 'employees.id', 'advance_salaries.emp_id')
                    ->select('advance_salaries.*', 'employees.*')
                    ->get();

        return view('project.salary.all_advance_salary', compact( 'employee'));
    }

    public function EditAdvanceSalary($id)
    {
        $employee_data = AdvanceSalary::find($id);
        return view('project.salary.edit_advance_salary', compact('employee_data'));
    }

    public function UpdateAdvanceSalary(Request $request, $id)
    {
        $request->validate([
            'advance_salary' => 'required',
            'month'          => 'required',
            'year'           => 'required',
        ]);

        AdvanceSalary::find($id)->update([
            'month'          => $request->month,
            'year'           => $request->year,
            'advance_salary' => $request->advance_salary,
            'created_at'     => now(),
        ]);

        $notification = array(
            'message' => 'Advance Salary Data Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function DestroyAdvanceSalary($id)
    {
        AdvanceSalary::find($id)->delete();

        $notification = array(
            'message' => 'Advance Salary Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function PaySalary()
    {
        $employee = Employee::all();
        return view('project.salary.pay_salary', compact('employee'));
    }
}
