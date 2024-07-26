@extends('web.layout.app')
@section('title')
    SYNCVOGUE - Cart
@endsection
@section('content')

    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});">
        </div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Cart</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('home') }}">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- cart section -->
    <section class="cart-section cart-page">
        <div class="auto-container">
            @if (session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                    <div class="table-outer">

                        <p class="d-none" id="cart-empty">Your cart is empty.</p>
                        @if (empty($cart))
                            <p>Your cart is empty.</p>
                        @else
                            <form id="cart-form" action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <table class="cart-table">
                                    <thead class="cart-header">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th class="prod-column">Product Name</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th class="price">Size</th>
                                            <th class="price">Price</th>
                                            <th class="quantity">Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $itemId => $item)
                                            @php
                                                $description = $item['description'];
                                                $position = strpos($description, ' -');
                                                $trimmedDescription =
                                                    $position !== false
                                                        ? substr($description, 0, $position)
                                                        : $description;
                                            @endphp
                                            <tr data-item-id="{{ $itemId }}">
                                                <td colspan="4" class="prod-column">
                                                    <div class="column-box">
                                                        <div class="remove-btn"
                                                            onclick="removeFromCart('{{ $itemId }}')">
                                                            <i class="flaticon-close"></i>
                                                        </div>
                                                        <div class="prod-thumb">
                                                            <a href="#"><img src="{{ $item['image'] }}"
                                                                    alt="{{ $trimmedDescription }}"></a>
                                                        </div>
                                                        <div class="prod-title">

                                                            {{ $trimmedDescription }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">{{ $item['size'] }}</td>
                                                <td class="price">${{ number_format($item['price'], 2) }}</td>
                                                <td class="qty">
                                                    <div class="item-quantity">
                                                        <input class="quantity-spinner" type="number"
                                                            name="quantities[{{ $itemId }}]"
                                                            value="{{ $item['quantity'] }}" min="1">
                                                    </div>
                                                </td>
                                                <td class="sub-total">
                                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="othre-content clearfix">
                                    <div class="update-btn pull-right">
                                        <button type="submit" class="theme-btn-one">Update Cart<i
                                                class="flaticon-right-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>

            <div class="othre-content clearfix d-none" id="continue-shopping">
                <div class="update-btn pull-right">
                    <a href="{{ route('shop') }}" class="theme-btn-two">Continue Shopping<i
                            class="flaticon-right-1"></i></a>
                </div>
            </div>
            @if (empty(session('cart')))
                <div class="othre-content clearfix">
                    <div class="update-btn pull-right">
                        <a href="{{ route('shop') }}" class="theme-btn-two">Continue Shopping<i
                                class="flaticon-right-1"></i></a>
                    </div>
                </div>
            @endif

            @if (!empty(session('cart')))
                <div class="cart-total" id="cart-total-section">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                            <div class="total-cart-box clearfix">
                                <h4>Cart Totals</h4>
                                <ul class="list clearfix">
                                    <li>Subtotal:<span id="subtotal">${{ number_format($subtotal, 2) }}</span></li>
                                    <li>Shipping:<span id="shipping-price">${{ number_format($shippingPrice, 2) }}</span>
                                    </li>
                                    <li>Order Total:<span id="order-total">${{ number_format($orderTotal, 2) }}</span></li>
                                </ul>
                                <a href="{{ route('checkout') }}" class="theme-btn-two">Proceed to Checkout<i
                                        class="flaticon-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- cart section end -->

    <script>
        function removeFromCart(itemId) {
            fetch("{{ route('cart.remove') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        item_id: itemId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartIcon();
                        document.querySelector(`tr[data-item-id="${itemId}"]`).remove();
                        document.getElementById('subtotal').innerText = '$' + data.subtotal
                        document.getElementById('shipping-price').innerText = '$' + data.shippingPrice
                        document.getElementById('order-total').innerText = '$' + data.orderTotal

                        // Check if the cart is empty
                        if (data.cartEmpty) {
                            document.getElementById('cart-total-section').style.display = 'none';
                            document.getElementById('continue-shopping').classList.remove('d-none');
                            document.getElementById('cart-form').style.display = 'none';
                            document.getElementById('cart-empty').classList.remove('d-none');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the item.');
                });
        }

        window.onload = function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 500);
                }, 3000);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {

            // Update all cart
            document.getElementById('cart-form').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const quantities = {};
                formData.forEach((value, key) => {
                    if (key.startsWith('quantities[')) {
                        const itemId = key.match(/quantities\[(.*?)\]/)[1];
                        quantities[itemId] = value;
                    }
                });

                fetch("{{ route('cart.update') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            quantities: quantities
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update totals
                            document.querySelector('.list li:nth-child(1) span').textContent = '$' +
                                data.subtotal;
                            document.querySelector('.list li:nth-child(2) span').textContent = '$' +
                                data.shippingPrice;
                            document.querySelector('.list li:nth-child(3) span').textContent = '$' +
                                data.orderTotal;

                            // Update total quantity in cart icon
                            document.querySelector('.shop-cart span').textContent = data.totalQuantity;

                            // Update subtotal for each item
                            Object.keys(data.itemSubtotals).forEach(itemId => {
                                document.querySelector(
                                        `tr[data-item-id="${itemId}"] .sub-total`).innerText =
                                    '$' + data.itemSubtotals[itemId];
                            });

                            // Display success message
                            const successMessage = document.createElement('div');
                            successMessage.className = 'alert alert-success';
                            successMessage.textContent = data.message;
                            document.querySelector('.total-cart-box').insertBefore(successMessage,
                                document.querySelector('.total-cart-box').firstChild);

                            setTimeout(() => {
                                successMessage.style.opacity = '0';
                                setTimeout(() => {
                                    successMessage.remove();
                                }, 500);
                            }, 3000);
                        } else {
                            alert('Failed to update cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while updating the cart.');
                    });
            });


        })
    </script>
@endsection
