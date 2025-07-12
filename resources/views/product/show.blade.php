<x-app-layout>
    <div class="absolute top-6 left-6 z-20">
    <div class="fixed top-8 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md px-4">
        @if (session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3500)" 
                x-show="show" 
                x-transition:leave="transition ease-in duration-300" 
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0" 
                class="mb-4 px-6 py-4 rounded-lg bg-green-500/90 text-white text-center font-semibold shadow-lg border border-green-200/60 animate-fade-in"
            >
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 4500)" 
                x-show="show" 
                x-transition:leave="transition ease-in duration-300" 
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0" 
                class="mb-4 px-6 py-4 rounded-lg bg-red-500/90 text-white text-center font-semibold shadow-lg border border-red-200/60 animate-fade-in"
            >
                <ul class="list-disc list-inside text-left inline-block">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
        <button onclick="window.history.back()" class="flex items-center gap-2 px-3 py-2 rounded-lg bg-p-dark/80 hover:bg-p-dark/90 text-p-light text-sm font-semibold shadow transition-all border border-p-light/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            Back
        </button>
    </div>
    <div class="fixed inset-0 z-10 bg-transparent p-0 m-0 overflow-auto">
        <div class="bg-p-dark/70 backdrop-blur-md shadow-2xl rounded-none min-h-screen min-w-full p-0 md:p-0 overflow-visible flex flex-col justify-center">
            <div class="flex-1 flex flex-col justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 h-full">
                <div class="flex flex-col items-center justify-center h-full" x-data="{ mainImg: '{{ $product->photos[0]->photo_url }}' }">
                    <img :src="mainImg" alt="{{ $product->name }}" class="w-full max-h-96 object-contain">
                    <div class="flex gap-2 m-4 overflow-x-auto whitespace-nowrap scrollbar-thin scrollbar-thumb-p-light/30 scrollbar-track-transparent">
                        @foreach($product->photos as $photo)
                            <img
                                src="{{ $photo->photo_url }}"
                                alt="Thumbnail"
                                class="w-16 h-16 object-cover rounded-lg border-2 cursor-pointer transition-all duration-150 hover:border-p-light/20"
                                :class="mainImg === '{{ $photo->photo_url }}' ? 'border-p-light ring-2 ring-p-light' : 'border-p-light/20'"
                                @click="mainImg = '{{ $photo->photo_url }}'"
                            >
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col justify-between p-8 md:p-12 bg-p-dark/70 h-full">
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
                        <form method="POST" action="{{ route('cart.store') }}" class="space-y-4">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="mb-4">
                                <label for="quantity" class="block text-p-light/70 text-base mb-2">Quantity</label>
                                <div class="flex items-center gap-2">
                                    <button type="button" onclick="const q=document.getElementById('quantity');if(q.value>1)q.value--" class="px-3 py-2 rounded-l-lg bg-p-dark/60 border border-p-light/20 text-p-light hover:bg-p-dark/80 focus:outline-none focus:ring-2 focus:ring-green-400/60 transition-all">-</button>
                                    <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->quantity }}" value="1" class="w-20 px-3 py-2 border-t border-b border-p-light/20 bg-p-dark/40 text-p-light focus:outline-none focus:ring-2 focus:ring-green-400/60 text-center hide-number-spin" required>
                                    <button type="button" onclick="const q=document.getElementById('quantity');if(parseInt(q.value)<{{ $product->quantity }})q.value++" class="px-3 py-2 rounded-r-lg bg-p-dark/60 border border-p-light/20 text-p-light hover:bg-p-dark/80 focus:outline-none focus:ring-2 focus:ring-green-400/60 transition-all">+</button>
                                </div>
                            </div>
                            <x-primary-button type="submit" class="w-full justify-center py-4 text-lg rounded-xl shadow-lg bg-gradient-to-r from-green-500/80 to-green-400/80 hover:from-green-600 hover:to-green-500 transition-all">
                                Add to Cart
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
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
