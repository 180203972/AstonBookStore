@extends('layouts.master')

@section('title')
    Admin Profile
@endsection
@section('content')
    <div class="col-lg-12">
        <div>
            <h1>Admin Profile</h1>
        </div>
        @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-12">
                <div id="purchase-success-message" class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
        @endif
        <div class="float-right">
            <a class="btn btn-success" href="{{route('admin.create')}}">Create New Book</a>
        </div>
    </div> 
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image Path</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Published Year</th>
              <th scope="col">Category</th>
              <th scope="col">Description</th>
              <th scope="col">Price(£)</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          @foreach($books as $key => $book)    
          <tbody>
            <tr class="admin-table">
                <td>{{++$i}}</td>
                <td class="table-img-path">{{$book->imagePath}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->publishedYear}}</td>
                <td>{{$book->category}}</td>
                <td class="table-description">{{$book->description}}</td>
                <td>{{$book->price}}</td>
                <td>
                    <form action="{{route('admin.delete', $book->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('admin.show', $book->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('admin.edit', $book->id)}}">Edit</a>
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection