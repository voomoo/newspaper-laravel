@extends('layouts.admin.master')
@section('title', 'Create User')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New User</h4>

                    <form class="forms-sample" action="{{route('user.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control" id="name" placeholder="User Name">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input value="{{old('email')}}" type="email" name="email" class="form-control" id="email" placeholder="User Email">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="{{old('password')}}" type="password" name="password" class="form-control" id="password" placeholder="User Password">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2 btn-sm">Save</button>
                        <button class="btn btn-light btn-dark btn-sm">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

