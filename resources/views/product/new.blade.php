@extends('layout.app')
@section('title')
    New Product
    @stop
@section('content')
    @include('partial/sideBar')
        <div class="col-md-9">
            <div class="well">
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        <strong>{{Session::get('msg')}}</strong>
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        New Products
                    </div>
                    <div class="panel panel-body">
                        <form role="form" action="{{route('newProduct')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if($errors->has('productID'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('productID')}}</strong>
                                </div>
                            @elseif($errors->has('cover'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('cover')}}</strong>
                                </div>
                            @elseif($errors->has('name'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('name')}}</strong>
                                </div>
                            @elseif($errors->has('price'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('price')}}</strong>
                                </div>
                            @elseif($errors->has('qty'))
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first('qty')}}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="hidden" name="productID" id="productID" value="{{$productID}}">
                                <label for="productID">Product ID : {{$productID}}</label>
                                <div>
                                    <?php
                                    echo DNS1D::getBarcodeHTML("$productID", "CODABAR");
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Product Cover</label>
                                <input type="file" name="cover" id="cover" style="height: auto;" title="Select Product Cover">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{old('price')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="qty" id="qty" placeholder="qty" value="{{old('qty')}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @stop