<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;


class CartController extends Controller
{
    public function insert(Request $request)
    {
        $product_id=$request->input('product_id');
        $qty=$request->input('qty');
        $user_id=auth('sanctum')->user()->id;
        $productCheck=Products::where('id',$product_id)->first();

        if($productCheck)
        {
            if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists())
            {
                return response()->json([
                    'status'=>409,
                    'message'=>$productCheck->name.' its already added to cart'
                ]);
            }
            else
            {
                $cart=new Cart();
                $cart->product_id=$product_id;
                $cart->user_id=$user_id;
                $cart->qty=$qty;
                $cart->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Added to card successfully'
                ]);
            }
        }
    }

    public function index()
    {
        $user_id=auth('sanctum')->user()->id;

        $cart=Cart::where('user_id',$user_id)->get();

        return response()->json([
            'status'=>200,
            'cart'=>$cart,
        ]);
    }

    public function delete($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Delete cart successfully',
        ]);
    }
}
