@extends('layout/app')
@section('title')
    Welcome
    @endsection

@section('content')
    <div class="col-md-7 col-sm-7">
        <table id="products">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>ID</th>
                <th>Sale</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $p)

                <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->productID}}</td>
                    <td><a href="{{route('add-to-cart',['id'=>$p->id])}}"><span class="fa fa-shopping-bag"></span> </a></td>
                </tr>

            @endforeach
            </tbody>
        </table>


    </div>
    <div class="col-md-5 col-sm-5">
        <div class="panel panel-primary">
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    <strong>{{Session::get('msg')}}</strong>
                </div>
            @endif
            <div class="panel-heading">
                Product Lists
                <div class="pull-right">
                    <a class="text-danger" href="{{route('removeCart')}}"> <span class="fa fa-trash"></span> Clear Cart</a>
                </div>
            </div>
            <div class="panel panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr style="background: #ffa500;">
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::has('cart'))
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item['pd']['name']}}</td>
                                    <td><a href="{{route('decItemCart',['id'=>$item['pd']['id']])}}"><span class="fa fa-minus-circle"></span></a> {{$item['qty']}} <a href="{{route('incItemCart',['id'=>$item['pd']['id']])}}"><span class="fa fa-plus-circle"></span></a></td>
                                    <td>{{$item['pd']['price']}}</td>
                                    <td>{{$item['amount']}}</td>
                                    <td><a href="{{route('removeItemCart',['id'=>$item['pd']['id']])}}"><span class="fa fa-trash"></span> </a> </td>
                                </tr>
                            @endforeach
                                <tr style="background: #00a379;">
                                    <td>Total Qty</td>
                                    <td>{{$totalQty}}</td>
                                    <td>Total Amount</td>
                                    <td>{{$totalAmount}}</td>
                                    <td>Ks</td>
                                </tr>

                        @endif
                        </tbody>
                    </table>
                @if(Session::has('cart'))
                    <div class="form-group">
                    <form role="form" action="{{route('orderCart')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <select class="form-control" name="tableNum" style="color: #000000;">
                                <option>One</option>
                                <option>Two</option>
                                <option>Three</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Check Out</button>
                    </form>
                    </div>
                    @endif
                <script>
                    $(document).ready(function () {
                        $("#products").dataTable();
                    });
                </script>
            </div>
        </div>
    </div>
    @endsection

