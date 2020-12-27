<!-- Navigation -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img
                src="{{ url('frontend/images/LOGO-1.png') }}"
                style="border-radius: 50px"
                alt="Logo Mine and Yours"
            />
        </a>
        <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navb"
        >
            <!-- Titik 3 ketika dibuka di handphone -->
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Link Home, Product, Testimonial. property id akan masuk ke data target -->

        <div class="collapse navbar-collapse" id="navb">
            <!-- navbar-nav adalah sebuah class yang membuat list agar bisa ke kanan -->
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ url('/') }}" class="nav-link active"
                        >Home</a
                    >
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ url('/#scrool') }}" class="nav-link">Product</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ url('/#testimonialHeading') }}" class="nav-link">Testimonial</a>
                </li>
            </ul>

            @guest
            <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                        Sign In
                    </button>
                </form>

                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                        Sign In
                    </button>
                </form>
            @endguest

            @auth
            <!-- Mobile Button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                        Sign Out
                    </button>
                </form>

                <!-- Dekstop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Sign Out
                    </button>
                </form>
            @endauth

        </div>
    </nav>
</div>