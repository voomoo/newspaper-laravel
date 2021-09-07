@extends('layouts.front.master')
@section('title', 'About')
@section('content')
    <section class="site-section pt-5">
        <div class="container">

            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">


                    <div class="row mb-5 mt-5">
                        <div class="col-md-12 mb-5">
                            <h2>Author About List</h2>
                        </div>
                        <div class="col-md-12">
                            @foreach($authors as $author)
                            <div class="post-entry-horzontal">
                                <a href="{{route('author.details', $author->id)}}">
                                    <div class="image" style="background-image: url('{{asset($author->image)}}');"></div>
                                    <span class="text">
                      <div class="post-meta">
                        <h1>Hi There! I'm {{$author->name}}</h1>
                </div>
                <p>{{Str::limit($author->about, 500)}}..........View more</p>

                </span>
                </a>
            </div>
        @endforeach
        <!-- END post -->


        </div>
        </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    {{$authors->render()}}
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
