@extends('layouts.front.master')
@section('title', 'Category Wise Post')
@section('content')
    <section class="site-section py-sm pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Category Wise Post</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <a href="{{route('post.details', $post->id)}}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                    <img src="{{asset($post->image)}}" alt="Image placeholder">
                                    <div class="blog-content-body">
                                        <div class="post-meta">
                                            <span class="author mr-2"> {{$post->author->name}}</span><br>
                                            <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}}</span> &bullet;
                                            <span class="ml-2"><span class="fa"></span>{{$post->category->name}}</span>
                                        </div>
                                        <h2>{{$post->title}}</h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    {{$posts->render()}}
                                </ul>
                            </nav>
                        </div>
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

@endsection
