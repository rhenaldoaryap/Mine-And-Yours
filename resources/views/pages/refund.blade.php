@extends('layouts.success')

@section('title', 'Refund')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
    <div class="col text-center">
        <img src="{{ url('frontend/images/refund.png') }}" style="width: 300px;" alt="refund" />
        <h1>Our Refund Terms and Condition</h1>
        <p>
        Refund only be able to claim if the product that we
        sent to you has deformed
        <br />
        Refund can not be claimed if the mistakes is not by team
        <br />
        Mine and Yours
        </p>
        <a href="/" class="btn btn-home-page mt-3 px-5">
        Home Page
        </a>
    </div>
    </div>
</main>
@endsection