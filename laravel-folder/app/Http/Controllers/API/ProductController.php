<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function insert(Request $request)
    {
        $rules=[
            'slug'=>'required|max:191',
            'name'=>'required|max:191',
            'description'=>'required|max:191',
            'price'=>'required|numeric',
            'img'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=>'required|numeric',
            'qty'=>'required|numeric',
        ];

        $message=[
            'name.required' => 'The name input is require',
            'slug.required' => 'The slug input is require',
            'description.required' => 'The description input is require',
            'img.required' => 'The img input is require',
            'category_id.required' => 'The category_id input is require',
            'qty.required' => 'The Amount input is require',
            'qty.numeric' => 'The Amount must be number',
            'price.numeric' => 'The price must be number',

        ];

        $validator=Validator::make($request->all(),$rules,$message);
        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $product=new Products();
            $product->name=$request->input('name');
            $product->slug=$request->input('slug');
            $product->price=$request->input('price');
            $product->description=$request->input('description');
            $product->category_id=$request->input('category_id');
            $product->qty=$request->input('qty');
            
            if($request->file('img'))
            {
                $file=$request->file('img');
                $extension=$file->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
                $file->move('uploads/products/',$fileName);
                $product->img='uploads/products/'.$fileName;
            }
            $product->save();
            return response()->json([
                'status'=>200,
                'message'=>'the product successfully added',
            ]);
        }
    }

    public function index()
    {
        $product=Products::all();
        return response()->json([
            'status'=>200,
            'product'=>$product,
        ]);
    }

    public function delete($id)
    {
        $product=Products::find($id);
        $product->delete();
        return response()->json([
            'status'=>200,
            'message'=>'the product successfully deleted',
        ]);
    }

    public function edit($id)
    {
        $product=Products::find($id);
        return response()->json([
            'status'=>200,
            'product'=>$product,
        ]);
    }

    public function update(Request $request,$id)
    {
        $product=Products::find($id);

        $rules=[
            'slug'=>'required|max:191',
            'name'=>'required|max:191',
            'description'=>'required|max:191',
            'price'=>'required|numeric',
            'img'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=>'required|numeric',
            'qty'=>'required|numeric',
        ];

        $message=[
            'name.required' => 'The name input is require',
            'slug.required' => 'The slug input is require',
            'description.required' => 'The description input is require',
            'img.required' => 'The img input is require',
            'category_id.required' => 'The category_id input is require',
            'qty.required' => 'The Amount input is require',
            'qty.numeric' => 'The Amount must be number',
            'price.numeric' => 'The price must be number',

        ];

        $validator=Validator::make($request->all(),$rules,$message);
        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $product=Products::find($id);
            $product->name=$request->input('name');
            $product->slug=$request->input('slug');
            $product->price=$request->input('price');
            $product->description=$request->input('description');
            $product->category_id=$request->input('category_id');
            $product->qty=$request->input('qty');
            
            if($request->file('img'))
            {
                $path=$product->img;
                if(File::exists($path))
                {
                    File::delete($path);
                }

                $file=$request->file('img');
                $extension=$file->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
                $file->move('uploads/products/',$fileName);
                $product->img='uploads/products/'.$fileName;
            }
            $product->update();
            return response()->json([
                'status'=>200,
                'message'=>'the product successfully updated',
            ]);
        }
    }

    public function ProductWithCategory($id)
    {
        $product=Products::where('category_id',$id)->get();
        return response()->json([
            'status'=>200,
            'product'=>$product
        ]);
    }

    public function search($id)
    {
        $product=Products::where('slug',$id)->get();

        return response()->json([
            'status'=>200,
            'product'=>$product
        ]);
    }

    public function single($id)
    {
        $product=Products::find($id);
        return response()->json([
            'status'=>200,
            'product'=>$product
        ]);
    }
}
