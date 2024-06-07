<x-app-layout>
    <div class="container mx-auto mt-4">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-1">
                <div class="md:col-span-3 bg-white shadow-md ring-2 ring-gray-900/5 sm:rounded-xl p-4 m-4 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Order ID</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Order Date</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Product</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Details</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Price</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-gray-800 text-left text-sm uppercase font-medium">Status</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $id => $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $id }} {{-- Order ID --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::now()->format('Y-m-d') }} {{-- Order Date (current date) --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="/path/to/product_image.jpg" alt="Product Image">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $order['name'] }} {{-- Product Name --}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            Quantity: {{ $order['quantity'] }} {{-- Quantity --}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Rs. {{ $order['price'] }} {{-- Price --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        Pending {{-- Status --}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        N/A {{-- Delivery Date --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end items-center p-6">
                        <p class="font-semibold">Total Price: Rs. {{ array_sum(array_column($orders, 'price')) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
