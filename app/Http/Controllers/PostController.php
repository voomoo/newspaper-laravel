<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']=Category::orderBy('name')->get();
        $data['posts']=Post::all();
        $data['serial']=1;
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::orderBy('name')->get();
        $data['authors']=Author::orderBy('name')->get();
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
           'category_id' => 'required',
           'author_id' => 'required',
           'title' => 'required',
           'content' => 'required',
           'status' => 'required',
           'image' => 'mimes:jpeg,jpg,png',
       ]);

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $path='images/upload/post';
            $file_name=encrypt(time().rand(00000,99999)).'.'.$file->getClientOriginalExtension();
            $file->move($path, $file_name);
            $data['image']=$path.'/'.$file_name;

        }

        $data['category_id']=$request->category_id;
        $data['author_id']=$request->author_id;
        $data['title']=$request->title;
        $data['content']=$request->content;
        $data['status'] = $request->status;
        if ($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }

        if($request->status == 'published'){
            $data['published_at'] = date('Y-m-d');
        }
        Post::create($data);
        session()->flash('success', 'Post Create Done!!');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['categories']=Category::orderBy('name')->get();
        $data['authors']=Author::orderBy('name')->get();
        $data['post']=$post;
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['categories']=Category::orderBy('name')->get();
        $data['authors']=Author::orderBy('name')->get();
        $data['post']=$post;
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'category_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $path='images/upload/post';
            $file_name=encrypt(time().rand(00000,99999)).'.'.$file->getClientOriginalExtension();
            $file->move($path, $file_name);
            $data['image']=$path.'/'.$file_name;
            if (file_exists($post->image)){
                unlink($post->image);
            }
        }
        $data['category_id']=$request->category_id;
        $data['author_id']=$request->author_id;
        $data['title']=$request->title;
        $data['content']=$request->content;
        $data['status']=$request->status;
        if ($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }

        if ($request->status == 'published'){
            $data['published_at']=date('Y-m-d');
        }

        $post->update($data);
        session()->flash('success', 'Post Update Done!!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (file_exists($post->image)){
            unlink($post->image);
        }
        $post->delete();
        session()->flash('warning', 'Post Delete Done!!');
        return redirect()->route('post.index');
    }
}
