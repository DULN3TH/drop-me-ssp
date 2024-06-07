<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store Selection</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-100 font-sans">
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">Select a Store to Buy From</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $shop)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 transition duration-300">
                    <a href="{{ url('user/pizzahut/'.$shop->id) }}" class="block h-full">

                        <div class="p-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $shop->name }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </body>

    </html>
</x-app-layout>
