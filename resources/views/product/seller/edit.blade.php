<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endif
            <div class="p-4 sm:p-8 bg-p-dark shadow sm:rounded-lg">
                
                        <form method="POST" action="{{ route('seller.products.update', $product) }}"
                            class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" class="text-p-light" />
                                <x-text-input id="name" name="name" type="text"
                                    class="mt-1 block w-full bg-p-medium text-p-light"
                                    :value="old('name', $product->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="users" :value="__('User Name')" class="text-p-light" />
                                <x-select-input id="users" name="user_id"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $product->user_id) == $user->id ?
                                        'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                            </div>

                            <div>
                                <x-input-label for="category" :value="__('Category')" class="text-p-light" />
                                <x-select-input id="category" name="category_id"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) ==
                                        $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>

                            <div>
                                <x-input-label for="price" :value="__('Price')" class="text-p-light" />
                                <x-text-input id="price" name="price" type="text"
                                    class="mt-1 block w-full bg-p-medium text-p-light"
                                    :value="old('price', $product->price)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="discount" :value="__('Discount')" class="text-p-light" />
                                <x-text-input id="discount" name="discount" type="text"
                                    class="mt-1 block w-full bg-p-medium text-p-light"
                                    :value="old('discount', $product->discount)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('discount')" />
                            </div>

                            <div>
                                <x-input-label for="details" :value="__('Details')" class="text-p-light" />
                                <textarea id="details" name="details" rows="4"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-p-light bg-p-medium"
                                    required>{{ old('details', $product->details) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('details')" />
                            </div>

                            <div>
                                <x-input-label for="quantity" :value="__('Quantity')" class="text-p-light" />
                                <x-text-input id="quantity" name="quantity" type="text"
                                    class="mt-1 block w-full bg-p-medium text-p-light"
                                    :value="old('quantity', $product->quantity)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                            </div>
                            <div>
                                <x-input-label for="photos" :value="__('Product Photos')" class="text-p-light" />
                                <input id="photos" name="photos[]" type="file" class="mt-1 block w-full text-p-light"
                                    multiple />
                                <x-input-error class="mt-2" :messages="$errors->get('photos')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update Product') }}</x-primary-button>
                            </div>
                        </form>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-6 mt-2 mb-2">
                            @foreach($product->photos as $photo)
                            <div class="photo-item relative inline-block m-2">
                                <img src="{{ $photo->photo_url }}" alt="Photo {{ $loop->iteration }}"
                                    class="w-32 h-32 object-cover rounded shadow" />
                                <form method="post" action="{{ route('seller.products.photos.destroy', [$product, $photo]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="delete-photo-btn absolute top-1 right-1 bg-red-600 text-white px-2 py-1 rounded text-xs"
                                        type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    
            </div>
        </div>
    </div>
    </script>
</x-app-layout>