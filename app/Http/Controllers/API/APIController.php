<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' =>$request->email, 'password' => $request->password])){
            $user = User::where('id',auth()->user()->id)->first();
//            $success['token'] =  $user->createToken('TokenName')-> accessToken;
            $success['token'] =  $user->createToken('TokenName')->plainTextToken;
            $success['data']=$user;
//            return $success;
//            $success['user'] = $user;
           $response = [
                'success' => "true",
//                'status' => $this->successStatus,
                'data'  => $success
            ];
            return response()->json($response,200);
        } else {
            return "Failed";
            $response = [
                'success' => "false",
                'status' => $this->errorStatus
            ];
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }



}
