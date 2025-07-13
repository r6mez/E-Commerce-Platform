<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="amount" :value="__('amount')" class="text-p-light"/>
                            <x-text-input id="amount" name="amount" type="number" min="1" class="mt-1 block w-full bg-p-medium text-p-light" value="{{ $order->amount }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Order') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
