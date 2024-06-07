<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pizza Hut</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- tailwind css -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">

<h1 class="text-4xl font-extrabold text-center text-gray-800 my-12">Welcome to Pizza Hut</h1>

<section id="Projects"
         class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-10 gap-x-6 mt-10 mb-5">

    @foreach($products as $product)
        <div class="w-56 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
            <a href="#">
                <img src="/product_images/{{ $product->image }}"
                     alt="{{ $product->name }}" class="h-56 w-56 object-cover rounded-t-xl" />
                <div class="px-4 py-3 w-56">
                    <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->description }}</span>
                    <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                    <div class="flex items-center">
                        <p class="text-lg font-semibold text-black cursor-auto my-3">Rs.{{ $product->price }}</p>
                        <a href="{{ route('add_to_cart', $product->id) }}" class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg></a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</section>

<div class="container mx-auto my-8">
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<div class="fixed right-0 top-0 w-auto sm:w-96 h-full bg-white shadow-lg p-8 overflow-y-auto" id="sidebar">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Shopping cart</h2>
        <button id="close-sidebar" class="text-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div id="cart-items">
        @php $total = 0; @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity']; @endphp
                <div class="flex items-center mb-6">
                    <img src="/product_images/{{ $product->image }}" alt="{{ $details['name'] }}" class="w-5 h-5 object-cover rounded-md mr-4">
                    <div class="flex-1">
                        <h3 class="text-base font-semibold text-gray-800">{{ $details['name'] }}</h3>
                        <p class="text-sm text-gray-600">Quantity: {{ $details['quantity'] }}</p>
                    </div>
                    <div class="text-sm font-semibold text-gray-800">Rs.{{ $details['price'] }}</div>
                    <a href="{{ route('cart') }}" class="text-purple-600 ml-4 text-sm focus:outline-none">
                        Edit
                    </a>
                </div>
            @endforeach
        @else
            <p class="text-gray-600">Your cart is empty</p>
        @endif
    </div>
    <div class="border-t pt-6 mt-6">
        <div class="flex justify-between text-sm font-semibold text-gray-800 mb-4">
            <p>Subtotal</p>
            <p>Rs.{{ $total }}</p>
        </div>
        <p class="text-xs text-gray-600 mb-6">Shipping and taxes calculated at checkout.</p>
        <form action="{{ route('checkout') }}" method="POST" class="flex flex-col items-center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="total" value="1000">
            <input type="hidden" name="productname" value="DropMe">


            <button type="submit" class="flex items-center justify-center rounded-md bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition mb-4">
                Checkout
            </button>
            <p>or
                <a href="{{ url('/') }}" class="text-indigo-600 hover:text-indigo-500 font-medium text-base transition">
                    Continue Shopping <span aria-hidden="true">→</span>
                </a>
            </p>
        </form>
    </div>

</div>


<button id="open-sidebar" class="fixed top-4 right-4 bg-purple-600 text-white py-2 px-4 rounded-md focus:outline-none">Open Cart</button>



@yield('scripts')

<script type="text/javascript">
    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents(".mb-4").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    document.getElementById('close-sidebar').addEventListener('click', function() {
        document.getElementById('sidebar').style.display = 'none';
        document.getElementById('open-sidebar').style.display = 'block';
    });

    document.getElementById('open-sidebar').addEventListener('click', function() {
        document.getElementById('sidebar').style.display = 'block';
        document.getElementById('open-sidebar').style.display = 'none';
    });

    // Initially hide the open button
    document.getElementById('open-sidebar').style.display = 'none';
</script>

</body>
</html>
<?php
session(['total' => $total]);
?>
