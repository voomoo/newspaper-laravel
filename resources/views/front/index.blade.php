@extends('layouts.front.master')
@section('title', 'Home')
@section('content')
    <!-- Start Sidenav -->
    <div class="sidebar-menu col-md-3 col-sm-12 hidden-xs ">
        <div class="responsive so-megamenu ">
            <div class="so-vertical-menu no-gutter compact-hidden">
                <nav class="navbar-default">
                    <div class="container-megamenu vertical open">
                        <div id="menuHeading-1">
                            <div class="megamenuToogle-wrapper">
                                <div class="megamenuToogle-pattern">
                                    <div class="container">
                                        <div>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        All Categories

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-header">
                            <button   id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">

                            </button>

                        </div>
                        <div class="vertical-wrapper " style="display: block; z-index: 1;">
                            <span id="remove-verticalmenu" class="fa fa-times"></span>
                            <div class="megamenu-pattern">
                                <div class="container">
                                    @foreach($categories as $category)
                                        <ul class="megamenu">

                                            <li class="item-vertical">
                                                <p class="close-menu"></p>

                                                <a href="{{route('category', $category->id)}}" class="clearfix">
                                                    <span>{{$category->name}}</span>
                                                </a>

                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>

    <!-- END Sidenav -->

    <!-- Start Slider -->
    <div id="yt_header_right" class="col-sm-12 col-md-9 col-lg-9 ">
        <div class="slider-container ">
            <div class="owl-carousel owl-slider-1 owl" data-dots="yes" data-nav="yes" data-loop="yes" data-items_xs="1" data-items_sm="1" data-items_md="1" data-margin="0" >
                @foreach($featured_posts as $post)
                    <div>
                        <a href="{{route('post.details', $post->id)}}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{asset($post->image)}}'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">{{$post->category->name}}</span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="{{asset($post->author->image)}}" alt="Colorlib"> {{$post->author->name}}</span>&bullet;
                                    <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}}</span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                </div>
                                <h3>{{$post->title}}</h3>
                                <p>{{Str::limit($post->content, 100)}}....</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>


        </div>
    </div>

    <!-- END Slider -->


    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mb-4">Latest Posts</h1>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        @foreach($latest_posts as $post)
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
                                    {{$latest_posts->render()}}
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
