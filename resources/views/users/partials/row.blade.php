<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a>
    </th>
    <td class="px-6 py-4">
        {{ $user->name }}
    </td>
    <td class="px-6 py-4">
        {{ $user->email }}
    </td>
    <td class="px-6 py-4">
        {{ $user->role->name }}
    </td>
    <td class="px-6 py-4 text-right">
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('users.edit',$user->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        </form>
    </td>
</tr>