<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">eSalon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{url('about')}}">About</a>--}}
                {{--</li>--}}
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('services')}}">
                        Services
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('products')}}">
                        Products
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    @if(auth()->guest())
                    <a class="nav-link" href="{{url('login')}}">
                        Membership
                        <span class="sr-only">(current)</span>
                    </a>
                        @else
                        <a class="nav-link btn btn-success" href="{{url('login')}}">
                             My Account (Hi {{auth()->user()->name}})
                            <span class="sr-only">(current)</span>
                        </a>
                    @endif
                </li>
                @if(auth()->check())
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('feedback')}}">
                           Feedback
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @if(auth()->user()->user_type == 0)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('admin/dashboard')}}">
                                Admin Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item active">
                    <a class="nav-link" href="{{route('frontend.booking.view-cart')}}">
                        View Cart (
                        @if(session()->exists('customer_cart'.auth()->user()->id))
                                {{ count(session()->get('customer_cart'.auth()->user()->id)) }}
                        @else
                            0
                        @endif

                        )
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
