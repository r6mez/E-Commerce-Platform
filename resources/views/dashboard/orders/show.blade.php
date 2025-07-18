<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <x-icon name="x-mark" class="h-6 w-6 text-green-500" />
                    </span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <x-icon name="x-mark" class="h-6 w-6 text-red-500" />
                    </span>
                </div>
            @endif
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="mb-4">
                        <p><span class="font-bold">ID:</span> {{ $order->id }}</p>
                        <p><span class="font-bold">User:</span> {{ $order->user->name }}</p>
                        <p><span class="font-bold">Product:</span> {{ $order->product->name }}</p>
                        <p><span class="font-bold">Amount:</span> {{ $order->amount }}</p>
                        <p><span class="font-bold">Status:</span> {{ $order->status }}</p>
                    </div>
                    <a href="{{ route('orders.index') }}" class="bg-p-medium hover:bg-p-light text-white font-bold py-2 px-4 rounded">
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
