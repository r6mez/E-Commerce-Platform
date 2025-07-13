<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-p-dark shadow sm:rounded-lg">
                <div class=" max-w-xl">
                    <section>
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('users.updateUserInfo', $user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" class="text-p-light"/>
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div>
                                <x-input-label for="email" :value="__('Email')" class="text-p-light"/>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-p-medium text-p-light" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div>
                                <x-input-label for="country" :value="__('Country')" class="text-p-light"/>

                                <x-select-input id="country" name="country_id" class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>

                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>
                            <div>
                                <x-input-label for="type" :value="__('Type')" class="text-p-light"/>
                                <x-select-input id="type" name="type" class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">

                                    <option value="seller" {{ old('type', $user->type) == 'seller' ? 'selected' : '' }}>
                                        Seller
                                    </option>
                                    <option value="user" {{ old('type', $user->type) == 'user' ? 'selected' : '' }}>
                                        User
                                    </option>
                                    <option value="admin" {{ old('type', $user->type) == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                </x-select-input>

                                <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                            </div>
                            <div>
                                <x-input-label for="password" :value="__('New Password')" class="text-p-light"/>
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full bg-p-medium text-p-light" :value="old('password',$user->password)" required autofocus autocomplete="password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
