<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderItems;
use Illuminate\Support\Facades\Validator;
use App\Models\Orders;
use App\Models\Cart;

class CheckOutController extends Controller
{
    public function insert(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'firstname'=>'required|max:191',
            'phone'=>'required|max:191',
            'lastname'=>'required|max:191',
            'email'=>'required|max:191',
            'address'=>'required|max:191',
            'city'=>'required|max:191',
            'state'=>'required|max:191',
            'zipcode'=>'required|max:191',
            
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {

        $user_id=auth('sanctum')->user()->id;

        $order=new Order;
        $order->firstname=$request->firstname;
        $order->lastname=$request->lastname;
        $order->user_id=$user_id;
        $order->phone=$request->phone;
        $order->email=$request->email;
        $order->city=$request->city;
        $order->address=$request->address;
        $order->state=$request->state;
        $order->zipcode=$request->zipcode;
        $order->save();

        $cart=Cart::where('user_id',$user_id)->get();
         $orderItems=[];
         foreach($cart as $item){
            $orderItems[]=[
                'product_id'=>$item->product_id,
                'qty'=>$item->qty,
                'price'=>$item->products->price,
            ];
         }
         $order->OrderItems()->createMany($orderItems);
         Cart::destroy($cart);
         return response()->json([
             'status'=>200,
             'message'=>'Order  Placed Success'
         ]);
        }
    }
}
