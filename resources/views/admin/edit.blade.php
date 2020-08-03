@extends('layouts.master')

@section('title')
    Edit Book
@endsection
@section('content')
    <div class="col-lg-12">
        <div>
            <h1>Edit Book</h1>
        </div>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>     
    <form action="{{route('admin.edit', $book->id)}}" method="POST">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Image Path</strong>
                <input type="string" name="imagePath" class="form-control" placeholder="Image Path" value="{{$book->imagePath}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="string" name="title" class="form-control" placeholder="Title" value="{{$book->title}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Author</strong>
                <input type="string" name="author" class="form-control" placeholder="Author" value="{{$book->author}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Published Year</strong>
                <input type="integer" name="publishedYear" class="form-control" placeholder="Published Year" value="{{$book->publishedYear}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Category</strong>
                <input type="string" name="category" class="form-control" placeholder="Category" value="{{$book->category}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Description</strong>
                <input type="text" name="description" class="form-control" placeholder="Description" value="{{$book->description}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Price(£)</strong>
                <input type="float" name="price" class="form-control" placeholder="Price" value="{{$book->price}}">
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-info">Update</button>
            <a class="float-right btn btn-info" href="{{route('admin.profile')}}">Back</a>
        </div>
    </form>
@endsection