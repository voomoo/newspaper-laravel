<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['featured_posts']=Post::with(['category', 'author'])->published()->where('is_featured', 1)->get();
        $data['latest_posts']=Post::with(['category', 'author'])->published()->orderBy('id', 'desc')->paginate(6);
        $data['popular_posts']=Post::published()->orderBy('total_hit', 'desc')->limit(3)->get();
        $data['categories']=Category::all();
        return view('front.index', $data);
    }

    public function details($id){
      $data['popular_posts']=Post::published()->orderBy('total_hit', 'desc')->limit(3)->get();
      $data['categories']=Category::all();
      $post=Post::with(['category', 'author'])->findOrFail($id);
      $post->increment('total_hit');
      $data['post']=$post;
      $data['related_posts']=Post::published()->where('category_id', $post->category_id)->orderBy('id', 'desc')->limit(3)->get();
      return view('front.details', $data);
    }

    public function authordetails($id){
        $data['popular_posts']=Post::published()->orderBy('total_hit', 'desc')->limit(3)->get();
        $data['categories']=Category::all();
        $author=Author::findOrFail($id);
        $data['author']=$author;
        return view('front.authordetails', $data);
    }

    public function about(){
        $data['featured_posts']=Post::with(['category', 'author'])->published()->where('is_featured', 1)->get();
        $data['latest_posts']=Post::with(['category', 'author'])->published()->orderBy('id', 'desc')->paginate(3);
        $data['authors']=Author::paginate(3);
        $data['categories']=Category::all();
        return view('front.about', $data);
    }

    public function contact(){
        $data['featured_posts']=Post::with(['category', 'author'])->published()->where('is_featured', 1)->get();
        $data['categories']=Category::all();
        return view('front.contact', $data);
    }
    public function category($id){
        $data['popular_posts']=Post::published()->orderBy('total_hit', 'desc')->limit(3)->get();
        $data['categories']=Category::all();
        $data['posts']=Post::with(['category', 'author'])->where('category_id', $id)->published()->orderBy('id', 'desc')->paginate(4);
        return view('front.category', $data);
    }
}
