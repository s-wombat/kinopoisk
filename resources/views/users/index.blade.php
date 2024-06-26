<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
{{--            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('users.create') }}" role="button">Create user</a>--}}
            <x-buttons.primary-link href="{{ route('users.create') }}" >{{ __('Create user') }}</x-buttons.primary-link>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Options</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @include('users.partials.row', ['user' => $user])
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</x-app-layout>
