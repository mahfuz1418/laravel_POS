<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $customers = Customer::all();
        return view('project.pos.pos_system', compact('products', 'categories', 'customers'));
    }

    public function PendingOrder()
    {
        $pending_orders = DB::table('orders')
                          ->join('customers', 'orders.customer_id', 'customers.id')
                          ->select('customers.name', 'orders.*')
                          ->where('order_status', 'pending')->get();
        return view('project.order.pending_order', compact('pending_orders'));
    }

    public function ConfirmOrder($id)
    {
        $pending_orders = DB::table('orders')
                          ->join('customers', 'orders.customer_id', 'customers.id')
                          ->select('customers.*', 'orders.*')
                          ->where('orders.id', $id)
                          ->first();

        $order_details  = DB::table('orderdetails')
                          ->join('products', 'orderdetails.product_id', 'products.id')
                          ->where('order_id', $id)
                          ->select('orderdetails.*', 'products.product_name', 'products.product_code')
                          ->get();

        return view('project.order.order_confirmation', compact('pending_orders','order_details'));
        // return $pending_orders;
    }

    public function ApprovedOrder()
    {
        $approved_order = DB::table('orders')
                          ->join('customers', 'orders.customer_id', 'customers.id')
                          ->select('customers.name', 'orders.*')
                          ->where('order_status', 'approved')->get();
        return view('project.order.approved_order', compact('approved_order'));
    }

    

   
}
