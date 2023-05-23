<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('project.employee.add_employee');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:employees',
            'address' => 'required|max:255',
            'nid_no' => 'max:20|unique:employees',
            'phone' => 'required|max:20',
            'photo' => 'required|mimes:jpg,jpeg,png',
            'salary' => 'required',
        ]);

        $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $image = Image::make($request->file('photo'));
        $destination = public_path('uploads/employee/');
        $image->save($destination.$file_name);
        Employee::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $file_name,
            'address' => $request->address,
            'city' => $request->city,
            'nid_no' => $request->nid_no,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function allEmployee()
     {
        $employee_info = Employee::all();
        return view('project.employee.all_employee', compact('employee_info'));
    }

    public function deleteEmployee($id) 
    {
        $employee_photo = Employee::find($id)->photo;
        unlink('uploads/employee/'.$employee_photo);
        Employee::find($id)->delete();
        $notification = array(
            'message' => 'Employee Removed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function viewEmployee($id)
    {
        $single_employee = Employee::find($id);
        return view('project.employee.view_employee', compact('single_employee'));
    }

    public function editEmployee($id)
    {
        $single_employee = Employee::find($id);
        return view('project.employee.edit_employee', compact('single_employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required',
            'address'   => 'required|max:255',
            'nid_no'    => 'max:20',
            'phone'     => 'required|max:20',
            'photo'     => 'mimes:jpg,jpeg,png',
            'salary'    => 'required',
        ]);
        
        
        
        Employee::find($id)->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'city'       => $request->city,
            'nid_no'     => $request->nid_no,
            'experience' => $request->experience,
            'salary'     => $request->salary,
            'vacation'   => $request->vacation,
            'updated_at' => now(),
        ]);

        $employee_photo = Employee::find($id)->photo;
 
        if ($request->hasFile('photo')) {
            unlink('uploads/employee/'.$employee_photo);
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $image = Image::make($request->file('photo'));
            $destination = public_path('uploads/employee/');
            $image->save($destination.$file_name);
            Employee::find($id)->update([
                'photo'  => $file_name,
            ]);
        }

       
        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

   
}
