<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // & Sing up
    public function index(Request $request) {
        return User::all();
    }
    public function register(Request $request) {
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email', 
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);
        // $token = $user-> createToken('myapptocken')->plainTextToken;

        $response = [
            'error' => false,
            'user' => $user,
            // 'token' => $token
        ];
        return response ($response, 201);
    }

    // & Login API
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        //check Login email
        $user = User:: where('email', $fields['email'])->first();
        //check Login password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'error' => true,
                'message' => 'Incorrect Password'
            ], 401);
        }
        $token = $user-> createToken('myapptocken')->plainTextToken;
        $response = [
            'error' => false,
            'user' => $user,
            'token' => $token
        ];
        return response ($response, 201);
        
    }

    // & logout API
    public function logout(Request $request)
    {
        $user =User::findOrFail($id);
        (auth()->user()->email == $user->email);
        auth()->user()->tokens()->delete();

        $response =[
            'error' => false,
            'message' => 'Logged out'
        ];
        return response ($response, 200);
    }
}
