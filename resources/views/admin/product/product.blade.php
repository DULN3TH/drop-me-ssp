<x-app-layout>
    <div class="container mx-auto mt-1">
        <div class="space-y-10 divide-y divide-gray-900/10">

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        Create Product
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Enter the details for the new product
                    </p>
                </div>


                <form method="POST" @if($product && $product->id) action="{{ route('product.update', $product->id) }}"
                      @else
                          action="{{ route('product.store') }}"

                      @endif


                      class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2"
                enctype="multipart/form-data">
                    @if($product&&$product->id)
                        @method('PUT')
                    @endif
                    @csrf

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- Name -->
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Name
                                </label>
                                <div class="mt-2">
                                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the product.
                                </p>
                                @error('name')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Slug -->
                            <div class="col-span-full">
                                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                                    Slug
                                </label>
                                <div class="mt-2">
                                    <input id="slug" name="slug" type="text" value="{{ old('slug') }}"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Slug of the product.
                                </p>
                                @error('slug')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div class="col-span-full">
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                                    Price
                                </label>
                                <div class="mt-2">
                                    <input id="price" name="price" type="text" value="{{ old('price') }}"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Price of the product.
                                </p>
                                @error('price')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                    Description
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Description of the product.
                                </p>
                                @error('description')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-span-full">
                                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                                    Category
                                </label>
                                <div class="mt-2">
                                    <select id="category" name="category_id"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Select the category of the product.
                                </p>
                                @error('category_id')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-span-full">
                                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">
                                    Image
                                </label>
                                <div class="mt-2">
                                    <input id="image" name="image" type="file"
                                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Image of the product.
                                </p>
                                @error('image')
                                <p class="mt-3 text-sm leading-6 text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror

                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
