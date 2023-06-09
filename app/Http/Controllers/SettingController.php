<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_data = Setting::first();
        return view('project.settings.view_company_data', compact('company_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.settings.add_company_data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Setting::first();
        if ($data == NULL) {
            $request->validate([
                'company_name'   => 'required|max:255',
                'company_logo'   => 'mimes:png,jpg,jpeg',
            ]);
    
            if ($request->hasFile('company_logo')) {
                $file_name = auth()->id() . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
                $image = Image::make($request->file('company_logo'));
                $destination = public_path('uploads/company/');
                $image->save($destination.$file_name);
                
                Setting::insert([
                    'company_name'   => $request->company_name,
                    'email'          => $request->email,
                    'phone'          => $request->phone,
                    'company_logo'   => $file_name,
                    'address'        => $request->address,
                    'city'           => $request->city,
                    'country'        => $request->country,
                    'zip_code'       => $request->zip_code,
                    'created_at'     => now(),
                ]);
            } else {
                Setting::insert([
                    'company_name'   => $request->company_name,
                    'email'          => $request->email,
                    'phone'          => $request->phone,
                    'address'        => $request->address,
                    'city'           => $request->city,
                    'country'        => $request->country,
                    'zip_code'       => $request->zip_code,
                    'created_at'     => now(),
                ]);
            }
    
            $notification = array(
                'message' => 'Company Data Inserted Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } else {
            $notification = array(
                'message' => 'You already inserted your company data! Now you can only edit data',
                'alert-type' => 'error'
            );
            return back()->with($notification);
            
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('project.settings.edit_company_data', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'company_name'   => 'required|max:255',
            'company_logo'   => 'mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('company_logo')) {
            $file_name = auth()->id() . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
            $image = Image::make($request->file('company_logo'));
            $destination = public_path('uploads/company/');
            $image->save($destination.$file_name);
            
            $setting->update([
                'company_name'   => $request->company_name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'company_logo'   => $file_name,
                'address'        => $request->address,
                'city'           => $request->city,
                'country'        => $request->country,
                'zip_code'       => $request->zip_code,
                'updated_at'     => now(),
            ]);
        } else {
            $setting->update([
                'company_name'   => $request->company_name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'address'        => $request->address,
                'city'           => $request->city,
                'country'        => $request->country,
                'zip_code'       => $request->zip_code,
                'created_at'     => now(),
            ]);
        }

        $notification = array(
            'message' => 'Company Data Inserted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
