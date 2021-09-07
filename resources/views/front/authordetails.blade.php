@extends('layouts.front.master')
@section('title', 'Author Details')
@section('content')
    <section class="site-section py-lg">
        <div class="container">
            <div class="row blog-entries element-animate">
             <div class="col-md-12 col-lg-8 main-content">
                 <img src="{{asset($author->image)}}" alt="Image" class="img-fluid mb-5">
                 <div class="post-meta">

                 </div>
                 <h1 class="mb-5">Hi There! I'm {{$author->name}}</h1>
                  <div class="post-content-body ">
                   <h4 class="text-justify" style="line-height: 30px;">{{$author->about}}</h4>
                    </div>
                    <br><br><br>
                    <div class="row mb-5 mt-5">
                        <div class="col-md-12 mb-5">
                            <h2>My Latest Posts</h2>
                        </div>
                        <div class="col-md-12">
                    @foreach($author->relPost as $post)
                      <div class="post-entry-horzontal">
                         <a href="{{route('post.details', $post->id)}}">
                             <div class="image" style="background-image: url('{{asset($post->image)}}');"></div>
                              <span class="text">
                              <div class="post-meta">
                              <span class="author mr-2"><img src="{{asset($author->image)}} " alt="Colorlib"> {{$author->name}}</span>&bullet;
                              <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}} </span> &bullet;
                              </div>
                              <h2>{{$post->title}}</h2>
                             </span>
                         </a>
                      </div>
                            <!-- END post -->
                   @endforeach
                        </div>
                    </div>

                    <br><br><br>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h1>Leave a comment</h1>
                        </div>
                    </div>


                    <form >
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" id="name" class="form-control ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone">Phone</label>
                                <input name="phone" type="text" id="phone" class="form-control ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" id="email" class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Comment</label>
                                <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="submit" value="Send Comment" class="btn btn-primary pull-left">
                            </div>
                        </div>
                    </form>

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
