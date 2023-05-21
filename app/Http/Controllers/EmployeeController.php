<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index(){
        return view('project.add_employee');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:employees',
            'address' => 'required|max:255',
            'nid_no' => 'max:20|unique:employees',
            'phone' => 'required|max:15',
            'photo' => 'required',
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

        return back()->with('success', 'Your data inserted successfully');
    }
}
