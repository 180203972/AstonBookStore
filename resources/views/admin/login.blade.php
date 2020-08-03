@extends('layouts.master')

@section('title')
    Admin Login
@endsection
@section('content')
<div class="col-sm-12">
    <h1 class="login-heading">Login</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>
    <form action="{{ route('admin.login') }}" method="post" id="login-form">
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        {{ csrf_field() }}
    </form>
<p class="login-p">Not an Admin? <a href="{{route('user.login')}}">Login Here</a></p>
@endsection