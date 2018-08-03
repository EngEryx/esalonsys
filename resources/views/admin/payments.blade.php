@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payments</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>All Payments
                    <div class="pull-right">

                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Receipt</th>
                            <th>Customer</th>
                            <th>Order #.</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                            <th>Other Details</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($payments->count() == 0)
                            <tr class="text-center">
                                <td colspan="10">No Payments available</td>
                            </tr>
                        @else
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->customer_name}}</td>
                                    <td>{{$payment->booking_name}}</td>
                                    <td>{{$payment->status_text}}</td>
                                    <td>{{$payment->amount_text}}</td>
                                    <td>{{$payment->payment_details}}</td>
                                    <td>
                                        {{ $payment->created_at }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-xs"> <i class="fa fa-eye"></i> View Payment</a>
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