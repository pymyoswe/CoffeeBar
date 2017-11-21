@extends('layout.app')
@section('title')
    View Products
@stop
@section('content')
    @include('partial/sideBar')

    <div class="col-md-9 col-sm-9">
        <div class="well">
            @if(Session::has('deleteProduct'))
                <div class="alert alert-success">
                    <strong>{{Session::get('deleteProduct')}}</strong>
                </div>
                @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Product Lists
                </div>
                <div class="panel panel-body">
                    <form role="form" action="{{route('deleteProduct')}}" method="post">
                        {{csrf_field()}}
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Barcode</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <td>Date</td>
                                    <th>Edit</th>
                                    <th>
                                        <button type="button" class="btn btn-sm btn-danger @if(count($products)==0) disabled @endif" data-toggle="modal" data-target="#myModal">
                                            <span class="fa fa-trash"></span> Delete
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $p)
                                    <tr>
                                        <td>{{$p->productID}}</td>
                                        <td>
                                            <?php
                                                echo DNS1D::getBarcodeHTML("$p->productID", "CODABAR");
                                            ?>
                                        </td>
                                        <td style="text-align: center"><img src="{{route('productCover',['id'=>$p->id])}}" width="50px" height="50px" class="img-circle"></td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->price}} Ks</td>
                                        <td>{{$p->created_at}}</td>
                                        <td><a href="{{$p->id}}"><span class="fa fa-edit"></span> Edit</a> </td>
                                        <td><input type="checkbox" name="removeProduct[]" value="{{$p->id}}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirm products delete!</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                </div>
            </div>
            {{$products->links()}}
        </div>
    </div>
@stop

