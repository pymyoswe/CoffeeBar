@extends('layout/app')
@section('title')
    Sign Up
    @stop
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="well">
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    <strong>{{Session::get('msg')}}</strong>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-user"></span> Sign Up
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('register')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            @if($errors->has('name'))
                                <span class="help-block alert alert-danger">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                            @elseif($errors->has('email'))
                                <span class="help-block alert alert-danger">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                            @elseif($errors->has('password'))
                                <span class="help-block alert alert-danger">
                                        <strong>{{$errors->first('password')}}</strong>
                                </span>
                            @elseif($errors->has('password_confirm'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('password_confirm')}}</strong>
                                </div>
                            @endif
                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="{{old('name')}}" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    @stop