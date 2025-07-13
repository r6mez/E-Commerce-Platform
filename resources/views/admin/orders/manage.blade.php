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
                            User/Seller
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="bg-blue-500 border-b border-blue-400 text-p-light font-semibold">
                        <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$order->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$order->user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$order->product->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$order->amount}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
