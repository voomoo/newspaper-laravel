@extends('layouts.admin.master')
@section('title', 'List Of Posts')
@section('content')
<div class="row">


        <div class="col-12 col-md-10 ">
            <div class="col-12 grid-margin" id="doc-intro">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 mt-4">{{$post->title}}</h3>

                        <p class="card-subtitle">
                            @foreach($authors as $author)
                                @if($author->id == $post->author_id) {{$author->name}} @endif
                            @endforeach
                        </p>

                        <p class="card-subtitle">
                           @foreach($categories as $category)
                              @if($category->id == $post->category_id) {{$category->name}} @endif
                            @endforeach,  <i>{{ucfirst($post->status)}}</i><br>
                            {{$post->published_at}}
                        </p>
                        <p>
                            @if($post->image != null)
                                <img src="{{asset($post->image)}}" alt="Image" width="100%">
                            @endif
                        </p>

                        <p>
                           {{$post->content}}
                        </p>
                        <div class="text-right">
                            <a href="{{route('post.index')}}" class="btn-sm btn btn-dribbble">Back</a>
                        </div>


                    </div>
                </div>
            </div>

        </div>

</div>
@endsection
