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
                            <div class="bg-p-medium p-6 shadow rounded-lg border-b border-p-dark mb-6">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <p class="block font-semibold py-2 rounded text-p-light">Product Name :</p>
                                            <p class="font-bold px-6 text-xl text-p-light/80">{{$order->product->name}}</p>
                                            <p class="block font-semibold py-2 rounded text-p-light">Amount :</p>
                                            <p class="text-sm font-bold px-6 text-xl text-p-light/80">{{$order->amount}}</p>

                                        </div>
                                    </div>
                                    <div class="text-right space-y-2">
                                        <p class="block font-semibold rounded text-p-light">Discount :</p>
                                        <p class="font-semibold text-p-light/80  px-4">{{$order->product->discount}} %</p>
                                        <p class="block font-semibold rounded text-p-light">Total Price :</p>
                                        <p class="font-semibold text-p-light/80 px-4">{{$order->amount * $order->product->price}} EG</p>
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
