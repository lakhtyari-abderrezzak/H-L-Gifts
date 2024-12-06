<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-2">
                    <a id="fh5co-logo" href="/"><img src="{{ asset('images/logo.jpeg') }}" style="width:40px;"
                            alt=""></a>
                </div>
                <div class="col-md-6 col-xs-6 text-center menu-1">
                    <ul>
                        <li class="has-dropdown">
                            <a href="/">Home</a>
                        </li>
                        <li class="has-dropdown">
                            <a href="/products">Products</a>
                        </li>
                        <li><a href="/about">About</a></li>
                        <li class="has-dropdown">
                            <a href="/services">Services</a>
                        </li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                    <ul>
                        <li class="shopping-cart"><a href="{{route('cart.index')}}" class="cart">
                                <span>
                                    <small>
                                        {{ session()->get('cart') ? array_sum(array_column(session()->get('cart'), 'quantity')) : 0 }}
                                    </small>
                                    <i class="icon-shopping-cart"></i>
                                </span>
                            </a>
                        </li>
                        @auth
                            <li><a href="{{ route('dashboard.index') }}">dashboard</a></li>
                            <li>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>

        </div>
    </nav>
