<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-p-dark/80 rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-p-light">My Products</h1>
                    <div class="gap-2">
                        <a href="{{ route('seller.products.export') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border-transparent rounded-md font-semibold text-xs text-p-dark uppercase tracking-widest hover:bg-green-500/70 active:bg-green-500/80 disabled:opacity-25 transition ease-in-out duration-150">
                            <x-icon name="arrow-down-tray" class="w-4 h-4 mr-1" />
                            Export CSV
                        </a>
                        <a href="{{ route('seller.index') }}" class="inline-flex items-center px-4 py-2 bg-red-500 border-transparent rounded-md font-semibold text-xs text-p-dark uppercase tracking-widest hover:bg-red-500/70 active:bg-red-500/80 disabled:opacity-25 transition ease-in-out duration-150">
                            <x-icon name="envelope" class="w-4 h-4 mr-1" />
                            Email a Seller
                        </a>
                        <a href="{{ route('seller.products.create') }}" class="inline-flex items-center px-4 py-2 bg-p-light border-transparent rounded-md font-semibold text-xs text-p-dark uppercase tracking-widest hover:bg-p-light/70 active:bg-p-light/80 disabled:opacity-25 transition ease-in-out duration-150">
                            <x-icon name="plus" class="w-4 h-4 mr-1" />
                            Add Product
                        </a>
                    </div>
                </div>

                <form action="{{ route('seller.products.index') }}" method="GET">
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
                                <x-icon name="adjustments-horizontal" class="w-4 h-4 mr-1" />
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
                                        <a href=" {{ route("seller.products.edit", $product) }} "
                                            class="bg-yellow-500 hover:bg-yellow-600 text-p-dark px-3 py-1 rounded text-xs font-semibold transition inline-flex items-center">
                                            <x-icon name="pencil-square" class="w-4 h-4 mr-1" />
                                            Edit
                                        </a>
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
</x-app-layout>
