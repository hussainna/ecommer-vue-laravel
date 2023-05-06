<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            
        ]);
        $token=$user->createToken($user->email.'_token')->plainTextToken;
        return response()->json([
            'status'=>200,
            'message'=>'the register success',
            'user'=>$user->name,
            'token'=>$token,
        ]);
    }

    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if(! $user || !Hash::check($request->password,$user->password)){
            return response()->json([
                'status'=>401,
                'message'=>'The email or password is wrong'
            ]);
        }
        else{
            $token=$user->createToken($user->email.'_token')->plainTextToken;


            return response()->json([
                'status'=>200,
                'message'=>'the login success',
                'user'=>$user->name,
                'token'=>$token,
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status'=>200,
            'message'=>'logout successfully'
        ]);
    }
}
