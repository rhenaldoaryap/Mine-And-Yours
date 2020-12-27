@extends('layouts.app')

@section('title', 'Mine and Yours')

@section('content')
<!-- Header -->
<header class="text-center">
        <h1>Hero Wear Masks.</h1>
        <p class="mt-3">
            #saveyourself with wearing masks
            <br />
            altogether save the others
        </p>
        <a href="#scrool" class="btn btn-discover-product px-4 mt-4">
            Discover Product
        </a>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Section Statistic -->
        <div class="container">
            <section
                class="section-stats row justify-content-center"
                id="stats"
            >
                <div class="col-3 col-md-2 stats-detail">
                    <h4>327</h4>
                    <p>Total Order</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h4>20K</h4>
                    <p>Cheap Price</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h4>23</h4>
                    <p>Reseller</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h4>10</h4>
                    <p>Types</p>
                </div>
            </section>
        </div>

        <!-- Section Mine and Yours -->
        <section class="mine-and-yours" id="may">
            <div class="container">
                <div class="row">
                    <div
                        class="col text-center section-mine-and-yours-heading" id="scrool"
                    >
                        <h2>Mine and Yours</h2>
                        <p>
                            The next generation mask with safe technology.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section MaY Content -->
        <section class="section-popular-may" id="popularMay">
            <div class="container">
                <div class="section-popular-may row justify-content-center">
                    @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div
                            class="card-may text-center d-flex flex-column"
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');"
                        >
                            <div class="may-type">{{ $item->title }}</div>
                            <div class="may-button mt-auto">
                                <a
                                    href="{{ route('detail', $item->slug) }}"
                                    class="btn btn-may-details px-4"
                                >
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section Method Payments -->
        <section class="method-payments" id="payments">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Method Payments</h2>
                        <p>
                            Every payments will be proceed immediately
                            <br />
                            And your beloved masks will arrive soon
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img
                            src="frontend/images/payments.jpg"
                            alt="method payments"
                            class="img-payments"
                            style="margin-top: 5px"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Testimonials Heading -->
        <section
            class="section-testimonial-heading"
            id="testimonialHeading"
        >
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They're Loving US</h2>
                        <p>
                            Our product give them good protection
                            <br />
                            And stay stylish with our masks
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Testimonials Content -->
        <section
            class="section section-testimonial-content"
            id="testimonialContet"
        >
            <div class="container">
                <div class="section-popular-may row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img
                                    src="frontend/images/testimonial-1.png"
                                    alt="Testimonial 1"
                                    class="mb-4 rounded-circle"
                                />
                                <h3 class="mb-4">Nafriska & Mate</h3>
                                <p class="testimonial">
                                    "At this pandemic wearing masks it's a
                                    must, with this product help me a lot
                                    and this masks so cool !"
                                </p>
                                <hr />
                                <p class="addict-to mt-2">Leo Addict</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img
                                    src="frontend/images/testimonial-2.png"
                                    alt="Testimonial 1"
                                    class="mb-4 rounded-circle"
                                />
                                <h3 class="mb-4">Yudistira</h3>
                                <p class="testimonial">
                                    "For model like me This product help me
                                    to stay stylish, good product."
                                </p>
                                <hr />
                                <p class="addict-to mt-2">Lunar Addict</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img
                                    src="frontend/images/testimonial-3.png"
                                    alt="Testimonial 1"
                                    class="mb-4 rounded-circle"
                                />
                                <h3 class="mb-4">Ara</h3>
                                <p class="testimonial">
                                    "I love the concept of Lara Simple and
                                    that representing my self as a simple
                                    human"
                                </p>
                                <hr />
                                <p class="addict-to mt-2">Lara Addict</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-buy-product px-4 mt-4 mx-1"
                            >Buy Product
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection