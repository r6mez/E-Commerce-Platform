<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg" style="background-color:rgb(101, 80, 42);">
                <div class="max-w-xl">
                    <section>
                        <form method="POST" action="{{ route('products.updateProductInfo', $product->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text"
                                    class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="users" :value="__('User Name')" />
                                <x-select-input id="users" name="user_id"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                    style="background-color:rgba(76, 52, 6, 1);">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $product->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                            </div>

                            <div>
                                <x-input-label for="category" :value="__('Category')" />
                                <x-select-input id="category" name="category_id"
                                    class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                    style="background-color:rgba(76, 52, 6, 1);">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>

                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="text"
                                    class="mt-1 block w-full" :value="old('price', $product->price)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="discount" :value="__('Discount')" />
                                <x-text-input id="discount" name="discount" type="text"
                                    class="mt-1 block w-full" :value="old('discount', $product->discount)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('discount')" />
                            </div>

                            <div>
                                <x-input-label for="details" :value="__('Details')" />
                                <textarea id="details" name="details" rows="4"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-p-light dark:bg-gray-700 dark:text-black"
                                    style="background-color:rgba(76, 52, 6, 1);" required>{{ old('details', $product->details) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('details')" />
                            </div>

                            <div>
                                <x-input-label for="enable" :value="__('Enable')" />
                                <x-select-input id="enable" name="enable" class="mt-1 block w-full rounded-md text-p-light shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" style="background-color:rgba(76, 52, 6, 1);">

                                    <option value="TRUE" {{ old('enable', $product->enable) == 'TRUE' ? 'selected' : '' }}>
                                        TRUE
                                    </option>
                                    <option value="FALSE" {{ old('enable', $product->enable) == 'FALSE' ? 'selected' : '' }}>
                                        FALSE
                                    </option>
                                </x-select-input>

                                <x-input-error class="mt-2" :messages="$errors->get('country_id')" />
                            </div>

                            <div>
                                <x-input-label for="quantity" :value="__('Quantity')" />
                                <x-text-input id="quantity" name="quantity" type="text"
                                    class="mt-1 block w-full" :value="old('quantity', $product->quantity)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update Product') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>