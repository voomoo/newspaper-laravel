@extends('layouts.front.master')
@section('title', $post->title)
@section('content')
    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8  main-content">
                    <img src="{{asset($post->image)}}" alt="Image" class="img-fluid mb-5">
                    <div class="post-meta">
                        <span class="author mr-2">{{$post->author->name}}</span><br>
                        <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}}</span> &bullet;

                    </div>
                    <h1 class="mb-5">{{$post->title}}</h1>
                    <a class="category mb-5" href="#">{{$post->category->name}}</a>

                    <div class="post-content-body ">
                        <h4 class="text-justify" style="line-height: 30px;">{{$post->content}}</h4>
                    </div>

                </div>

                <!-- END main-content -->
                <div class="col-md-12 col-lg-4 sidebar">
                    @include('front._right_side')
                </div>

                <!-- END sidebar -->

            </div>
        </div>


    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3 ">Related Post</h2>
                </div>
            </div>
            <div class="row">
                @foreach($related_posts as $post)
                <div class="col-md-6 col-lg-4">
                    <a href="{{route('post.details', $post->id)}}" class="a-block sm d-flex align-items-center height-md" style="background-image: url('{{asset($post->image)}}'); ">
                        <div class="text">
                            <div class="post-meta">
                                <span class="category">{{$post->category->name}}</span>
                                <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}}</span> &bullet;
                                <span class="ml-2"><span class="fa "></span>{{$post->author->name}}</span>
                            </div>
                            <h3>{{$post->title}}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>


    </section>
@endsection
