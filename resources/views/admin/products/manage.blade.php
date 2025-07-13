<x-app-layout>
    <div class="flex justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto" style="background-color:rgb(101, 80, 42);  margin: 20px;">
            <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white font-bold">
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
                    <tr class="bg-blue-500 border-b border-blue-400 text-p-light font-semibold">
                        <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
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
                            <a href="#"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-semibold transition duration-150">
                                Details
                            </a>
                            <a href="{{ route('products.editProductInfo',$product->id)}}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold transition">
                                Edit
                            </a>
                            <form action="{{route('products.destroyProduct',$product->id) }}" method="POST">
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
            <div class="mb-4 flex justify-end">
                <a href="{{ route('products.add') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out"
                    style="margin: 20px 20px 0px 20px; border-radius: 20px; background-color: rgb(110, 72, 0);">
                    Add Product
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
