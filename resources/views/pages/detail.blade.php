@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
<!-- Main Content Details -->
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
    <div class="container">
        <div class="row">
        <div class="col p-0">
            <nav>
            <ol class="breadcrumb ml-3">
                <li class="breadcrumb-item">Product</li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
            <h1>{{ $item->title }}</h1>
            <p>
                {{ $item->description }}
            </p>
            @if($item->galleries->count())
                <div class="gallery">
                    <div class="xzoom-container">
                    <img
                        class="xzoom"
                        id="xzoom-default"
                        src="{{ Storage::url($item->galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                        alt="lunar-details"
                    />
                    </div>
                    <div class="xzoom-thumbs">
                    @foreach($item->galleries as $gallery)
                        <a href="{{ Storage::url($gallery->image) }}">
                            <img
                            class="xzoom-gallery"
                            src="{{ Storage::url($gallery->image) }}"
                            width="153"
                            xpreview="{{ Storage::url($gallery->image) }}"
                            alt="lunar-details"
                            />
                        </a>
                    @endforeach
                    </div>
                </div>
            @endif
            <h2>About</h2>
            <p>
                {!! $item->about !!}
            </p>
            <div class="material row">
                <div class="col-md-4">
                <div class="description">
                    <img
                    src="{{ url('frontend/images/material.png') }}"
                    alt="material"
                    class="features-image"
                    />
                    <div class="description">
                    <h3>Main Material</h3>
                    <p>{{ $item->main_material}}</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 border-left">
                <div class="description">
                    <img
                    src="{{ url('frontend/images/price.png') }}"
                    alt="price"
                    class="features-image"
                    />
                    <div class="description">
                    <h3>Price</h3>
                    <p>{{ $item-> cost }}</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 border-left">
                <div class="description">
                    <img
                    src="{{ url('frontend/images/sterile.png') }}"
                    alt="sterile"
                    class="features-image"
                    />
                    <div class="description">
                    <h3>Sterile</h3>
                    <p>{{ $item->sterile }}</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-details card-right">
            <h2>Last orders from our members</h2>
            <div class="members my-2">
                <img
                src="{{ url('frontend/images/member-1.png') }}"
                alt="member-1"
                class="member-image mr-1"
                />
                <img
                src="{{ url('frontend/images/member-2.png') }}"
                alt="member-2"
                class="member-image mr-1"
                />
                <img
                src="{{ url('frontend/images/member-3.png') }}"
                alt="member-3"
                class="member-image mr-1"
                />
                <img
                src="{{ url('frontend/images/member-4.png') }}"
                alt="member-4"
                class="member-image mr-1"
                />
                <img
                src="{{ url('frontend/images/member-5.png') }}"
                alt="member-5"
                class="member-image mr-1"
                />
            </div>
            <hr />
            <h2>Product Information</h2>
            <table class="product-information">
                <tr>
                <th width="50%" style="font-size: 15px">
                    Date of production
                </th>
                <td width="50%" class="text-right" style="font-size: 15px">
                    {{ \Carbon\Carbon::create($item->date_of_production)->format('F n, Y') }}
                </td>
                </tr>
                <tr>
                <th width="50%" style="font-size: 15px">Estimate Arrive</th>
                <td width="50%" class="text-right" style="font-size: 15px">
                    {{ $item->duration }}
                </td>
                </tr>
                <tr>
                <th width="50%" style="font-size: 15px">
                    {{ $item->type }}
                </th>
                <td width="50%" class="text-right" style="font-size: 15px">
                    YES
                </td>
                </tr>
                <tr>
                <th width="50%" style="font-size: 15px">Price</th>
                <td width="50%" class="text-right" style="font-size: 15px">
                    {{ $item->price }}
                </td>
                </tr>
            </table>
            </div>
            <div class="join-container">
                @auth
                    <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-block btn-purchase mt-3 py-2" type="submit">
                            Purchase
                        </button>
                    </form>
                @endauth
                @guest
                    <a
                        href="{{ url('register') }}"
                        class="btn btn-block btn-purchase mt-3 py-2"
                    >
                        Login or register to purchase
                    </a>
                @endguest
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
        zoomWidth: 500,
        title: false,
        tint: "#333",
        Xoffset: 15,
    });
    });
</script>
@endpush
