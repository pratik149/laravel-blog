<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('comments')->get();
        // return $blogs;
        return view('blog.blogs', ['blogs' => $blogs]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create_blog');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        // $validatedData = $request->validate([
        //     'title' => ['required','unique:blogs,title','max:255', new Uppercase],
        //     'body' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'max:255',
                'unique:blogs,title',
                // new Uppercase,
                function ($attribute, $value, $fail) {
                    if (stripos($value, 'fuck') !== false) {
                        $fail('Your post '.$attribute.' contains F word. Avoid it or else we will block your account.');
                    }
                },
            ],
            'body' => ['required','min:255']
        ]);

        if ($validator->fails()) {
            return redirect('blogs/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $blog = new Blog;

        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();
        
        return redirect()->route('blogs.edit', [
            'id' => $blog->id
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return $blog;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit_blog', ['blog' => $blog]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'max:255',
                // new Uppercase,
                function ($attribute, $value, $fail) {
                    if (stripos($value, 'fuck') !== false) {
                        $fail('Your post '.$attribute.' contains F word. Avoid it or else we will block your account.');
                    }
                },
            ],
            'body' => ['required','min:255']
        ]);

        if ($validator->fails()) {
            return Redirect::route('blogs.edit',['id'=>$blog->id])
                        ->withErrors($validator)
                        ->withInput();
        }

        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();

        return redirect()->route('blogs.edit', ['id' => $blog->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // $blog = Blog::find(1);
        $blog->delete();
    }
}
