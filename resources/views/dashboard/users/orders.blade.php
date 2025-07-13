<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
