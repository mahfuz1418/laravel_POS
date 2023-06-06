<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategorty()
    {
        return view('project.category.add_category');
    }

    public function StoreCategorty(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
        ]);

        Category::insert([
            'cat_name' => $request->cat_name,
            'created_at' => now()
        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function AllCategorty()
    {
        $category = Category::all();
        return view('project.category.all_category', compact('category'));
    }

    public function DeleteCategorty($id)
    {
        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('project.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required',
        ]);

        Category::find($id)->update([
            'cat_name' => $request->cat_name,
            'updated_at' => now()
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
