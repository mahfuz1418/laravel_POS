<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function index() 
    {
        return view('project.supplier.add_supplier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:20',
            'email'         => 'max:255|unique:employees',
            'photo'         => 'required|mimes:jpg,jpeg,png',
            'address'       => 'required|max:255',
            'supplier_type' => 'required',
            'account_number'=> 'max:30',
            'city'          => 'required',
            'shop_name'     => 'required',
        ]);

        $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $image = Image::make($request->file('photo'));
        $destination = public_path('uploads/supplier/');
        $image->save($destination.$file_name);
        Supplier::insert([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'photo'          => $file_name,
            'address'        => $request->address,
            'city'           => $request->city,
            'supplier_type'  => $request->supplier_type,
            'shop_name'      => $request->shop_name,
            'bank_name'      => $request->bank_name,
            'bank_branch'    => $request->bank_branch,
            'account_name'   => $request->account_name,
            'account_number' => $request->account_number,
            'created_at'     => now(),
        ]);

        $notification = array(
            'message' => 'Supplier Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function AllSupplier()
    {
        $supplier_info = Supplier::all();
        $trash_supplier = Supplier::onlyTrashed()->get();
        return view('project.supplier.all_supplier', compact('supplier_info' , 'trash_supplier'));
    }
    
    public function DestroySupplier($id)
    {
        
        Supplier::find($id)->delete();
        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function RestoreSupplier($id){
        Supplier::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Supplier Restored Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function DeleteSupplier($id)
    {
        $supplier_photo = Supplier::onlyTrashed()->find($id)->photo;
        unlink('uploads/supplier/' . $supplier_photo);
        Supplier::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Supplier Removed From Trash Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function ViewSupplier($id)
    {
        $single_supplier = Supplier::find($id);
        return view('project.supplier.view_supplier', compact('single_supplier'));

    }

    public function EditSupplier($id)
    {
        $single_supplier = Supplier::find($id);
        return view('project.supplier.edit_supplier', compact('single_supplier'));
    }

    public function UpdateSupplier(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'phone'         => 'required|max:20',
            'email'         => 'max:255',
            'photo'         => 'mimes:jpg,jpeg,png',
            'address'       => 'required|max:255',
            'supplier_type' => 'required',
            'account_number'=> 'max:30',
            'city'          => 'required',
            'shop_name'     => 'required',
        ]);

        $supplier_photo = Supplier::find($id)->photo;

        if ($request->hasFile('photo')) {

            unlink('uploads/supplier/'.$supplier_photo);
            $file_name = auth()->id() . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $image = Image::make($request->file('photo'));
            $destination = public_path('uploads/supplier/');
            $image->save($destination.$file_name);
            Supplier::find($id)->update([
                'name'           => $request->name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'photo'          => $file_name,
                'address'        => $request->address,
                'city'           => $request->city,
                'supplier_type'  => $request->supplier_type,
                'shop_name'      => $request->shop_name,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'account_name'   => $request->account_name,
                'account_number' => $request->account_number,
                'updated_at'     => now(),
            ]);
        } else {
            Supplier::find($id)->update([
                'name'           => $request->name,
                'email'          => $request->email,
                'phone'          => $request->phone,
                'address'        => $request->address,
                'city'           => $request->city,
                'supplier_type'  => $request->supplier_type,
                'shop_name'      => $request->shop_name,
                'bank_name'      => $request->bank_name,
                'bank_branch'    => $request->bank_branch,
                'account_name'   => $request->account_name,
                'account_number' => $request->account_number,
                'updated_at'     => now(),
            ]);
        }

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
