@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product {{ $items->title }}</h1>
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
            <form action="{{ route('product.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $items->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $items->description }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" rows="10" class="d-block w-100 form-control">"{{ $items->about }}"</textarea>
                </div>
                <div class="form-group">
                    <label for="main_material">Main Material</label>
                    <input type="text" class="form-control" name="main_material" placeholder="Main Material" value="{{ $items->main_material }}">
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="text" class="form-control" name="cost" placeholder="Cost" value="{{ $items->cost }}">
                </div>
                <div class="form-group">
                    <label for="sterile">Sterile</label>
                    <input type="text" class="form-control" name="sterile" placeholder="Sterile" value="{{ $items->sterile }}">
                </div>
                <div class="form-group">
                    <label for="date_of_production">Date of Production</label>
                    <input type="date" class="form-control" name="date_of_production" placeholder="Sterile" value="{{ $items->date_of_production }}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" name="duration" placeholder="Duration" value="{{ $items->duration }}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $items->type }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $items->price }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Change
                </button>
            </form>
        </div>
    </div>

    </div>
<!-- /.container-fluid -->
@endsection