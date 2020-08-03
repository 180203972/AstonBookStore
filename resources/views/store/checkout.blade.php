@extends('layouts.master')

@section('title')
    Checkout
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="checkout-heading">Checkout</h1>
        @if(count($errors)>0)
        <h4 class="checkout-total">Your Total: ${{$total}}</h4>
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        </div>
        <form action="{{route('checkout')}}" method="post" id="checkout-form">
            <div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control" name="address" placeholder="address">
                </div>
                <div class="form-group">
                    <label for="card-name">Card Holder Name</label>
                    <input type="text" id="card-name" class="form-control" name="card_name" placeholder="card holder name">
                </div>
                <div class="form-group">
                    <label for="card-number">Credit Card Number</label>
                    <input type="integer" id="card-number" class="form-control" name="card_number" placeholder="xxxx xxxx xxxx xxxx">
                </div>
                <div>
                <div class="form-group">
                    <label for="card-expiry-month">Expiration Month</label>
                    <input type="integer" id="card-expiry-month" class="form-control" name="expirationMonth" placeholder="xx">
                </div>
                <div class="form-group">
                    <label for="card-expiry-year">Expiration Year</label>
                    <input type="integer" id="card-expiry-year" class="form-control" name="expirationYear" placeholder="xxxx">
                </div>
                <div class="form-group">
                    <label for="card-cvc">CVC</label>
                    <input type="integer" id="card-cvc" class="form-control" name="cvc" placeholder="xxx">
                </div>
            </div>
            {{csrf_field()}}
            <div>
                <button type="submit" class="btn btn-success">Complete</button>
            </div>
        </form>
    </div>
</div>
@endsection