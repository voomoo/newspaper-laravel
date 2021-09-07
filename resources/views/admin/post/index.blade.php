@extends('layouts.admin.master')
@section('title', 'List Of Posts')
@section('content')
 <div class="row">
     <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Posts Table</h4>
                 <div class="table-responsive">
                     <table class="table table-striped">
                         <thead>
                         <tr>
                             <th>SL#</th>
                             <th>Title</th>
                             <th>Category</th>
                             <th>Status</th>
                             <th>Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($posts as $post)
                             <tr>
                                 <td>{{$serial++}}</td>
                                 <td>{{$post->title}}</td>
                                 <td>
                                     @foreach($categories as $category)
                                         @if($category->id == $post->category_id) {{ $category->name }} @endif
                                     @endforeach

                                 </td>
                                 <td>{{ucfirst($post->status)}}</td>
                                 <td>
                                     <a class="btn btn-info btn-sm" href="{{route('post.show', $post->id)}}">Details</a>
                                     <a class="btn btn-facebook btn-sm" href="{{route('post.edit', $post->id)}}">Edit</a>
                                     <form class="d-inline-block" action="{{route('post.destroy', $post->id)}}" method="post">
                                         @csrf
                                         @method('delete')
                                         <button class="btn-danger btn btn-sm" onclick="return confirm('Are You Delete Confirm!!')">Delete</button>
                                     </form>

                                 </td>
                             </tr>
                         @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>

 </div>
@endsection
