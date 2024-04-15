<form action="{{ route('users.subscribeStore', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div id="subscribe" class="justify-center items-center w-full">
        <p class="mb-4 text-gray-500 dark:text-gray-300">{{ __('Are you sure you want to subscribe this item?') }}</p>
        <div class="flex justify-center items-center space-x-4">
            <x-nav-link :href="(route('users.index'))" class="text-gray bg-slate-300 hover:bg-gray-50 focus:ring-4 focus:ring-bule-300 font-medium">{{ __('No, cancel') }}</x-nav-link>
            <button type="submit" class="py-2 px-2 test-sm font-medium text-center text-white bg-red-600 focus:ring-4 focus-outline-none focus:ring-red-300 hover:bg-red-700">{{ __('Yes, I`m sure') }}</button>
        </div>
    </div>
</form>