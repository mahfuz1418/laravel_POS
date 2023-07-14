<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function paySalary()
    {
        $prev_month = date("F", strtotime("-1 month"));
        $employee = Employee::all();
        return view('project.salary.pay_salary', compact('employee'));
        // return $employee;
    }

    public function payNow($id)
    {
        $employee = Employee::find($id);    
        $advance = AdvanceSalary::where('emp_id', $id)->value('advance_salary');
        return view('project.salary.pay_now', compact('employee', 'advance'));
        // return $advance;
    }

    public function payConfirm(Request $request, $id)
    {
        $request->validate([
            'paid_amount' => 'required|integer',
        ]);

        $employee = Employee::find($id); 
        $month = Employee::where('id', $id)->value('salary_month');   
        $status = Employee::where('id', $id)->value('salary_status');   
        $emp_id = Salary::where('emp_id', $id)->value('emp_id');   

        if ($emp_id == $id && $month == date("F", strtotime("-1 month")) && $status == 'paid') {
            
            $notification = array(
                'message' => 'Salary Allready given on ' . $month,
                'alert-type' => 'error'
            );
            return back()->with($notification);

        } else {

            Salary::insert([
                'emp_id'         => $id,
                'salary'         => $employee->salary,
                'paid_amount'    => $request->paid_amount,
                'payment_method' => $request->payment_method,
                'month'          => date("F", strtotime("-1 month")),
                'year'           => date("Y"),
                'status'         => 'paid',
                'created_at'     => now(),
            ]);

            Employee::find($id)->update([
                'salary_month'  => date("F", strtotime("-1 month")),
                'salary_status' => 'paid',
            ]);

            $notification = array(
                'message' => 'Salary Successfully Given To Employee',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        
    }

    public function salaryData()
    {
        return view('project.salary.salary_data');
    }

    public function advanceSalary($id)
    {
        $employee = Employee::find($id);    
        return view('project.salary.add_advance_salary', compact('employee'));
    }

    public function advanceStore(Request $request, $id)
    {
        $request->validate([
            'pay_advance' => 'required',
        ]);
        $salary = Employee::find($id)->value('salary');

        if ($salary < $request->pay_advance) {
            $notification = array(
                'message' => "You cann't pay advance out of salary range!",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        } else {
            $advance_check = AdvanceSalary::where('emp_id', $id)->value('advance_salary');

            if ($advance_check == NULL) {
                AdvanceSalary::insert([
                    'emp_id'          => $id,
                    'advance_salary'  => $request->pay_advance,
                    'month'           => date('M'),
                    'year'            => date("Y"),
                    'created_at'      => now(),
                    ]);
    
                $notification = array(
                    'message' => "Advance Given To Employee",
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            } else {
                $notification = array(
                    'message' => "You can give advance in a month only one!",
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
            
            
        }
        

        
    }
}
