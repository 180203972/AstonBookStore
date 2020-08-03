@extends('layouts.master')

@section('title')
    Aston Book Store
@endsection
@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-12">
                <div id="purchase-success-message" class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
    @endif
    @foreach($books->chunk(3) as $bookChunk)
    <div class="row display-flex">
        @foreach($bookChunk as $book)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-100" style="width: 18rem;">
                <img src="{{$book->imagePath}}" class="card-img-top rounded mx-auto d-block" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <div>
                            <h6 class="card-author">Author: {{$book->author}}</h6>
                            <h6 class="card-published">Published: {{$book->publishedYear}}</h6>
                            <h6 class="card-Category">Category: {{$book->category}}</h6>
                        </div>
                        <div>
                            <p class="card-text">{{$book->description}}</p>
                        </div>
                        <div>
                            <div class="price float-left">£{{$book->price}}</div>
                            <a href="{{ route('book.addToBasket', ['id' => $book->id]) }}" class="btn btn-success float-right">Add to Basket</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
@endsection
