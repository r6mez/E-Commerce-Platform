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
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ISO code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Currency code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Currency symbol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            USD value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr class="bg-blue-500 border-b border-blue-400 text-p-light font-semibold">
                        <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$country->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$country->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$country->iso_code}}
                        </td>
                        <td class="px-6 py-4">
                            {{$country->currency_code}}
                        </td>
                        <td class="px-6 py-4">
                            {{$country->currency_symbol}}
                        </td>
                        <td class="px-6 py-4">
                            {{$country->usd_value}}
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
