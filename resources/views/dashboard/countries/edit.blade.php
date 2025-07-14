<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Country') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <form method="POST" action="{{ route('countries.update', $country->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" class="text-p-light"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="$country->name" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="iso_code" :value="__('ISO Code')" class="text-p-light"/>
                            <x-text-input id="iso_code" name="iso_code" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="$country->iso_code" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="currency_code" :value="__('Currency Code')" class="text-p-light"/>
                            <x-text-input id="currency_code" name="currency_code" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="$country->currency_code" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="currency_symbol" :value="__('Currency Symbol')" class="text-p-light"/>
                            <x-text-input id="currency_symbol" name="currency_symbol" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="$country->currency_symbol" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="usd_value" :value="__('USD Value')" class="text-p-light"/>
                            <x-text-input id="usd_value" name="usd_value" type="text" class="mt-1 block w-full bg-p-medium text-p-light" :value="$country->usd_value" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Country') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
