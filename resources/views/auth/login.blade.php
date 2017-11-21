@extends('layout/app')
@section('title')
    Login
@stop
@section('content')
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="well">
            @if(Session::has('msg'))
                <div class="alert alert-danger">
                    <strong>{{Session::get('msg')}}</strong>
                </div>
                @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-log-in"></span> Login
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('login')}}" method="post">
                        {{csrf_field()}}
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('email')}}</strong>
                            </div>
                        @elseif($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{$errors->first('password')}}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop