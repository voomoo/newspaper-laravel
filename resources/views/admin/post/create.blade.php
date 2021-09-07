@extends('layouts.admin.master')
@section('title', 'Create Post')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Post</h4>

                <form class="forms-sample" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control" id="category">
                            <option value="">Select Category--</option>
                            @foreach($categories as $category)
                                <option @if(old('category_id') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="category">Author</label>
                        <select name="author_id" class="form-control" id="author">
                            <option value="">Select Author--</option>
                            @foreach($authors as $author)
                                <option @if(old('author_id') == $author->id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Name">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea  name="content" class="form-control" id="exampleTextarea1" rows="6" placeholder="Content">{{old('content')}}</textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <label>Featured</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input @if(old('is_featured') == 1) checked @endif value="1" type="checkbox" class="form-check-input" name="is_featured" id="is_featured">
                                    Yes
                                </label>
                            </div>

                            @error('is_featured')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <label>Status</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input @if(old('status') == 'published') checked @endif value="published" type="radio" class="form-check-input" name="status" id="published">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input  @if(old('status') == 'unpublished') checked @endif value="unpublished" type="radio" class="form-check-input" name="status" id="unpublished">
                                    Unpublished
                                </label>
                            </div>
                            @error('status')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
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
