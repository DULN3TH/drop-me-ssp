<x-app-layout>
    <!-- ... -->
    <div class="p-6 bg-white border-b border-gray-200">
        You are logged in as a vendor!

        <div class="mt-4">
            <x-dropdown-link href="{{ route('product.index') }}">
                {{ __('Products') }}
            </x-dropdown-link>
        </div>
    </div>
    <!-- ... -->
</x-app-layout>
