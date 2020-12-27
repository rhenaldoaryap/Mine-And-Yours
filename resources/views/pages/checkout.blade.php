@extends('layouts.checkout')

@section('title', 'Checkout')

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
                            <li class="breadcrumb-item">
                                <a
                                    href="/"
                                    style="color: #071c4d">
                                    Product
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('detail', $item->product->slug) }}"
                                    style="color: #071c4d;">
                                    Details
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-details mb-3">
                        <h2>Checkout Information</h2>
                        <div class="members my-2">
                            <table class="product-information">
                                <tr>
                                    <th width="50%">Many of pieces</th>
                                    <td width="50%" class="text-right">
                                        1 pcs
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Shipment Fee</th>
                                    <td
                                        width="50%"
                                        class="text-right"
                                        style="font-size: 12px"
                                    >
                                        (Depends on your location)
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td
                                        width="50%"
                                        class="text-right"
                                        style="font-size: 12px"
                                    >
                                        {{ $item->transaction_total }} + Shipment Fee
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right">
                                        <span class="text-blue">Rp. {{ $item->transaction_total + 10000}},</span><span class="text-orange">{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr />
                        <h2>Payments</h2>
                        <div class="payments-information">
                            <p>
                                Please complete the payment for
                                purchasing your beloved mask.
                                <br />
                                Thank you for supporting local brand.
                            </p>
                            <p class="may-inc">Mine and Yours Inc.</p>
                        </div>
                        <div class="col-md-8 text-center">
                            <img
                                src="{{ url('frontend/images/payments-method.jpg')}}"
                                alt="method checkout"
                                class="img-checkout"
                            />
                        </div>
                        <div class="mt-3 text-center">
                            <p class="bank">
                                BRI : 093801072675539
                                <br />
                                a/n FITRI HASAN
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h1>Insert Data</h1>
                        <p>
                            Please fill in form below with correct data
                        </p>
                        <form action="{{ route('checkout-success', $item->id) }}" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="userName">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="userName"
                                    placeholder="Username Account"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fullName"
                                    placeholder="Enter full name"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Enter address"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Enter email"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="transferFrom"
                                    >Transfer From</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="transferFrom"
                                    placeholder="From BRI / COD"
                                    required
                                />
                            </div>
                            <div class="join-container">
                                <button
                                    type="submit"
                                    class="btn btn-block btn-purchase mt-5 py-2"
                                    role="button"
                                >
                                    I Have Made Payment
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <a
                                    href="{{ route('detail', $item->product->slug) }}"
                                    class="text-muted"
                                    >Cancel</a
                                >
                            </div>
                        </form>
                        <h3 class="mt-3 mb-0">Note</h3>
                        <p class="disclaimer-checkout mb-0">
                            Your are only able to purchase if you has
                            already registered in Mine and Yours. Please
                            login or register first
                            <br />
                            Shipment Fee will not applied if you using
                            COD
                            <br />
                            We'll NEVER share your address or email with
                            anyone else.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection