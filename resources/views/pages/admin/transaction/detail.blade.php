@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction {{ $items->user->name }}</h1>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $items->id }}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $items->product->title }}</td>
                </tr>
                <tr>
                    <th>Buyer</th>
                    <td>{{ $items->user->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>Rp{{ $items->price }}</td>
                </tr>
                <tr>
                    <th>Transaction Total</th>
                    <td>Rp{{ $items->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Transaction Status</th>
                    <td>{{ $items->transaction_status }}</td>
                </tr>
            </table>
        </div>
    </div>

    </div>
<!-- /.container-fluid -->
@endsection