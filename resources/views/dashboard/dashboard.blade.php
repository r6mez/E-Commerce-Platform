<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="md:col-span-2 lg:col-span-4 bg-p-dark p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-p-light mb-4">🌍 Top Selling Countries</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    @foreach ($topCountries as $country)
                        <div class="flex flex-col items-center">
                            <span class="text-6xl mb-2">
                                @php
                                    $iso = strtoupper(trim($country->iso_code));
                                    $emoji = '';
                                    if (strlen($iso) === 2 && ctype_alpha($iso)) {
                                        $emoji = mb_chr(ord($iso[0]) + 127397, 'UTF-8') . mb_chr(ord($iso[1]) + 127397, 'UTF-8');
                                    }
                                @endphp
                                {{ $emoji }}
                            </span>
                            <span class="font-semibold text-p-light">{{ $country->name }}</span>
                            <span class="text-p-light/70">{{ $country->total_sales }} Products</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="md:col-span-2 lg:col-span-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-p-dark p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-p-light">💰 Total Revenue</h3>
                    <p class="text-3xl font-bold text-p-light/80 mt-4">${{ number_format($totalRevenue, 2) }}</p>
                </div>
                <div class="bg-p-dark p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-p-light">💵 Revenue Today</h3>
                    <p class="text-3xl font-bold text-p-light/80 mt-4">${{ number_format($revenueToday, 2) }}</p>
                </div>
            </div>
            <div class="bg-p-dark p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-p-light">📦 Products Sold Today</h3>
                <p class="text-3xl font-bold text-p-light/80 mt-4">{{ $totalProductsSoldToday }}</p>
            </div>
            <div class="bg-p-dark p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-p-light">📆 Products Sold This Month</h3>
                <p class="text-3xl font-bold text-p-light/80 mt-4">{{ $totalProductsSoldThisMonth }}</p>
            </div>
            <div class="bg-p-dark p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-p-light">🧑🏻‍🏭 Total Sellers</h3>
                <p class="text-3xl font-bold text-p-light/80 mt-4">{{ $totalSellers }}</p>
            </div>
            <div class="bg-p-dark p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-p-light">Total Users</h3>
                <p class="text-3xl font-bold text-p-light/80 mt-4">{{ $totalUsers }}</p>
            </div>

        </div>
    </div>
</x-app-layout>