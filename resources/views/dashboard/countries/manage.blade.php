<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Countries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-p-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-p-light">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('countries.add') }}"
                            class="bg-p-medium hover:bg-p-light text-white font-bold py-2 px-4 rounded">
                            Add Country
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
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                <tr class="bg-p-dark border-b border-p-medium">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-p-light">
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
                                    <td class="px-6 py-4 flex gap-2 uppercase">
                                        <a href="{{ route('countries.edit', $country->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
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
