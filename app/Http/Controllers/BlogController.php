<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\QueryException;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Laravel Eloquent Vs DB Query Builder
        // Query Builder
        // $blogs = DB::table('blogs')->get();
        // return $blogs;
        

        // Get only one Table/Column Query Builder
        // $blogs = DB::table('blogs')->get('blog_name');
        // return $blogs;

        // Get only first row in the table
        // $blogs = DB::table('blogs')->first();
        // return $blogs;

        // Eloquent ORM
        // $blogs = Blog::all();
        // return $blogs;

        // Eloquent ORM 2nd Method
        // $blogs = Blog::get();
        // return $blogs;

        // Get only one Column/Table Eloquent ORM
        // $blogs = Blog::get('blog_name');
        // return $blogs;


        $comment = UserDetail::find(1);
        $getNew = $comment->blog;

        // $phone = UserDetail::find(1)->blog;
        dd($getNew);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // return Blog::create($request->all());

        // $blogs = DB::table('blogs')->create();
        // return $blogs;

        $data = [
            // 'user_detail_id' => $request->user()->user_id,
            'blog_name' => $request->blog_name,
            'blog_description' => $request->blog_description,
            'author' => $request->author,
            // 'user_detail_id' => $request->userDetail->user_detail_id ?? auth()->user()->id,
            'user_detail_id' => auth()->user()->userDetail->id,

            // 'user_detail_id' => auth()->userDetail->id,
            // auth()->user()->id
        // return User::find($id)->userDetail->about;

        // "user_id" => auth()->user()->id

           

            // "user_id" => auth()->user()->id

        ];
        dd($data);
        $user = Blog::create($data);
        return $user;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return Blog::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestQuery Builder
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());
        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id, $request)
    {
        // Eloquent ORM 1st Method using destroy
        // return Blog::destroy($id);

        // Eloquent ORM 2nd Method using delete
        // $blog = Blog::findOrFail($id);
        // $blog->delete();

        // Query Builder using 1st Method delete
        // $blogs = DB::table('blogs')->delete($id);
        // return $blogs;


        // Delete multiple items using comma
        // try {
        //     $ids = explode(",", $id);
        //     //$ids is a Array with the primary keys
        //     Blog::destroy($ids);
        // }
        // catch(Exception $e) {
        //     return $e->getMessage();
        // }


        // $ids = $request->ids;
        // DB::table("blogs")->whereIn('id',explode(",",$ids))->delete();
        // return response()->json(['success'=>"Blogs Deleted successfully."]);
    }
}
