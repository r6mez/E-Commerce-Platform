<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-p-dark/80 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-p-light mb-8">Your Cart</h2>
                @if(session('success'))
                    <div class="mb-4 px-6 py-4 rounded-lg bg-green-500/90 text-white text-center font-semibold shadow-lg border border-green-200/60 animate-fade-in">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="mb-4 px-6 py-4 rounded-lg bg-red-500/90 text-white text-center font-semibold shadow-lg border border-red-200/60 animate-fade-in">
                        <ul class="list-disc list-inside text-left inline-block">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($cartItems->isEmpty())
                    <p class="text-p-light/80 text-lg text-center">Your cart is empty.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-p-light/20">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-p-light uppercase tracking-wider">Product</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-p-light uppercase tracking-wider">Price</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-p-light uppercase tracking-wider">Quantity</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-p-light uppercase tracking-wider">Subtotal</th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-p-light/10">
                                @php $total = 0; @endphp
                                @foreach($cartItems as $item)
                                    @php
                                        $subtotal = $item->converted_subtotal;
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td class="px-4 py-4 flex items-center gap-4">
                                            <img src="{{ $item->product->photos[0]->photo_url ?? '/images/placeholder.png' }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded shadow">
                                            <div>
                                                <a href="{{ route('product.show', $item->product) }}" class="text-p-light font-semibold hover:underline">{{ $item->product->name }}</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-p-light/90">{{ $userCurrencySymbol }}{{ number_format($item->converted_price, 2) }}</td>
                                        <td class="px-4 py-4">
                                            <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->quantity }}" class="w-16 rounded bg-p-medium text-p-light border border-p-light/20 hide-number-spin">
                                                <button type="submit" class="px-2 py-1 bg-p-light text-p-dark rounded hover:bg-p-light/80 text-xs font-semibold">Update</button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-4 text-p-light/90">{{ $userCurrencySymbol }}{{ number_format($subtotal, 2) }}</td>
                                        <td class="px-4 py-4">
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST" onsubmit="return confirm('Remove this item from cart?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end mt-8">
                        <div class="bg-p-medium rounded-lg p-6 shadow-md w-full max-w-xs">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-lg font-semibold text-p-light">Total:</span>
                                <span class="text-2xl font-bold text-p-light">{{ $userCurrencySymbol }}{{ number_format($total, 2) }}</span>
                            </div>
                            <form action="{{ route('cart.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200">Checkout</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .hide-number-spin::-webkit-inner-spin-button, .hide-number-spin::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .hide-number-spin {
            -moz-appearance: textfield;
        }
    </style>
</x-app-layout>
