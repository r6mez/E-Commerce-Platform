<x-guest-layout>
    <div class="flex justify-center mb-4">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-48 h-auto">
    </div>

    <h2 class="text-center text-2xl font-bold text-p-light mb-4">Login</h2>

    <form method="POST" action="{{ route('loginStore') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Email" class="text-p-light" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-p-light" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                <x-icon name="arrow-right-on-rectangle" class="w-5 h-5 mr-2" />
                {{ __('Log in') }}
            </x-primary-button>
        </div>
         <div class="mt-4 text-center text-p-light">
            Don't have an account? <a href="register" class="text-p-light underline hover:text-p-light/80">Register here</a>
        </div>
    </form>
</x-guest-layout>