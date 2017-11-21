@extends('layout/app')
@section('title')
    Order
@stop
@section('content')
    @include('partial/sideBar')

    <div class="col-md-9">
        <div class="well">
            @foreach($orders as $order)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Table Number : {{$order->tableNum}}
                    <div class="pull-right">
                        Submit By : {{$order->user->name}}
                    </div>
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
                        @foreach($order->cart->items as $item)
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
                            <td>{{$order->cart->totalPrice}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    Date : {{$order->created_at}}
                    <div class="pull-right">
                        <a class="btnPrintReceive" href="{{route('printOrder',['id'=>$order->id])}}"><span class="fa fa-print"></span> Print Preview </a>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $(".btnPrintReceive").printPage();
                        });
                    </script>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@stop
