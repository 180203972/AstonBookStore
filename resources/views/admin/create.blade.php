@extends('layouts.master')

@section('title')
    Create Book
@endsection
@section('content')
    <div class="col-lg-12">
        <div>
            <h1 class="create-book-h1">Create Book</h1>
        </div>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>     
    <form action="{{route('admin.create')}}" method="POST" class="create-form">
        {{ csrf_field() }}
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Image Path</strong>
                <input type="string" name="imagePath" class="form-control" placeholder="Image Path">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="string" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Author</strong>
                <input type="string" name="author" class="form-control" placeholder="Author">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Published Year</strong>
                <input type="integer" name="publishedYear" class="form-control" placeholder="Published Year">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Category</strong>
                <input type="string" name="category" class="form-control" placeholder="Category">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Description</strong>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Price(£)</strong>
                <input type="float" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="float-right btn btn-success" href="{{route('admin.profile')}}">Back</a>
        </div>
    </form>
@endsection