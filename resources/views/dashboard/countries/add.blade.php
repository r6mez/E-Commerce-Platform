<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Country') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <x-icon name="x-mark" class="h-6 w-6 text-green-500" />
                    </span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <x-icon name="x-mark" class="h-6 w-6 text-red-500" />
                    </span>
                </div>
            @endif
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <form method="POST" action="{{ route('countries.store') }}">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" class="text-p-light"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-p-medium text-p-light" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="iso_code" :value="__('ISO Code')" class="text-p-light"/>
                            <x-text-input id="iso_code" name="iso_code" type="text" class="mt-1 block w-full bg-p-medium text-p-light" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="currency_code" :value="__('Currency Code')" class="text-p-light"/>
                            <x-text-input id="currency_code" name="currency_code" type="text" class="mt-1 block w-full bg-p-medium text-p-light" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="currency_symbol" :value="__('Currency Symbol')" class="text-p-light"/>
                            <x-text-input id="currency_symbol" name="currency_symbol" type="text" class="mt-1 block w-full bg-p-medium text-p-light" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="usd_value" :value="__('USD Value')" class="text-p-light"/>
                            <x-text-input id="usd_value" name="usd_value" type="text" class="mt-1 block w-full bg-p-medium text-p-light" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Add Country') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
