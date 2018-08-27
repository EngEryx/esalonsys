@extends('layouts.index')

@section('content')
    <section class="home-slider"></section>
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3">

                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img class="card-img-top" src="{{$salonitem->img_url}}" alt="Picture">
                </div>
                <div class="col-md-6">
                    <h2 class="service-desc">{{$salonitem->name}}</h2>
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <h4>Product Details</h4>
                            <hr>
                            {{$salonitem->short_description}}
                            <br>
                            <br>
                            <h4>Description</h4>
                            <hr>
                            {{$salonitem->long_description}}
                            <br>
                            <br>
                            <h4>Price</h4>
                            <hr>
                            <h2> {{$salonitem->price_text}}</h2>
                        </div>
                        <div class="card-footer">
                            {{--{!! $salonitem->checkout_url !!}--}}

                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('landing')}}" class="btn btn-success pull-left"><i class="fa fa-shopping-cart"></i>Continue Shopping</a>
                                </div>
                                <div class="col-md-8">
                                    <form action="{{route('frontend.booking.add-to-cart',$salonitem)}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="number" name="quantity" min="1" value="1" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="submit"  class="btn btn-success ml-1">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection