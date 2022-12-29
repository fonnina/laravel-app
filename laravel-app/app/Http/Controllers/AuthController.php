<?php

namespace App\Http\Controllers;
//use App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:50|string',
            'email'=>'email|required|min:3|max:50|unique:users',
            'password'=>'required|min:7|max:30|string'
        ]);
        if($validator->fails())
            return response()->json($validator->errors());
        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['data'=>$user, 'access_token'=>$token, 'token_type'=>'Bearer']);
    }
    public function login(Request $req)
    {
        if(!Auth::attempt($req->only('email','password'))){
            return response()->json(['message'=> 'Unauthorized access'],401);
        }
        $user = User::where('email', $req['email'])->firstOrFail();

        $token= $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message'=>'Welcome '.$user->name, 'access_token'=>$token, 'token_type'=>'Bearer']);
    }

    // public function login(Request $req)
    // {
    //     $user = User::where("email", $req->email)->first();
    //     if (!$user || !Hash::check($req->password, $user->password)) {
    //         return response()->json([
    //             "error" => "Invalid credentials"
    //         ], 400);
    //     }
    //     return $user->createToken($user->email)->plainTextToken;
    // }
    // public function registration(Request $req)
    // {
    //     $user = User::where("email", $req->email)->first();
    //     if ($user) {
    //         return response()->json([
    //             "error" => "User with given email already exist"
    //         ], 400);
    //     }
    //     try {
    //         $user = User::create([
    //             "name" => $req->name,
    //             "email" => $req->email,
    //             "password" => Hash::make($req->password),
    //         ]);
    //         return $user->createToken($user->email)->plainTextToken;
    //     } catch (Exception $ex) {
    //         return response()->json([
    //             "error" => $ex->getMessage()
    //         ], 500);
    //     }
    // }
    public function logout(Request $req)
    {
        auth()->user()->tokens()->delete();
        return[
            'message'=> 'You have logged out!'
        ];
        // $req->user()->currentAccessToken()->delete();
        // return response()->noContent();
    }

}
