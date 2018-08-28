<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>eSalon</title>
    {{--<link rel="stylesheet" href="{{asset("pdf/style.css")}}" media="all" />--}}
</head>
<body>
<h3>eSalon Service and Product Sales</h3>
<table border="1" cellspacing="0" cellpadding="1" width="100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Items Ordered</th>
        <th>Order Status</th>
        <th>Cost</th>
        <th>Date Placed</th>
        <th>Service Date</th>
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
                <td>{!! $booking->status_text !!}</td>
                <td>{{$booking->total_cost}}</td>
                <td>
                    {{ $booking->created_at }}
                </td>
                <td>
                    {!! $booking->service_date_status !!}
                </td>
            </tr>
        @endforeach

    </tbody>
    {{--<tfoot>--}}
    {{--<tr>--}}
        {{--<td colspan="2"></td>--}}
        {{--<td colspan="3">SUBTOTAL</td>--}}
        {{--<td>KSh. 0</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="2"></td>--}}
        {{--<td colspan="3">TAX 0%</td>--}}
        {{--<td>0.00</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="2"></td>--}}
        {{--<td colspan="3">GRAND TOTAL</td>--}}
        {{--<td>KSh. 0</td>--}}
    {{--</tr>--}}
    {{--</tfoot>--}}
    @endif
</table>

</body>
</html>