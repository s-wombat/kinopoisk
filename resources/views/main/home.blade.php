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
            <div class="flex justify-between flex-wrap">
                @foreach($films as $film)
                        <x-my-items.card-film
                                :id="$film->id"
                                :name="$film->name"
                                :poster="$film->poster"
                                :rating="$film->rating"
                                :description="$film->description"
                        ></x-my-items.card-film>
                @endforeach
            </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('deleteButton').click();
    });
</script>
