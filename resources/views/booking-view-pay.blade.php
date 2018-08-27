@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{auth()->user()->name}}</h4>
                                <p class="card-text">Email: {{auth()->user()->email}}</p>
                                <p class="card-text">Phone: {{auth()->user()->phone}}</p>
                                <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Access Menu
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('home')}}"><i class="glyphicon glyphicon-arrow-right"></i> << Booking & Purchases</a>
                            </li>
                            {{--<li class="list-group-item">--}}
                                {{--<a href="#"><i class="glyphicon glyphicon-arrow-right"></i> 2. Payments</a>--}}
                            {{--</li>--}}
                            <li class="list-group-item">
                            <a href="#"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order/Booking Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$booking->salonitem_name}}</td>
                            </tr>
                            <tr>
                                <th>Items Ordered</th>
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
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{!! $booking->status_text !!}</td>
                            </tr>
                            @if($booking->status == 0)
                                <tr>
                                    <th>How To Pay</th>
                                    <td>
                                        <ol class="center">
                                            <li>Go to M-PESA on your Phone</li>
                                            <li>Select Send Money</li>
                                            <li>Enter phone number : <strong>0700xxxx</strong></li>
                                            <li>Enter the amount, KSh.<strong>{!! $booking->total_cost !!}</strong></li>
                                            <li>Enter your M-PESA PIN and send</li>
                                            <li>
                                                You will receive a confirmartion SMS from Us
                                            </li>

                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Cost</th>
                                    <td>KSh. {{$booking->total_cost}}</td>
                                </tr>
                                <tr>
                                    {{--<th></th>--}}
                                    <td colspan="2">Refresh page to check if the payment has been processed.</td>
                                </tr>
                                @else
                                <tr>
                                    {{--<th></th>--}}
                                    <td colspan="2">Payment Received. Confirmation Number: <strong>{{$booking->payment->receipt_no}}</strong></td>
                                </tr>
                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
