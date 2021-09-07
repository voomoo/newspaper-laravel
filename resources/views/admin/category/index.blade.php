@extends('layouts.admin.master')
@section('title', 'List Of Categories')
@section('content')
 <div class="row">
     <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Categories Table</h4>
                 <div class="table-responsive">
                     <table class="table table-striped">
                         <thead>
                         <tr>
                             <th>SL#</th>
                             <th>Name</th>
                             <th>Description</th>
                             <th>Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($categories as $category)
                             <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->name}} </td>
                                 <td>{{$category->description}}</td>
                                 <td>
                                     <a class="btn btn-facebook btn-sm" href="{{route('category.edit', $category->id)}}">Edit</a>
                                     <form class="d-inline-block" action="{{route('category.destroy', $category->id)}}" method="post">
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
