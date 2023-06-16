<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.product.all_product', [
            'product_info' => Product::all(),
            'trash_product' => Product::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.product.add_product', [
            'category' => Category::all(),
            'supplier' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'product_image' => 'mimes:png,jpg,jpeg',
        ]);

        $file_name = auth()->id() . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
        $image = Image::make($request->file('product_image'));
        $destination = public_path('uploads/product/');
        $image->save($destination.$file_name);
        Product::insert([
            'product_name' => $request->product_name,
            'cat_id' => $request->cat_id,
            'sup_id' => $request->sup_id,
            'product_code' => $request->product_code,
            'product_godown' => $request->product_godown,
            'product_route' => $request->product_route,
            'buying_date' => $request->buying_date,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'expire_date' => $request->expire_date,
            'product_image' => $file_name,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('project.product.view_product', compact('product') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('project.product.edit_product', compact('product', 'category', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'  => 'required',
            'cat_id'        => 'required',
            'sup_id'        => 'required',
            'product_code'  => 'required',
            'product_godown'=> 'required',
            'product_route' => 'required',
            'buying_date'   => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
            'expire_date'   => 'required',
            'product_image' => 'mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('product_image')) {

            $file_name = auth()->id() . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
            $image = Image::make($request->file('product_image'));
            $destination = public_path('uploads/product/');
            $image->save($destination.$file_name);

            $product->update([
                'product_name' => $request->product_name,
                'cat_id' => $request->cat_id,
                'sup_id' => $request->sup_id,
                'product_code' => $request->product_code,
                'product_godown' => $request->product_godown,
                'product_route' => $request->product_route,
                'buying_date' => $request->buying_date,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'expire_date' => $request->expire_date,
                'product_image' => $file_name,
                'updated_at' => now(),
            ]);
    
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        } else {

            $product->update([
                'product_name' => $request->product_name,
                'cat_id' => $request->cat_id,
                'sup_id' => $request->sup_id,
                'product_code' => $request->product_code,
                'product_godown' => $request->product_godown,
                'product_route' => $request->product_route,
                'buying_date' => $request->buying_date,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'expire_date' => $request->expire_date,
                'updated_at' => now(),
            ]);
    
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function restore($id)
    {
        Product::onlyTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Product Restored Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function delete($id)
    {
        Product::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Product Deleted From Trash Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request) 
    {
        Excel::import(new ProductsImport, $request->file('import_file'));
        
        $notification = array(
            'message' => 'Product imported by excel file',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


}
