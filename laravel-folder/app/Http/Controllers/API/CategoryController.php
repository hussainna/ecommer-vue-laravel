<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;


class CategoryController extends Controller
{
    public function insert(Request $request)
    {

        $rules=[
            'slug'=>'required|max:191',
            'name'=>'required|max:191',
            'description'=>'required|max:191',
        ];

        $message=[
            'name.required' => 'The name input is require',
            'slug.required' => 'The slug input is require',
            'description.required' => 'The description input is require',

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
            $category=new Category();
            $category->name=$request->input('name');
            $category->slug=$request->input('slug');
            $category->description=$request->input('description');
            $category->save();
            return response()->json([
                'status'=>200,
                'message'=>'category successfully added'
            ]);
        }
    }

    public function index()
    {
        $category=Category::all();
        return response()->json([
            'status'=>200,
            'category'=>$category,
        ]);


    }

    public function edit($id)
    {
        $category=Category::find($id);
        return response()->json([
            'status'=>200,
            'category'=>$category,
        ]);
    }

    public function update(Request $request,$id)
    {
        $rules=[
            'slug'=>'required|max:191',
            'name'=>'required|max:191',
            'description'=>'required|max:191',
        ];

        $message=[
            'name.required' => 'The name input is require',
            'slug.required' => 'The slug input is require',
            'description.required' => 'The description input is require',

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
            $category=Category::find($id);
            $category->name=$request->input('name');
            $category->slug=$request->input('slug');
            $category->description=$request->input('description');
            $category->update();
            return response()->json([
                'status'=>200,
                'message'=>'Category Successfully Update'
            ]);
        }
    }

    public function delete($id)
    {
        $category=Category::find($id);
        $category->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Category Successfully Deleted'
        ]);
    }
}
