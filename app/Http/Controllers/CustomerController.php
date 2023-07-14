<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function index()
    {
        return view('project.customer.add_customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:20',
            'email'         => 'max:255|unique:employees',
            'photo'         => 'mimes:jpg,jpeg,png',
            'address'       => 'required|max:255',
            'account_number'=> 'max:30',
            'city'          => 'required',
            'shop_name'     => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $image = Image::make($request->file('photo'));
            $destination = public_path('uploads/customer/');
            $image->save($destination.$file_name);
            Customer::insert([
                'name'           => $request->name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'photo'          => $file_name,
                'address'        => $request->address,
                'city'           => $request->city,
                'shop_name'      => $request->shop_name,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'account_name'   => $request->account_name,
                'account_number' => $request->account_number,
                'created_at'     => now(),
            ]);
        } else {
            Customer::insert([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'city'          => $request->city,
                'shop_name'     => $request->shop_name,
                'bank_name'     => $request->bank_name,
                'bank_branch'   => $request->bank_branch,
                'account_name'  => $request->account_name,
                'account_number'=> $request->account_number,
                'created_at'    => now(),
            ]);
        }

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
        
    }

    public function AllCustomer()
    {
        $trash_customer = Customer::onlyTrashed()->get();
        $customer_info = Customer::all();
        return view('project.customer.all_customer', compact('customer_info' , 'trash_customer' ));
    }



    public function ViewCustomer($id)
    {
        $single_customer = Customer::find($id);
        return view('project.customer.view_customer', compact('single_customer'));
    }

    public function EditCustomer($id) 
    {
        $single_customer = Customer::find($id);
        return view('project.customer.edit_customer', compact('single_customer'));
    }

    public function UpdateCustomer(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:20',
            'email'         => 'max:255|unique:employees',
            'photo'         => 'mimes:jpg,jpeg,png',
            'address'       => 'required|max:255',
            'account_number'=> 'max:30',
            'city'          => 'required',
            'shop_name'     => 'required',
        ]);

        $customer_photo = Customer::find($id)->photo;

        if ($request->hasFile('photo')) {

            if (!empty($customer_photo )) {
                unlink('uploads/customer/'.$customer_photo);
            }
            
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $image = Image::make($request->file('photo'));
            $destination = public_path('uploads/customer/');
            $image->save($destination.$file_name);
            Customer::find($id)->update([
                'name'           => $request->name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'photo'          => $file_name,
                'address'        => $request->address,
                'city'           => $request->city,
                'shop_name'      => $request->shop_name,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'account_name'   => $request->account_name,
                'account_number' => $request->account_number,
                'updated_at'     => now(),
            ]);
        } else {
            Customer::find($id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'city'          => $request->city,
                'shop_name'     => $request->shop_name,
                'bank_name'     => $request->bank_name,
                'bank_branch'   => $request->bank_branch,
                'account_name'  => $request->account_name,
                'account_number'=> $request->account_number,
                'updated_at'    => now(),
            ]);
        }

        $notification = array(
            'message' => 'Customer Data Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function DestroyCustomer($id) 
    {
        Customer::find($id)->delete();

        $notification = array(
            'message' => 'Customer Removed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function RestoreCustomer($id)
    {
        Customer::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Customer Restored Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function DeleteCustomer($id)
    {
        $customer_photo = Customer::onlyTrashed()->find($id)->photo;
        if (!empty($customer_photo)) {
            unlink('uploads/customer/'. $customer_photo);
        }
        Customer::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Customer Remove From Trash Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
