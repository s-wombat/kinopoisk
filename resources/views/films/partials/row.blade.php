<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="{{ route('films.show', $film->id) }}">{{ $film->id }}</a>
    </th>
    <td class="px-6 py-4">
        <img src="{{ asset('/storage/' . $film->preview) }}" alt="">
    </td>
    <td class="px-6 py-4">
        {{ $film->name }}
    </td>
    <td class="px-6 py-4">
        {{ $film->description }}
    </td>
    <td class="px-6 py-4">
        {{ $film->date_release }}
    </td>
    <td class="px-6 py-4">
        @foreach($film->categories as $category)
            {{ $category->name }} <br>
        @endforeach
    </td>
    <td class="px-6 py-4 text-right">
        <form action="{{ route('films.destroy', $film->id) }}" method="POST">
            <x-buttons.primary-link :href="route('films.edit',$film->id)">{{ __('Edit') }}</x-buttons.primary-link>
            @csrf
            @method('DELETE')
            <x-danger-button>{{ __('Delete') }}</x-danger-button>
        </form>
    </td>
</tr>