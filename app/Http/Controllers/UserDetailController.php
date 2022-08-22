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
        // 1st Method to index / get all data
        return UserDetail::all();

        // // 2nd Method to index / get all data
        // $userDetails = UserDetail::all();
        // return $userDetails;

        // // 3rd Method to index  / get all data with pagination
        // $userDetails = UserDetail::paginate(10);
        // return $userDetails;
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
        //     'picture' =>  $path,
        // ];
        // $user = UserDetail::create($data);
        // return $user;
    

        // 2nd method to save the picture in array
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
        // ];

        // if (request()->picture) {
        //     $path = request()->file('picture')->store("avatars", "public");
        //     $data["picture"] = $path;
        // }
        // $user = UserDetail::create($data);
        // return $user;


        // 3rd Method Create Data
        $images= new UserDetail();
        $filename="";
        // profile picture means in input i.e insomnia
        if ($request->hasFile('profile_picture')) {
            $filename = $request->file('profile_picture')->store('profile', 'public');
            //change the name in database
            $request->merge(["picture"=>$filename]);
            }
        $images->phone_no = $request->phone_number;
        $images->about = $request->about;
        $images->address = $request->address;
        $images->postal_code = $request->postal_code;
        $images->whatsapp = $request->whatsapp;
        $images->facebook = $request->facebook;
        $images->twitter = $request->twitter;
        $images->instagram = $request->instagram;
        $images->linkedin = $request->linkedin;
        $images->github = $request->github;
        $images->picture = $filename;
        $images->save();
        return $images;


        // // 4th Method Create Data
        // $images= new UserDetail();
        // $filename="";
        // // // profile picture means in input i.e insomnia
        // if ($request->hasFile('profile_picture')) {
        //     $filename = $request->file('profile_picture')->store('profile', 'public');
        //     //change the name in database
        //     $request->merge(["picture"=>$filename]);
        //     }
        // $images->phone_no = $request->input('phone_number');
        // $images->about = $request->input('about');
        // $images->address = $request->input('address');
        // $images->postal_code = $request->input('postal_code');
        // $images->whatsapp = $request->input('whatsapp');
        // $images->facebook = $request->input('facebook');
        // $images->twitter = $request->input('twitter');
        // $images->instagram = $request->input('instagram');
        // $images->linkedin = $request->input('linkedin');
        // $images->github = $request->input('github');
        // $images->picture = $filename;
        // $images->save();
        // return response()->json($images, 202);


        // 5th Method Create All Data
        // $images= new UserDetail();
        // $filename="";
        // if ($request->hasFile('profile_picture')) {
        //     $path = $request->file('profile_picture')->store('profile', 'public');
        //     $request->merge(["picture"=>$path]);
        //   }
        // $images->picture = $filename;
        // $user= UserDetail::create($request->all());
        // return $user;


        // // 6th method to create data
        // $path = $request->file('picture')->store('image', 'public');
        // $user= UserDetail::create($request->all());
        // $response = [
        //     'user' => $user,
        //     'picture' =>  $path,
        // ];
        // return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UserDetail::findOrFail($id);
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
        // // 1st method to update data
        // picure means file name and 
        // image means folder name where save all the picture
        // public means the storage is public and save the image in public folder

        // $updatedetails = UserDetail::findOrFail($id);
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
        //     'picture' =>  $path,
        // ];
        // $updatedetails->update($data);
        // return $data;


        // // 2nd method to update data
        // $updatedetails = UserDetail::findOrFail($id);
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
        // ];

        // if (request()->picture) {
        //     $path = request()->file('picture')->store("avatars", "public");
        //     $data["picture"] = $path;
        // }
        // $updatedetails->update($data);
        // return $data;


        // // 3rd Method Create Data
        // $images = UserDetail::findOrFail($id);
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
        // // $images->save();
        // $images->update();
        // return $images;



        // 4th Method Update Data
        $images = UserDetail::findOrFail($id);
        // // profile picture means in input i.e insomnia
        if ($request->hasFile('profile_picture')) {
            $filename = $request->file('profile_picture')->store('profile', 'public');
            //change the name in database
            $request->merge(["picture"=>$filename]);
            }
        $images->phone_no = $request->input('phone_number');
        $images->about = $request->input('about');
        $images->address = $request->input('address');
        $images->postal_code = $request->input('postal_code');
        $images->whatsapp = $request->input('whatsapp');
        $images->facebook = $request->input('facebook');
        $images->twitter = $request->input('twitter');
        $images->instagram = $request->input('instagram');
        $images->linkedin = $request->input('linkedin');
        $images->github = $request->input('github');
        $images->picture = $filename;
        // $images->update();
        $images->save();
        return response()->json($images, 202);


        // // 5th Method Update All Data
        // $images = UserDetail::findOrFail($id);
        // if ($request->hasFile('profile_picture')) {
        //     $path = $request->file('profile_picture')->store('profile', 'public');
        //     $request->merge(["picture"=>$path]);
        //   }
        // $images->update($request->all());
        // return $images;


        // // 6th Method to update data
        // $images = UserDetail::findOrFail($id);
        // $path = $request->file('picture')->store('image', 'public');
        // // $user= UserDetail::create($request->all());
        // $images->update($request->all());
        // $response = [
        //     'user' => $images,
        //     'picture' =>  $path,
        // ];
        // return $response;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return UserDetail::destroy($id);
    }
}
