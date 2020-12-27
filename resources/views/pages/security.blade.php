@extends('layouts.success')

@section('title', 'Refund')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
    <div class="col text-center">
        <img src="{{ url('frontend/images/secure.jpg') }}" style="width: 300px;" alt="secure" />
        <h1>Mine and Yours Commitment</h1>
        <p>
        Mine and Yours never share your data with anyone
        <br />
        Your data will be protected by
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