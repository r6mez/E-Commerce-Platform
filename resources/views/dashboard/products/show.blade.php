<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="mb-4">
                        <p><span class="font-bold">ID:</span> {{ $product->id }}</p>
                        <p><span class="font-bold">Name:</span> {{ $product->name }}</p>
                        <p><span class="font-bold">Seller:</span> {{ $product->user->name ?? 'N/A' }}</p>
                        <p><span class="font-bold">Category:</span> {{ $product->category->name ?? 'N/A' }}</p>
                        <p><span class="font-bold">Price:</span> {{ $product->price }}</p>
                        <p><span class="font-bold">Discount:</span> {{ $product->discount }}%</p>
                        <p><span class="font-bold">Quantity:</span> {{ $product->quantity }}</p>
                        <p><span class="font-bold">Enabled:</span> {{ $product->enable ? 'Yes' : 'No' }}</p>
                        <p><span class="font-bold">Details:</span> {{ $product->details }}</p>
                    </div>
                    <a href="{{ route('manageProducts') }}" class="bg-p-medium hover:bg-p-light text-white font-bold py-2 px-4 rounded">
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
