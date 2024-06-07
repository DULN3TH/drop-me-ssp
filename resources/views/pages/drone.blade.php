<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Drone Type</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-8">Select Drone Type</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Sample Drone 1 -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="drone1.jpg" alt="Drone 1" class="w-full h-40 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Drone Model 1</h2>
        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sodales
            euismod felis, sit amet eleifend justo maximus at.</p>
        <p class="text-gray-800 font-semibold">Rs. 250</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                onclick="addToCart('Drone Model 1', 250)">Select</button>
    </div>

    <!-- Sample Drone 2 -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="drone2.jpg" alt="Drone 2" class="w-full h-40 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Drone Model 2</h2>
        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sodales
            euismod felis, sit amet eleifend justo maximus at.</p>
        <p class="text-gray-800 font-semibold">Rs. 550</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                onclick="addToCart('Drone Model 2', 550)">Select</button>
    </div>

    <!-- Sample Drone 3 -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="drone3.jpg" alt="Drone 3" class="w-full h-40 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Drone Model 3</h2>
        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sodales
            euismod felis, sit amet eleifend justo maximus at.</p>
        <p class="text-gray-800 font-semibold">Rs. 700</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                onclick="addToCart('Drone Model 3', 700)">Select</button>
    </div>

    <!-- Sample Drone 4 -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="drone4.jpg" alt="Drone 4" class="w-full h-40 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Drone Model 4</h2>
        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sodales
            euismod felis, sit amet eleifend justo maximus at.</p>
        <p class="text-gray-800 font-semibold">Rs. 850</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                onclick="addToCart('Drone Model 4', 850)">Select</button>
    </div>
</div>

<!-- Cart Modal -->
<div id="cartModal" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
        <div id="cartItems" class="mb-4">
            <!-- Cart items will be displayed here -->
        </div>
        <p id="totalPrice" class="text-gray-800 font-semibold mb-4">Total: Rs. 0</p>
        <button onclick="proceedToCheckout()" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Proceed to Checkout</button>
        <button onclick="closeCart()" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md ml-4">Close</button>
    </div>
</div>



</body>

</html>
