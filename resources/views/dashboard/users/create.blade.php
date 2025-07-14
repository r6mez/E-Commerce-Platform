<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-p-dark shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="POST" action="{{ route('users.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('Name')" class="text-p-light"/>
                                <x-text-input id="name" name="name" type="text"
                                    class="mt-1 block w-full bg-p-medium text-p-light" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" class="text-p-light"/>
                                <x-text-input id="email" name="email" type="email"
                                    class="mt-1 block w-full bg-p-medium text-p-light" :value="old('email')" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-input-label for="country" :value="__('Country')" class="text-p-light"/>
                                <x-select-input id="country" name="country_id"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                            </div>

                            <div>
                                <x-input-label for="type" :value="__('Type')" class="text-p-light"/>
                                <x-select-input id="type" name="type"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 bg-p-medium">
                                    <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="seller" {{ old('type') == 'seller' ? 'selected' : '' }}>Seller</option>
                                    <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>
                            <div>
                                <x-input-label for="password" :value="__('Password')" class="text-p-light"/>
                                <x-text-input id="password" name="password" type="password"
                                    class="mt-1 block w-full bg-p-medium text-p-light" :value="old('password')" required autofocus autocomplete="password" />
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Add User') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
