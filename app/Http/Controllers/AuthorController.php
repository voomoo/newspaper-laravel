<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['authors']=Author::all();
        return view('admin.author.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required',
            'email' => 'required',
            'about' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $path='images/upload/author';
            $file_name=$file->getClientOriginalExtension();
            $file->move($path, $file_name);
            $data['image']=$path.'/'.$file_name;

        }
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['about']=$request->about;

        Author::create($data);
        session()->flash('success', 'Author Create Seccessfully!!');
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $data['author']=$author;
        return view('admin.author.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data['author']=$author;
        return view('admin.author.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'about' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('image')){
            $file=$request->file('image');
            $path='images/upload/author';
            $file_name=encrypt(time().rand(00000,99999)).'.'.$file->getClientOriginalExtension();
            $file->move($path, $file_name);
            $data['image']=$path.'/'.$file_name;
            if (file_exists($author->image)){
                unlink($author->image);
            }
        }
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['about']=$request->about;
        $author->update($data);
        session()->flash('success', 'Author Update Seccessfully!!');
        return redirect()->route('author.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (file_exists($author->image)){
            unlink($author->image);
        }
        $author->delete();
        session()->flash('success', 'Author Delete Seccessfully!!');
        return redirect()->route('author.index');

    }
}
