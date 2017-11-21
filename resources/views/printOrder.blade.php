@extends('layout/app')
@section('title')
    Order
@stop
@section('content')
    <div class="col-md-9">
        <div class="well">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Table Number : {{$orders->tableNum}}<br>
                        Submit By : {{$orders->user->name}}
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders->cart->items as $item)
                                <tr>
                                    <td>{{$item['pd']['name']}}</td>
                                    <td>{{$item['qty']}}</td>
                                    <td>{{$item['pd']['price']}}</td>
                                    <td>{{$item['amount']}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    Total Amount
                                </td>
                                <td>{{$orders->cart->totalPrice}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        Date : {{$orders->created_at}}
                    </div>

                </div>
        </div>
    </div>
@stop

