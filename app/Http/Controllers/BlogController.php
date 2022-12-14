<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use DB;
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
        $blogs = DB::table('blogs')->get();
        return $blogs;

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
        return Blog::create($request->all());
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
