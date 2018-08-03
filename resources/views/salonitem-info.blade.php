@extends('layouts.index')

@section('content')
    <section class="home-slider"></section>
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-3">
                        <h3>Confirm : Product/Service Information</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="service-desc">{{$salonitem->name}}<span> {{$salonitem->price_text}}</span></h4>
                        </div>
                        <img class="card-img-top" src="{{$salonitem->img_url}}" alt="Picture">

                        <div class="card-body">
                            <h4>Short Description</h4>
                            <hr>
                            {{$salonitem->short_description}}
                            <h4>Long Description</h4>
                            <hr>
                            {{$salonitem->long_description}}
                        </div>
                        <div class="card-footer">
                            {!! $salonitem->checkout_url !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection