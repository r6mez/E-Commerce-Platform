<x-app-layout>
    <div class="flex min-h-screen">
        <div class="flex-1 p-8">
            @foreach ($orders as $order)
            <div class="bg-p-dark/90 shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row mb-6 max-w-4xl mx-auto">
                <!-- Image Section -->
                <div class="w-full md:w-1/4 bg-gray-200 dark:bg-gray-700">
                    <img class="h-full w-full object-cover" src="{{ $order->product->photos->first()->photo_url }}" alt="{{ $order->product->name }}">
                </div>
                <!-- Details Section -->
                <div class="w-full md:w-3/4 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-2xl text-white mb-2">{{ $order->product->name }}</h3>
                            <p class="text-p-light text-sm whitespace-nowrap">Order #{{ $order->id }}</p>
                        </div>
                        <div class="flex justify-between items-center mb-4 text-center">
                            <div>
                                <p class="text-p-light font-semibold">Price per item</p>
                                <p class="font-bold text-lg text-p-light/90">{{ number_format($order->product->price, 2) }} EG</p>
                            </div>
                            <div>
                                <p class="text-p-light  font-semibold">Quantity</p>
                                <p class="font-bold text-lg text-p-light/90">{{ $order->amount }}</p>
                            </div>
                            <div>
                                <p class="text-p-light  font-semibold">Discount</p>
                                <p class="font-bold text-lg text-red-500 dark:text-red-400">{{ $order->product->discount }}%</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-right border-t pt-4">
                        <p class="text-p-light/90 ">Total Price:</p>
                        <p class="font-bold text-3xl text-indigo-600 dark:text-indigo-400">{{ number_format($order->amount * $order->product->price * (1 - $order->product->discount / 100), 2) }} EG</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
