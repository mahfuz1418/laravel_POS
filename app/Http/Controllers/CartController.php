<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

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


}
