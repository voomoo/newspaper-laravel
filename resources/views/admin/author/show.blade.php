@extends('layouts.admin.master')
@section('title', 'List Of Authors')
@section('content')
<div class="row">


        <div class="col-12 col-md-10 ">
            <div class="col-12 grid-margin" id="doc-intro">
                <div class="card">
                    <div class="card-body">
                        <p>
                            @if($author->image != null)
                                <img src="{{asset($author->image)}}" alt="Image" width="100%">
                            @endif
                        </p>

                        <p>
                           {{$author->about}}
                        </p>
                        <div class="text-right">
                            <a href="{{route('author.index')}}" class="btn-sm btn btn-dribbble">Back</a>
                        </div>


                    </div>
                </div>
            </div>

        </div>

</div>
@endsection
