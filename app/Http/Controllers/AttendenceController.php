<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendence = Attendence::select('att_date')->groupBy('att_date')->get();
        return view('project.attendence.all_attendence', compact('attendence'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        return view('project.attendence.take_attendence', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $today_date = date('d_m_y');
        $date = Attendence::where('att_date', $today_date)->value('att_date');

        if ($date == $today_date) {

            $notification = array(
                'message' => 'Attendence Already Taken!',
                'alert-type' => 'error'
            );
            return back()->with($notification);

        } else {

            foreach ($request->emp_id as  $id) {
                Attendence::insert([
                    'emp_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'att_date' => $request->att_date,
                    'att_month' => $request->att_month,
                    'att_year' => $request->att_year,
                    'created_at' => now(),
                ]);
            }
            $notification = array(
                'message' => 'Attendence Taken Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
        

        

    }

    /**
     * Display the specified resource.
     */
    public function show(Attendence $attendence)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendence $attendence)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendence $attendence)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendence $attendence)
    {
        
    }

    public function EditAttendence($att_date)
    {
        $employee = DB::table('attendences')
                        ->join('employees', 'attendences.emp_id', '=', 'employees.id')
                        ->select('employees.name', 'employees.photo', 'attendences.*')
                        ->where('att_date', $att_date)->get();
        return view('project.attendence.edit_attendence', compact('employee', 'att_date'));
    }

    public function UpdateAttendence(Request $request, $att_date)
    {
        $request->validate([
            '*' => 'required',
        ]);


        foreach ($request->id as  $id) {
            $attendence = Attendence::where(['att_date' => $att_date, 'id'=>$id])->first();

            $attendence->update([
                'attendence' => $request->attendence[$id],
                'updated_at' => now(),
            ]);
        }

        $notification = array(
            'message' => 'Attendence Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }

    public function ShowAttendence($att_date)
    {
        $employee = DB::table('attendences')
                        ->join('employees', 'attendences.emp_id', '=', 'employees.id')
                        ->select('employees.name', 'employees.photo', 'attendences.*')
                        ->where('att_date', $att_date)->get();
        return view('project.attendence.show_attendence', compact('employee', 'att_date'));
    }

    public function DeleteAttendence($att_date)
    {

        $attendences = Attendence::where('att_date' , $att_date)->get();

        foreach ($attendences as $attendence) {
            $attendence->delete();
        }

        $notification = array(
            'message' => 'Attendence Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
