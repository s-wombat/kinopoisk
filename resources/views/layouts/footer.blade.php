<footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
        <x-nav-link :href="route('main.home')" class="flex justify-center items-center text-3xl font-semibold text-gray-900 dark:text-white" aria-current="page">
            <x-logo-nav.home></x-logo-nav.home>
            <span class="ml-2">{{ __('Kinopoisk') }}</span>
        </x-nav-link>
        <p class="my-6 text-gray-500 dark:text-gray-400">{{ __("Сайт о кино и всё, что связано с кино.") }}.</p>
        <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Premium</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">Campaigns</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Blog</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Affiliate Program</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">FAQs</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Contact</a>
            </li>
        </ul>
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023-2024 <a href="#" class="hover:underline">{{ __("Kinopoisk") }}</a>. All Rights Reserved.</span>
    </div>
</footer>
