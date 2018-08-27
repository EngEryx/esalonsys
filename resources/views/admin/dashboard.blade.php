@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$new_customers}}</div>
                            <div>New Customers!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.customers')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$new_bookings}}</div>
                            <div>New Bookings!</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.bookings')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$salon_items}}</div>
                            <div>Products & Services</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.products')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$payments}}</div>
                            <div>Payments</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.payments')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell"></i> Notifications : Recent Bookings
                    <div class="pull-right">
                        <a href="{{route('admin.bookings')}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Item Ordered</th>
                            <th>Order Status</th>
                            <th>Cost</th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @if($bookings->count() == 0)
                            <tr class="text-center">
                                <td colspan="7">No Orders available</td>
                            </tr>
                        @else
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$booking->id}}</td>
                                    <td>{{$booking->customer_name}}</td>
                                    <td>
                                        <ul>

                                        @foreach($booking->items as $cart_item)
                                                <li>
                                                    {{$cart_item['item']['name'] .' - '.($cart_item['item']['price'].' x '.(int)$cart_item['quantity'])}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$booking->status_text}}</td>
                                    <td>KSh.{{$booking->total_cost}}</td>
                                    {{--<td>--}}
                                        {{--{{ $booking->created_at }}--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="#" class="btn btn-xs"> <i class="fa fa-eye"></i> View Order</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    @endsection