<x-guest-layout>
    <div class="flex justify-center mb-4">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-48 h-auto">
    </div>

    <h2 class="text-center text-2xl font-bold text-p-light mb-4">Register</h2>

    <form method="POST" action="{{ route('registerStore') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Name" class="text-p-light" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Email" class="text-p-light" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-p-light" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirm Password" class="text-p-light" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="mt-4 flex space-x-4">
            <div class="w-1/2">
                <x-input-label for="type" value="Type" class="text-p-light" />
                <x-select-input id="type" name="type">
                    <option value="user">user</option>
                    <option value="seller">seller</option>
                </x-select-input>
            </div>

            <div class="w-1/2">
                <x-input-label for="country" value="Country" class="text-p-light" />
                <x-select-input id="country" name="country_id">
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </x-select-input>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="mt-4 text-center text-p-light">
            Already have an account? <a href="login" class="text-p-light underline hover:text-p-light/80">Login here</a>
        </div>
    </form>
</x-guest-layout>