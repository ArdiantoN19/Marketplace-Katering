@extends('layouts.customer')
@section('content')
    <div class="container">
        <h1 class="fw-bold fs-3 text-primary mb-3">Carts</h1>
        <form action="#" method="POST" class="row justify-content-center position-relative">
            @csrf
            <div class="col-lg-8">
                @if(!count($carts))
                    <h3 class="fs-4 text-muted">Cart is empty</h3>
                @else
                    @foreach ($carts as $cart)
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-1 text-center">
                                        <input type="checkbox" class="form-check-input" name="carts[]" value="{{ $cart->id }}" data-price="{{ $cart->product->price }}" data-quantity="{{ $cart->quantity }}"/>
                                    </label>
                                    <div class="col-4">
                                        <img class="card-img-top img-fluid" src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" style="height: 10rem">
                                    </div>
                                    <div class="col-7 position-relative">
                                        <a href="{{ route('pages.customer.carts.destroy', $cart->id) }}" class="btn-close fs-6 position-absolute top-0 end-0"></a>
                                        <h1 class="card-title text-primary fw-bold fs-4 text-capitalize">{{ $cart->product->name }}</h1>
                                        <p class="text-primary fw-bold fs-6 text-warning mb-2">Rp {{ number_format($cart->product->price) }}
                                        </p>
                                        <p class="text-truncate mb-3">
                                            {{ $cart->product->description }}
                                        </p>
                                        <span class="border border-primary p-2 rounded">
                                            Total: {{$cart->quantity}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title text-primary fw-bold fs-4 text-capitalize">Total</h1>
                        <input type="hidden" id="totalHidden" name="total" value="0">
                        <p class="text-primary fw-bold fs-6 text-warning" >Rp <span id="total">{{ number_format(0) }}</span></p>
                        <button type="submit" class="btn btn-primary w-100" id="checkout">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const totalEl = document.querySelector('#total');
        const totalHiddenEl = document.querySelector('#totalHidden');
        const checkoutEl = document.querySelector('#checkout');
        let total = 0;

        document.addEventListener('DOMContentLoaded', () => {
            checkoutEl.disabled = true
        })

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (e) => {
                const quantity = e.target.dataset.quantity;
                const price = e.target.dataset.price;
                if(e.target.checked) {
                    total += quantity * price;
                } else {
                    total -= quantity * price
                }
                totalEl.textContent = total;
                totalHiddenEl.value = total;

                if(total > 0) {
                    checkoutEl.disabled = false
                } else {
                    checkoutEl.disabled = true
                }
            })
        })
    </script>
@endsection
