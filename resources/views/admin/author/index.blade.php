@extends('layouts.admin.master')
@section('title', 'List Of Authors')
@section('content')
 <div class="row">
     <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Authors Table</h4>
                 <div class="table-responsive">
                     <table class="table table-striped">
                         <thead>
                         <tr>
                             <th>SL#</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($authors as $author)
                             <tr>
                                 <td>{{$author->id}}</td>
                                 <td>{{$author->name}} </td>
                                 <td>{{$author->email}} </td>
                                 <td>
                                     <a class="btn btn-info btn-sm" href="{{route('author.show', $author->id)}}">Details</a>
                                     <a class="btn btn-facebook btn-sm" href="{{route('author.edit', $author->id)}}">Edit</a>
                                     <form class="d-inline-block" action="{{route('author.destroy', $author->id)}}" method="post">
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
