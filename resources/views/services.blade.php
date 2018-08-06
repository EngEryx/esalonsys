@extends('layouts.index')

@section('content')
    <section class="home-slider"></section>
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-3">
                        <h3>Our Services</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 col-md-12 card-columns">

                    @if($products->count() == 0)
                        <h2>We've not added our services yet, check back soon.</h2>
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