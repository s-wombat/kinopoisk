<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
{{--        <a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a>--}}
        {{ $user->id }}
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
            <x-buttons.primary-link :href="route('users.edit',$user->id)">{{ __('Edit') }}</x-buttons.primary-link>
            @csrf
            @method('DELETE')
            <x-danger-button disabled="{{ $user->email == $superEmail ? 'disabled' : '' }}" >{{ __('Delete') }}</x-danger-button>
        </form>
    </td>
</tr>