@extends('layouts.admin.master')
@section('title', 'List Of Users')
@section('content')
 <div class="row">
     <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Users Table</h4>
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
                         @foreach($users as $user)
                             <tr>
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}} </td>
                                 <td>{{$user->email}}</td>
                                 <td>
                                     <a class="btn btn-facebook btn-sm" href="{{route('user.edit', $user->id)}}">Edit</a>
                                     <form class="d-inline-block" action="{{route('user.destroy', $user->id)}}" method="post">
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
