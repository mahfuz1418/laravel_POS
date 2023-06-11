<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;

class PosController extends Controller
{

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $customers = Customer::all();
        return view('project.pos.pos_system', compact('products', 'categories', 'customers'));
    }

   
}
