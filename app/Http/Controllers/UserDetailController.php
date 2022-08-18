<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1st method to save the picture in array
        // picure means file name and 
        // image means folder name where save all the picture
        // public means the storage is public and save the image in public folder
        // $path = $request->file('picture')->store('image', 'public');

        // $data = [
        //     'phone_no' => $request->phone_number,
        //     'about' => $request->about,
        //     'address' => $request->address,
        //     'postal_code' => $request->postal_code,
        //     'whatsapp' => $request->whatsapp,
        //     'facebook' => $request->facebook,
        //     'twitter' => $request->twitter,
        //     'instagram' => $request->instagram,
        //     'linkedin' => $request->linkedin,
        //     'github' => $request->github,
        //     // 'picture' =>  $path,
        // ];

        // 1st method to create the picture in array
        // if (request()->picture) {
        //     $path = request()->file('picture')->store("avatars", "public");
        //     $data["picture"] = $path;
        // }
        // $user = UserDetail::create($data);
        // return $user;
    

        // 2nd Method Create Data
        // $images= new UserDetail();
        // $filename="";
        // // profile picture means in input i.e insomnia
        // if ($request->hasFile('profile_picture')) {
        //     $filename = $request->file('profile_picture')->store('profile', 'public');
        //     //change the name in database
        //     $request->merge(["picture"=>$filename]);
        //     }
        // $images->phone_no = $request->phone_number;
        // $images->about = $request->about;
        // $images->address = $request->address;
        // $images->postal_code = $request->postal_code;
        // $images->whatsapp = $request->whatsapp;
        // $images->facebook = $request->facebook;
        // $images->twitter = $request->twitter;
        // $images->instagram = $request->instagram;
        // $images->linkedin = $request->linkedin;
        // $images->github = $request->github;
        // $images->picture = $filename;
        // $images->save();
        // return $images;


        // 3rd Method Create All Data
        $images= new UserDetail();
        $filename="";
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile', 'public');
            $request->merge(["picture"=>$path]);
          }
        $images->picture = $filename;
        $user= UserDetail::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
