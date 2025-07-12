<x-app-layout>
    <div class="flex justify-center">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto my-auto" style="background-color:rgb(101, 80, 42);  margin: 20px;">
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
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Country
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-blue-500 border-b border-blue-400 text-p-light font-semibold">
                        <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                            {{$user->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->type}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->country->name ?? 'UnKnown'}}
                        </td>
                        <td class="px-6 py-4 flex gap-2 uppercase">
                            <a href="{{ route('users.showUserInfo', $user->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-semibold transition duration-150">
                                Details
                            </a>
                            <a href="{{ route('users.editUserInfo', $user->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold transition">
                                Edit
                            </a>
                            <form action="{{ route('users.destroyUser', $user->id) }}" method="POST">
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
                <a href="{{ route('users.add') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out"
                    style="margin: 20px 20px 0px 20px; border-radius: 20px; background-color: rgb(110, 72, 0);">
                    Add User
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
