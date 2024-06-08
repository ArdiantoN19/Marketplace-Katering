@extends('layouts.customer')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="height: 20rem">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h1 class="card-title text-primary fw-bold fs-4 text-capitalize">{{ $product->name }}</h1>
                            <p class="text-primary fw-bold fs-6 text-warning">Rp {{ number_format($product->price) }}</p>
                            <p class="mb-5">
                                {{ $product->description }}
                            </p>
                            <form action="{{route('pages.customer.products.addToCart', $product->id)}}" method="POST">
                                @csrf
                                <div class="d-flex gap-2 mb-3">
                                    <button type="button" id="decrement" class="btn btn-sm btn-primary fw-bold px-3">-</button>
                                    <input type="hidden" name="quantity" id="quantity">
                                    <input type="number"  id="quantityShow" class="form-control bg-white" style="width:80px" disabled>
                                    <button type="button" id="increment" class="btn btn-sm btn-primary fw-bold px-3">+</button>
                                </div>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let initialQuantity = 0;
        const quantity = document.querySelector('#quantity');
        const quantityShow = document.querySelector('#quantityShow');
        const decrementBtn = document.querySelector('#decrement');
        const incrementBtn = document.querySelector('#increment');

        document.addEventListener('DOMContentLoaded', () => {
            quantity.value = initialQuantity
            quantityShow.value = initialQuantity
        })

        decrementBtn.addEventListener('click', () => {
            if (quantity.value > 0) {
                quantity.value = parseInt(quantity.value) - 1
                quantityShow.value = parseInt(quantityShow.value) - 1
            }
        })

        incrementBtn.addEventListener('click', () => {
            quantity.value = parseInt(quantity.value) + 1
            quantityShow.value = parseInt(quantityShow.value) + 1
        })
    </script>
@endsection
