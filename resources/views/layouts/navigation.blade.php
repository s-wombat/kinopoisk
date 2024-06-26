<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="flex space-x-4">
                    <x-nav-link :href="route('main.home')" class="text-gray-200 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                        <x-logo-nav.home></x-logo-nav.home>
                        <span class="ml-2 text-2xl">{{ __('Главная') }}</span>
                    </x-nav-link>
                    <x-nav-link :href="route('thebest')" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                    <x-logo-nav.star></x-logo-nav.star>
                        <span class="ml-2 text-2xl">{{ __('Лучшее') }}</span>
                    </x-nav-link>
                    <x-nav-link :href="route('categories')" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                    <x-logo-nav.camera></x-logo-nav.camera>
                        <span class="ml-2 text-2xl">{{ __('Жанры') }}</span>
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden md:block">
                @if (Route::has('login'))
                    <div class="flex items-center space-x-2">
                        @auth
                        <!-- Modal toggle -->
                            <button id="subscribeChoice" data-modal-target="subscribeModal" data-modal-toggle="subscribeModal" class="block text-gray bg-slate-300 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-1.5 text-gray-500 bg-slate-300 hover:text-gray-700 hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150" type="button">
                                {{ __('Подписка на новости') }}
                            </button>
                        <!-- -->
                       <x-nav-link :href="(route('films.index'))" class="text-gray bg-slate-300 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-1.5 text-gray-500 bg-slate-300 hover:text-gray-700 hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150">{{ __('Films') }}</x-nav-link>
                       <x-nav-link :href="(route('users.index'))" class="text-gray bg-slate-300 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-1.5 text-gray-500 bg-slate-300 hover:text-gray-700 hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150">{{ __('Users') }}</x-nav-link>
{{--                    <x-nav-link :href="(url('/dashboard'))" class="inline-flex items-center rounded-md bg-none px-3 py-2 text-sm font-semibold text-slate-400 shadow-sm ring-1 ring-inset ring-white hover:bg-gray-50">Dashboard</x-nav-link>--}}
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-slate-300 hover:text-gray-700 hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        @else
                            <x-nav-link :href="(route('login'))" class="inline-flex items-center rounded-md bg-none px-3 py-2 text-sm font-semibold text-slate-400 shadow-sm ring-1 ring-inset ring-white hover:bg-gray-50">
                                <x-logo-nav.enter></x-logo-nav.enter>
                                {{ __('Войти') }}
                            </x-nav-link>
                            @if (Route::has('register'))
                                <x-nav-link :href="(route('register'))"  class="text-slate-600 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                    <x-logo-nav.register></x-logo-nav.register>
                                    {{ __('Создать аккаунт') }}
                                </x-nav-link>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        @auth()
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
        @endauth
    </div>
</nav>
    @include('users.modal.subscribe-choice')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('subscribeChoice').click();
    });
</script>
