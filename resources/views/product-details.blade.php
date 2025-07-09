<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-transparent">
        <div class="bg-p-dark/70 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-7xl p-0 md:p-0 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <div class="flex justify-center items-center">
                    <img src="{{ $product->photos[0]->photo_url }}" alt="{{ $product->name }}" class="w-full max-h-96 object-contain rounded-xl shadow-lg border border-p-light/10">
                </div>
                <div class="flex flex-col justify-between p-8 md:p-12 bg-p-dark/70">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-p-light mb-4 tracking-tight drop-shadow">{{ $product->name }}</h1>
                        <p class="text-p-light/80 text-base mb-5">Category: <span class="font-semibold text-p-light">{{ $product->category->name }}</span></p>
                        <div class="flex items-baseline mb-6">
                            @if ($isSameCountry)
                                <span class="text-3xl md:text-4xl font-bold text-p-light drop-shadow">
                                    {{ $price }} {{ $symbol }}
                                </span>
                                @if ($product->discount > 0)
                                    <span class="ml-3 px-3 py-1 rounded-full bg-green-200/80 text-green-900 text-lg font-semibold shadow">
                                        -{{ $product->discount }}%
                                    </span>
                                @endif
                            @else
                                <span class="text-3xl md:text-4xl font-bold text-p-light drop-shadow">
                                    {{  $convertedPrice }} {{ $symbol }} 
                            @endif
                        </div>
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-p-light mb-3">Product Description</h3>
                            <p class="text-p-light/70 leading-relaxed text-base">{{ $product->details }}</p>
                        </div>
                    </div>
                    <div class="border-t border-p-light/20 pt-8 mt-8">
                        <h3 class="text-xl font-semibold text-p-light mb-6 tracking-wide">Seller Information</h3>
                        <div class="flex items-center gap-8 bg-p-dark/60 rounded-xl p-6 shadow-inner mb-8 border border-p-light/10">
                            <span class="text-7xl md:text-8xl select-none drop-shadow-lg">
                                @php
                                    $iso = strtoupper(trim($product->user->country->iso_code));
                                    $emoji = '';
                                    if (strlen($iso) === 2 && ctype_alpha($iso)) {
                                        $emoji = mb_chr(ord($iso[0]) + 127397, 'UTF-8') . mb_chr(ord($iso[1]) + 127397, 'UTF-8');
                                    }
                                @endphp
                                {{ $emoji }}
                            </span>
                            <div class="flex-1">
                                <div class="flex items-center mb-3">
                                    <span class="text-xl font-bold text-p-light mr-3">{{ $product->user->name }}</span>
                                    <span class="bg-p-light/10 text-p-light text-xs px-3 py-1 rounded shadow">Seller</span>
                                </div>
                                <div class="flex items-center mb-2">
                                    <span class="text-p-light/70 text-base mr-2">From:</span>
                                    <span class="font-semibold text-p-light text-base">{{ $product->user->country->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-p-light/70 text-base">Quantity Available:</span>
                                    <span class="font-semibold text-p-light ml-2 text-base">{{ $product->quantity }}</span>
                                </div>
                            </div>
                        </div>
                        <x-primary-button class="w-full justify-center py-4 text-lg rounded-xl shadow-lg bg-gradient-to-r from-green-500/80 to-green-400/80 hover:from-green-600 hover:to-green-500 transition-all">
                            Add to Cart
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
