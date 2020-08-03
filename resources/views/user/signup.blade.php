@extends('layouts.master')

@section('title')
    Sign Up
@endsection
@section('content')
<div class="col-sm-12">
    <h1 class="signup-heading">Sign Up</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>
    <form action="{{ route('user.signup') }}" method="post" id="signup-form">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        {{ csrf_field() }}
    </form>
</div>
@endsection