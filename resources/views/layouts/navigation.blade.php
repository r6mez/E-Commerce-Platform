<nav x-data="{ open: false }" class="bg-p-dark border-b border-p-medium">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('/')" :active="request()->routeIs('/')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                        Home
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->type == "admin")
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                                Dashboard
                            </x-nav-link>
                        @endif
                        @if (Auth::user()->type == "seller" || Auth::user()->type == "admin")
                            <x-nav-link :href="route('seller.products.index')" :active="request()->routeIs('seller.products.index')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                                My Products
                            </x-nav-link>
                        @endif
                        <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                            Market
                        </x-nav-link>
                        <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                            Cart
                        </x-nav-link>
                        <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                            Orders
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48" class="bg-p-medium border border-p-light">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-p-light text-sm leading-4 font-medium rounded-md text-p-light bg-p-dark hover:text-p-light/80 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="rounded-md shadow-lg py-1">
                                <x-dropdown-link :href="route('profile.edit')" class="text-p-light hover:text-p-light/80 hover:bg-p-dark">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                            class="text-p-light hover:text-p-light/80 hover:bg-p-dark">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                    <div class="flex items-center space-x-4">
                        <x-nav-link :href="route('login')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                            Login
                        </x-nav-link>
                        <x-nav-link :href="route('register')" class="text-p-light hover:text-p-light/80" active-class="border-b-2 border-p-light">
                            Register
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-p-light hover:text-p-light/80 hover:bg-p-medium focus:outline-none focus:bg-p-medium focus:text-p-light/80 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('/')" :active="request()->routeIs('/')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                Home
            </x-responsive-nav-link>
            @auth
                @if (Auth::user()->type == "admin")
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                    Dashboard
                </x-responsive-nav-link>
                @endif
                @if (Auth::user()->type == "seller" || Auth::user()->type == "admin")
                <x-responsive-nav-link :href="route('seller.products.index')" :active="request()->routeIs('seller.products.index')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                    My Products
                </x-responsive-nav-link>
                @endif
                <x-responsive-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                    Market
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                    Cart
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                    Orders
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-p-medium">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-p-light">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-p-light/80">{{ Auth::user()->email }}</div>
                @endauth
                @guest
                    <div class="font-medium text-base text-p-light">Guest</div>    
                @endguest
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                        Profile
                    </x-responsive-nav-link>
                    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                                Log Out
                        </x-responsive-nav-link>
                    </form>
                @endauth
                @guest
                    <x-responsive-nav-link :href="route('login')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                        Login
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" class="text-p-light hover:text-p-light/80 hover:bg-p-medium">
                        Register
                    </x-responsive-nav-link>
                @endguest
            </div>
        </div>
    </div>
</nav>
