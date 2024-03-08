<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                {{ __('Главная  ') }}
            </h2>
        </x-slot>
{{-- 
        @auth()
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        @endauth --}}
        {{-- {{ dd(Auth::user()->role) }} --}}

        <div class="flex justify-between">
            <div class="flex justify-between max-w-sm bg-white border border-yellow-200 rounded-lg shadow dark:bg-yellow-800 dark:border-gray-700">
                <a href="#">
                    <div class="p-5">
                        <img src="{{ Vite::image('boys.png') }}" class="rounded" alt="Boys">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __("Пацаны") }}</h5>
                        <p class="mb-3 font-normal text-tray-700 dark:text-gray-400">{{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">7.9</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Действие сериала разворачивается в мире, где люди, обладающие сверхспособностями, являются настоящими знаменитостями и всеобщими любимцами.") }}</p>
                    </div>
                </a>
            </div>
            <div class="flex justify-between max-w-sm bg-white border border-yellow-200 rounded-lg shadow dark:bg-yellow-800 dark:border-yellow-700">
                <a href="#">
                    <div class="p-5">
                        <img src="{{ Vite::image('mandalorian.png') }}" class="rounded" alt="Mandalorian">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __("Мандалорец") }}</h5>
                        <p class="mb-3 font-normal text-tray-700 dark:text-gray-400">{{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">7.9</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Действие переносит зрителя на пять лет вперед после падения Галактической Империи и рассказывает историю молчаливого наемника, зарабатывающего на жизнь отловом беглых преступников в самых отдаленных звездных системах.") }}</p>
                    </div>
                </a>
            </div>
            <div class="flex justify-between max-w-sm bg-white border border-yellow-200 rounded-lg shadow dark:bg-yellow-800 dark:border-yellow-700">
                <a href="#">
                    <div class="p-5">
                        <img src="{{ Vite::image('bourne-identity.jpg') }}" class="rounded" alt="Bourne Identity">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __("Идентификация Борна") }}</h5>
                        <p class="mb-3 font-normal text-tray-700 dark:text-gray-400">{{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">7.9</span></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Посреди Средиземного моря рыбаками было поднято на борт тело еле живого молодого парня. Он ничего не помнит, единственные зацепки, которые могут ему поведать о прошлом и кто он есть - несколько шрамов от пулевых ранений, микро-чип вживленный под кожу и номер банковского счета в Швейцарии.") }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
