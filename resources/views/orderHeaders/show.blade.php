@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_id">Id</label>
                        <input readonly id="order_header_id" name="id" class="form-control form-control-sm" value="{{$orderHeader->id}}" type="number" required />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="customer_name">Customer</label>
                        <input readonly id="customer_name" name="customer_name" class="form-control form-control-sm" value="{{$orderHeader->customer_name}}" maxlength="50" />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_order_date">Order Date</label>
                        <input readonly id="order_header_order_date" name="order_date" class="form-control form-control-sm" value="{{$orderHeader->order_date}}" data-type="date" autocomplete="off" required />
                    </div>
                    <div class="col-12">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderHeaderOrderDetails as $orderHeaderOrderDetail)
                                <tr>
                                    <td class="text-center">{{$orderHeaderOrderDetail->no}}</td>
                                    <td>{{$orderHeaderOrderDetail->product_name}}</td>
                                    <td class="text-right">{{$orderHeaderOrderDetail->qty}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="/orderDetails/{{$orderHeaderOrderDetail->order_id}}/{{$orderHeaderOrderDetail->no}}/edit" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="/orderDetails/{{$orderHeaderOrderDetail->order_id}}/{{$orderHeaderOrderDetail->no}}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i class="fa fa-times"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-sm btn-primary" href="/orderDetails/create?order_detail_order_id={{$orderHeader->id}}">Add</a>
                        <hr />
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
                        <a class="btn btn-sm btn-primary" href="/orderHeaders/{{$orderHeader->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    initPage(true)
</script>
@endsection