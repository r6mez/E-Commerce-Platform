<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-p-dark/80 rounded-lg">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between mb-6">
                        <div class="flex flex-col sm:flex-row w-full">
                            <input type="text" name="search" placeholder="Search products..." class="form-input rounded-md shadow-sm border-transparent bg-p-medium text-p-light placeholder:text-p-light/60 mb-2 sm:mb-0 sm:mr-4 w-full sm:w-auto" value="{{ request('search') }}">
                            <select name="category" class="form-select rounded-md shadow-sm mb-2 sm:mb-0 sm:mr-4 bg-p-medium text-p-light border-transparent w-full sm:w-auto">
                                <option value="" class="bg-p-medium text-p-light">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }} class="bg-p-medium text-p-light">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-p-light border-transparent rounded-md font-semibold text-xs text-p-dark uppercase tracking-widest hover:bg-p-light/70 active:bg-p-light/80 disabled:opacity-25 transition ease-in-out duration-150 w-full sm:w-auto">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <div class="bg-p-medium overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                            <a href="{{ route('product.show', $product) }}">
                                <img src="{{ $product->photos[0]->photo_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover transition duration-300 hover:scale-110">
                                <div class="p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-p-light">{{ $product->name }}</h3>
                                            <p class="text-p-light/70">{{ $product->user->country->currency_symbol }}{{ $product->price }}</p>
                                        </div>
                                        <span class="ml-4 text-xl">
                                            @php
                                                $iso = strtoupper(trim($product->user->country->iso_code));
                                                $emoji = '';
                                                if (strlen($iso) === 2 && ctype_alpha($iso)) {
                                                    $emoji = mb_chr(ord($iso[0]) + 127397, 'UTF-8') . mb_chr(ord($iso[1]) + 127397, 'UTF-8');
                                                }
                                            @endphp
                                            {{ $emoji }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p class="text-p-medium">No products found.</p>
                    @endforelse
                </div>
                @if ($products->hasPages())
                    <div class="mt-6">
                        {{ $products->links('components.paginator') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <footer class="bg-p-dark text-p-light py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} WW2 E-Commerce Platform. All rights reserved.</p>
        </div>
    </footer>
</x-app-layout>
