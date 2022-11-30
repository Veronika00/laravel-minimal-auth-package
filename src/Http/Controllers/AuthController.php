<?php

namespace Pulovessy\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request) {
        try {
            $validate = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validate->fails()){
                return response()->json([
                    'message' => 'validate error',
                    'errors' => $validate->error(),
                ], 401);
            };

            if(!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'message' => 'Email & Password does not match with our record.',
                ]);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken('API TOKEN')->plainTextToken,
            ], 200);

        } catch(\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'User LogOut in Succeessfully'
        ]);
    }
}
