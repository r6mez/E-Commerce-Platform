<x-app-layout>
    <section class="relative bg-p-dark/40 text-p-light py-20 overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-4 leading-tight glow-header">
                1940 E-Commerce
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Step back in time and explore a curated collection of authentic World War II memorabilia and artifacts.
            </p>
            <a href="#" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out transform hover:scale-105">
                Shop the Collection
            </a>
        </div>
    </section>

    <section class="py-16 bg-p-dark">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-p-light text-center mb-12">Featured Artifacts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-p-medium rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        <img src="{{ $product->photos[0]->photo_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-2xl text-p-light">{{ $product->name }}</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-p-light/70">{{ $product->user->country->currency_symbol }}{{ $product->price }}</span>
                                <a href="/products/{{ $product->id }}" class="bg-p-light hover:bg-p-light/80 text-p-dark font-bold py-2 px-4 rounded-full text-sm transition duration-300">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-p-medium/40 text-p-light">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Explore Our Categories</h2>
            <div class="flex overflow-x-auto space-x-4 pb-4 scrollbar-hide"> 
                @foreach($categories as $category)
                    <a href="#" class="flex-shrink-0 bg-p-dark hover:bg-p-dark/60 text-p-light font-bold py-3 px-6 rounded-full text-lg transition duration-300 ease-in-out">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-p-dark text-p-light">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8">A Journey Through History</h2>
            <p class="text-lg max-w-4xl mx-auto mb-8">
                Our collection is meticulously curated to bring you authentic pieces from the Second World War. Each item tells a story, a testament to the courage, sacrifice, and ingenuity of an era that shaped our world. From rare uniforms to historical documents, discover a piece of history you can hold.
            </p>
            <img src="/background.png" alt="WWII historical image" class="mx-auto rounded-lg shadow-xl mb-8 max-w-full h-auto">
            <p class="text-md italic">"Those who do not remember the past are condemned to repeat it."</p>
        </div>
    </section>

    <section class="py-16 bg-p-dark/40 ">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-p-light text-center mb-12">World War II Timeline</h2>
            <x-timeline />
        </div>
    </section>

    <footer class="bg-p-dark text-p-light py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} WW2 E-Commerce Platform. All rights reserved.</p>
        </div>
    </footer>

    <style>
        .glow-header {
            text-shadow:
                0 0 4px #fff,
                0 0 8px #facc15,
                0 0 12px #facc15,
                0 0 16px #f59e42;
            background: linear-gradient(90deg, #facc15 10%, #f59e42 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: brightness(1);
            letter-spacing: 0.04em;
            animation: glow-pulse 2.5s ease-in-out infinite alternate;
        }
        @keyframes glow-pulse {
            0% {
                text-shadow:
                    0 0 4px #fff,
                    0 0 8px #facc15,
                    0 0 12px #facc15,
                    0 0 16px #f59e42;
            }
            100% {
                text-shadow:
                    0 0 8px #fff,
                    0 0 16px #facc15,
                    0 0 24px #facc15,
                    0 0 32px #f59e42;
            }
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</x-app-layout>
