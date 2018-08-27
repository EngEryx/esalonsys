@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders/Bookings</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Customer Orders/Bookings
                    <div class="pull-right">
                        <a href="{{route('admin.print-bookings')}}" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Download Report</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Items Ordered</th>
                            <th>Order Status</th>
                            <th>Cost</th>
                            <th>Date Placed</th>
                            <th>Action</th>
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
                                            @php $cart_items = session()->get('customer_cart'.auth()->user()->id) ?: [] @endphp

                                        @foreach($cart_items as $cart_item)
                                                <li>
                                                    {{$cart_item['item']->name .' - '.($cart_item['item']->price.' x '.(int)$cart_item['quantity'])}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{!! $booking->status_text !!}</td>
                                    <td>{{$booking->total_cost}}</td>
                                    <td>
                                        {{ $booking->created_at }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-xs"> <i class="fa fa-eye"></i> View Order</a>
                                    </td>
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

@section('javascript')
    <script>
        function confirmBooking(){

        }
    </script>
    @endsection