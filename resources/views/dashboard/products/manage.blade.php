<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('products.add') }}"
                            class="bg-p-medium hover:bg-p-light text-white font-bold py-2 px-4 rounded">
                            Add Product
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-p-light">
                            <thead class="text-xs text-white uppercase bg-p-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User/Seller
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Discount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="bg-p-dark border-b border-p-medium">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-p-light">
                                        {{$product->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$product->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $product->user->name ?? 'UnKnown' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->category->name ?? 'UnKnown'}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->price}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->discount}} %
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->quantity}}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2 uppercase">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="bg-p-medium hover:bg-p-light text-white px-3 py-1 rounded text-xs font-semibold transition duration-150">
                                            Details
                                        </a>
                                        <a href="{{ route('products.edit',$product->id)}}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold transition">
                                            Edit
                                        </a>
                                        <form action="{{route('products.destroy',$product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 uppercase text-white px-3 py-1 rounded text-xs font-semibold transition">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
