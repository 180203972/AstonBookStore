@extends('layouts.master')

@section('title')
    Profile
@endsection
@section('content')
<div class="col-sm-12">
    <h1 class="profile-heading">User Profile</h1>
    <hr>
    <h2 class="order-history">Order History</h2>
    @foreach($orders as $order)
    <div class="card profile-card">
        <div class="card-body">
            <ul class="list-group">
                @foreach($order->basket->books as $book)
                <li class="list-group-item">
                    <span class="badge badge-secondary float-right">£{{$book['price']}}</span>
                    {{$book['book']['title']}} | {{$book['qty']}} Units
                </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <strong>Total Price: £{{$order->basket->totalPrice}}</strong>
        </div>
    </div>
    @endforeach
</div>
@endsection