@extends('layouts.success')

@section('title', 'Thank you!')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
    <div class="col text-center">
        <img src="{{ url('frontend/images/thank-you.jpg') }}" alt="thank-you" />
        <h1>Thank you for purchasing!</h1>
        <p>
        We've sent you an email for details
        <br />
        of your payment, please read it as well!
        <br />
        <br />
        Not receive an email?
        <br />
        Please immediately contact us
        </p>
        <a href="/" class="btn btn-home-page mt-3 px-5">
        Home Page
        </a>
    </div>
    </div>
</main>
@endsection