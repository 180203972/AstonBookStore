@extends('layouts.master')

@section('title')
    Admin Profile
@endsection
@section('content')
<div class="col-lg-12">
    <div>
        <h1>Show Book</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Image Path</strong>
            <div value="{{$book->imagePath}}"></div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Title</strong>
            {{$book->title}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Author</strong>
            {{$book->author}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Published Year</strong>
            {{$book->publishedYear}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Category</strong>
            {{$book->category}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Description</strong>
            {{$book->description}}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <strong>Price(£)</strong>
            {{$book->price}}
        </div>
    </div>
</div>
    <div class="float-right">
        <a class="btn btn-info" href="{{route('admin.profile')}}">Back</a>
    </div>
@endsection