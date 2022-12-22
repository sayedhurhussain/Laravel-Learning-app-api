<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
    | --------------------------------------------------------------------------
    | Display all users Controller
    | --------------------------------------------------------------------------
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return User::all();
    }


    /**
    | --------------------------------------------------------------------------
    | Display user by ID Controller
    | --------------------------------------------------------------------------
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return User::findOrFail($id);

        // get using relationship
        return User::find($id)->userDetail;

        // Get all user detail using id
        // return User::find($id)->detail->all();
    }

    /**
    | --------------------------------------------------------------------------
    | Register Controller
    | --------------------------------------------------------------------------
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @desc    Register new user as well as their validation
     * @route   POST /signup
     * @access  public
     */
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

    /**
    | --------------------------------------------------------------------------
    | Login Controller
    | --------------------------------------------------------------------------
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @desc    Login User
     * @route   POST /user/login
     * @access  public
     */
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
                'message' => 'The provided credentials are incorrect'
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

    /**
    | --------------------------------------------------------------------------
    | Logout Controller
    | --------------------------------------------------------------------------
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @route   POST /user/logout
     * @access  private
     */
    public function logout(Request $request)
    {
		// Revoke the token that was used to authenticate the current request
		// auth()->user()->currentAccessToken()->delete();
        // use this to revoke all tokens (logout from all devices)
		auth()->user()->tokens()->delete();

        $response =[
            'error' => false,
            'message' => 'Logged out'
        ];
        return response ($response, 200);
    }
}
