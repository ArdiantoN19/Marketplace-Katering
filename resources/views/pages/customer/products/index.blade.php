@extends('layouts.customer')
@section('content')
    <div class="container mt-3">
        <div class="row row-cols-4">
            @foreach ($products as $product)
            <div class="card shadow-sm">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset('storage/'. $product->image)}}" alt="{{$product->name}}" style="height: 20rem">
                    <div class="card-body">
                        <a href="{{route('pages.customer.products.show', $product->id)}}" class="card-title text-primary fw-bold fs-4 text-capitalize">{{$product->name}}</a>
                        <p class="text-primary fw-bold fs-6 text-warning">Rp {{number_format($product->price)}}</p>
                        <p class="text-truncate m-0">
                            {{$product->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection