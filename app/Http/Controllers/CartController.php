<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart(Request $request)
    {
        Cart::add([
            'id' => $request->id, 
            'name' => $request->name, 
            'qty' => $request->qty, 
            'price' => $request->price
        ]);

        $notification = array(
            'message' => 'Cart Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }

    public function UpdateCart(Request $request, $rowId)
    {
        Cart::update($rowId, ['qty' => $request->qty]);

        $notification = array(
            'message' => 'Quantity Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);

        $notification = array(
            'message' => 'Cart removed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function ViewInvoice(Request $request)
    {
        $request->validate([
            'customer_name' => 'required'
        ]);

        $id = $request->customer_name;
        $customer_details = Customer::find($id);
        return view('project.pos.invoice', compact('customer_details'));
    }

    public function FinalInvoice(Request $request)
    {
    
        $order_id = DB::table('orders')->insertGetId([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'order_status' => $request->order_status,
            'total_product' => $request->total_product,
            'subtotal' => $request->subtotal,
            'vat' => $request->vat,
            'total' => $request->total,
            'payment_type' => $request->payment_type,
            'pay' => $request->pay,
            'due' => $request->due,
            'created_at' => now(),
        ]);

        $contents = Cart::content();

        foreach ($contents as $content) {
            DB::table('orderdetails')->insert([
                'order_id' => $order_id,
                'product_id' => $content->id,
                'quantity' => $content->qty,
                'unit_cost' => $content->subtotal,
                'total' => $content->qty*$content->subtotal,
                'created_at' => now(),
            ]);
        }

        $notification = array(
            'message' => 'Successfully Created Invoice, Please accept the order',
            'alert-type' => 'success'
        );
        Cart::destroy();
        return redirect('/pos/dashboard')->with($notification);
    }

    public function UpdateInvoice(Request $request, $id)
    {
        DB::table('orders')->where('id', $id)->update([
            'pay' => $request->pay,
            'due' => $request->due,
            'payment_type' => $request->payment_type,
            'order_status' => 'approved',
            'updated_at' => now(),
        ]);

        $notification = array(
            'message' => 'Successfully order approved',
            'alert-type' => 'success'
        );
        return redirect('/pending-order')->with($notification);

    }


}
