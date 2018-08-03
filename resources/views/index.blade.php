@extends('layouts.index')

@section('content')
    {{--<header class="home-slider">--}}
        {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
            {{--</ol>--}}
            {{--<div class="carousel-inner" role="listbox">--}}
                {{--<!-- Slide One - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item active" style="background-image: url('img/slv1.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h1>First Slide</h1>--}}
                        {{--<p>This is a description for the 1st slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Two - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('img/slv2.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h1>Second Slide</h1>--}}
                        {{--<p>This is a description for the second slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Three - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('img/slv3.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h1>Third Slide</h1>--}}
                        {{--<p>This is a description for the third slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
                {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
                {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</header>--}}

    <!-- Page Content -->
    <section class="py-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-3">
                        <h3>When Can You Get Us?</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="about-header">
                        <h2 class="lead">eSalon</h2>
                        <h3 class="follow">Spa & Beauty Center</h3>
                    </div>
                    <div class="about-content">
                        <p>Our Services are the best.A salon is a business that welcomes men and
                            women offering hair-cutting, coloring, and other such type of services.</p>
                    </div>
                    <div class="about-links">
                        <a href="#" class=""><i class="fa fa-arrow-right"></i> Our Products</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <img src="{{asset('img/about-full.jpg')}}" class="card-img-top" alt="About the Salon">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card card-inverse working-schedule">
                        <img class="card-img-top" src="{{asset('img/about-full2.jpg')}}" alt="Card image">
                        <div class="card-img-overlay text-center">
                            <div class="our-schedule">
                                <h2 class="">Working Hours</h2>
                                <p class="title">Mon - Sat</p>
                                <p class="text">10.00 AM - 5.00 PM</p>
                                <p class="title">Sunday</p>
                                <p class="text">Closed</p>
                                <a class="btn btn-default btn-lg">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-3">
                        <h3>Our Products & Services</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 col-md-12 card-columns">

                    @if($products->count() == 0)
                        <h2>We've not added our products yet, check back soon.</h2>
                        @else
                        @foreach($products as $product)
                            <div class="card sale-item">
                                <img class="card-img-top" src="{{$product->img_url}}" alt="Massage">
                                <div class="card-body">
                                    <h4>{{$product->name}}</h4>
                                    <p class="service-desc">{{$product->short_description}} <span> {{$product->price_text}}</span></p>
                                    <div class="purchase">
                                        {!! $product->purchase_url !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    @endsection
