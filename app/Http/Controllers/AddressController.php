<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        // // Validate the request data
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        //     'street' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'zip' => 'required|numeric',
        // ]);
    
        // // Extract the request data
        // $data = $request->only(['name', 'email', 'password']);
        // $addressData = $request->only(['street', 'city', 'state', 'zip']);
    
        // // Hash the password
        // $data['password'] = bcrypt($data['password']);
    
        // // // Insert the user data into the users table
        // // $userId = DB::table('users')->insertGetId($data);
    
        // // // Insert the address data into the addresses table
        // // $addressData['user_id'] = $userId;
        // // DB::table('addresses')->insert($addressData);
        // DB::transaction(function () use ($data, $addressData) {
        //     // Insert the user data into the users table
        //     $userId = DB::table('users')->insertGetId($data);
        
        //     // Insert the address data into the addresses table
        //     $addressData['user_id'] = $userId;
        //     DB::table('addresses')->insert($addressData);
        // });
    
        // // Return a successful response
        // return response()->json(['message' => 'Successfully created user and address'], 201);
        
    }
}


// Retrieve the most recently inserted record
// $latestUser = DB::table('users')->latest()->first();

// Retrieve all inserted records
// $insertedUsers = DB::table('users')->whereIn('id', array_column($users, 'id'))->get();