@extends('layouts.index')

@section('content')
    <div class="home-slider"></div>
    <!-- Page Content -->
    <section class="py-3">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h4>Our <strong>Members</strong> Area</h4>
                    <p>Welcome back</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Member Login</h3>
                        </div>
                        <div class="card-body">
                            {{--<form action="login.php" method="post">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="email">Your Email</label>--}}
                                    {{--<input id="email" name="email" type="email" class="form-control">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="password">Your Password</label>--}}
                                    {{--<input id="password" type="password" class="form-control">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<input class="btn btn-primary btn-block book-btn" type="submit" value="Sign In">--}}
                                {{--</div>--}}
                            {{--</form>--}}
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-divider">
                        <div class="divider-or">OR</div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-md-offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>Member Sign Up</h3>
                        </div>
                        <div class="card-body">
                            {{--<form action="login.php" method="post">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="email">Your Email</label>--}}
                                    {{--<input id="email" name="email" type="email" class="form-control">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="phone">Your Phone</label>--}}
                                    {{--<input id="phone" type="text" class="form-control">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="password">Your Password</label>--}}
                                    {{--<input id="password" type="password" class="form-control">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<input class="btn btn-primary btn-block book-btn" type="submit" value="Sign Up">--}}
                                {{--</div>--}}
                            {{--</form>--}}
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

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
                        <img src="img/about-full.jpg"class="card-img-top" alt="About the Salon">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card card-inverse working-schedule">
                        <img class="card-img-top" src="img/about-full2.jpg" alt="Card image">
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
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
