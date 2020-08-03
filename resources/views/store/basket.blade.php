@extends('layouts.master')

@section('title')
    Basket
@endsection
@section('content')
    @if(Session::has('basket'))
        <div class="row">
            <div class="col-sm-12">
                <div class="list-group">
                    @foreach($books as $book)
                        <div class="list-group-item">
                            <span class="badge badge-secondary float-right">{{ $book['qty']}}</span>
                            <strong>{{ $book['book']['title']}}:</strong>
                            <span class="label label-success">£{{ $book['price'] }}</span>
                            <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('book.reduceByOne', ['id' => $book['book']['id']]) }}">Remove 1</a>
                                  <a class="dropdown-item" href="{{ route('book.removeAll', ['id' => $book['book']['id']]) }}">Remove All</a>
                                </div>
                              </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
            <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-12">
                <h2>No Items in Basket!</h2>
            </div>
        </div>
    @endif
@endsection