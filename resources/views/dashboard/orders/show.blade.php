<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="mb-4">
                        <p><span class="font-bold">ID:</span> {{ $order->id }}</p>
                        <p><span class="font-bold">User:</span> {{ $order->user->name }}</p>
                        <p><span class="font-bold">Product:</span> {{ $order->product->name }}</p>
                        <p><span class="font-bold">Amount:</span> {{ $order->amount }}</p>
                        <p><span class="font-bold">Status:</span> {{ $order->status }}</p>
                    </div>
                    <a href="{{ route('manageOrders') }}" class="bg-p-medium hover:bg-p-light text-white font-bold py-2 px-4 rounded">
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
