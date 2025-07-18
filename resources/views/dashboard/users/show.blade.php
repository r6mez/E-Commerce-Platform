<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="flex">
                        <div class="w-1/4">
                            <h3 class="text-lg font-bold mb-4">User Info</h3>
                            <p><span class="font-bold">Name:</span> {{ $user->name }}</p>
                            <p><span class="font-bold">Email:</span> {{ $user->email }}</p>
                            <p><span class="font-bold">Country:</span> {{ $user->country->name }}</p>
                            <p><span class="font-bold">Type:</span> {{ $user->type }}</p>
                            <a href="{{ route('users.edit',$user->id) }}" class="text-sm border border-gray-300 px-3 py-1 rounded inline-block mt-4">
                                Edit Profile
                            </a>
                        </div>
                        <div class="w-3/4">
                            <h3 class="text-lg font-bold mb-4">Orders</h3>
                            @foreach ($user->orders as $order)
                             <div class="bg-p-medium shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row mb-6 max-w-4xl mx-auto">
                                <div class="w-full md:w-1/4 bg-gray-200 dark:bg-gray-700">
                                    <img class="h-full w-full object-cover" src="{{ $order->product->photos->first()->photo_url }}" alt="{{ $order->product->name }}">
                                </div>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
