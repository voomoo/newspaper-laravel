@extends('layouts.admin.master')
@section('title', 'Create  new Author')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Author</h4>

                    <form class="forms-sample" action="{{route('author.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input  value="{{old('name')}}"  type="text" name="name" class="form-control" id="name" placeholder="User Name">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{old('email')}}" type="email" name="email" class="form-control" id="email" placeholder="User Email">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" class="form-control" id="about" rows="6" placeholder="About">{{old('about')}}</textarea>
                            @error('about')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input name="image" type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                            </div>
                            @error('image')
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

