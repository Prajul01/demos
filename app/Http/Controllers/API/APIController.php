<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function login(Request $request){
        $user = User::where('username', $request->username)->first();
        if($user){
            if(Auth::attempt(['username' =>$request->username, 'password' => $request->password])){
                $user = User::where('id',auth()->user()->id)->first();
                $success['token'] =  $user->createToken('TokenName')->plainTextToken;
                $response = [
                    'success' => true,
                    'data'  => $user,
                    'token'=>$success['token']
                ];
                return response()->json($response,200);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Invalid password'
                ];
                return response()->json($response, 401);
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Username not registered'
            ];
            return response()->json($response, 401);
        }
    }


    public function register(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
        ]);
        // Return errors if validation error occur.
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        // Check if validation pass then create user and auth token. Return the auth token
        if ($validator->passes()) {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'school' => $request->school,
                'password' => Hash::make($request->password),
                'group_code' => $request->password,
                'role_id' => $request->role_id

            ]);


            $token = $user->createToken('auth_token')->plainTextToken;
            ;

            return response()->json([
                'message' => "user Created",
                'data'=>$user,
                'token'=>$token

            ]);
        }
    }

    public function userList(){
        $user=User::all();
        return response()->json(["data" => $user]);
    }



}
