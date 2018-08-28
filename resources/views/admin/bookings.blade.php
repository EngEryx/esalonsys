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
                            <th>Service Date</th>
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
                                            @php $has_product = false @endphp
                                            @php $has_service = false @endphp
                                        @foreach($booking->items as $cart_item)
                                                <li>
                                                    @php
                                                        if($cart_item['type']==2){
                                                        $has_service = true;
                                                        }
                                                    @endphp
                                                    {{$cart_item['item']['name'] .' - '.($cart_item['item']['price'].' x '.(int)$cart_item['quantity'])}}
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
                                        {!! $booking->service_date_status !!}
                                    </td>
                                    <td>
                                        @if($has_service)
                                            <a href="#" onclick="bookingInfo({{$booking->id}},'{{$booking->service_date}}','{{$booking->booking_url}}')" class="btn btn-primary btn-xs"> <i class="fa fa-clock-o"></i> Service Date & Time</a>
                                        @endif
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
            <div id="bookingInfoModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Set Service Time</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="book_date">Set Service Date</label>
                                        <input id="service-date" type="text" class="form-control" name="daterange" value="01/01/2018" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
@endsection

@section('javascripts')
    <script>
        function bookingInfo(id,prev_date, url){
            $('#bookingInfoModal').modal('show');
            $('#service-date').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "startDate": prev_date === '' ? moment() : moment(prev_date,['YYYY-MM-DD hh:mm A']),
                "endDate": prev_date === '' ? moment() : moment(prev_date,['YYYY-MM-DD hh:mm A']),
                "minDate":moment(),
                locale: {
                    format: 'YYYY-MM-DD hh:mm A'
                }
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm A'));
                axios.post(url,{service_date:start.format('YYYY-MM-DD hh:mm A')})
                    .then(res => {
                        swal("Poof! The service has been set successfully!", {
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.reload();
                        }, 2000)
                    })
                    .catch(err=>{
                        console.log(err);
                    });
            });
        }

        function setServiceDate(){
            // axios.post()
        }

        $(function(){

        });
    </script>
    @endsection