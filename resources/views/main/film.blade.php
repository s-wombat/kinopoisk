<x-app-layout>
    <div class="flex flex-row mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="p-5">
            <img src="{{ asset('/storage/' . $film->poster) }}" alt="{{ $film->name }}" class="rounded"]) }} >
            <form method="POST" action="{{ route('comments.store', $film->id) }}">
                @csrf

                <x-input-select
                        id="rating"
                        name="rating"
                        required
                        :options="$rating"
                        class="block mt-1 w-full"
                />
                <x-textarea id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" required autocomplete="comment" placeholder="Комментарий" />
                <x-input-hidden name="film_id" :value="$film->id" />
                <x-buttons.secondary class="mt-4">
                    {{ __('Оставить комментарий') }}
                </x-buttons.secondary>
            </form>
        </div>
        <div class="p-5">
            <div class="p-2">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" >{{ __($film->name) }}</h5>
                <p class="mb-3 font-normal text-tray-700 dark:text-gray-400" >{{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">{{ $film->rating }}</span></p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" >{{ __($film->description) }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ __("Добавлен " . $film->created_at->format('d/m/Y')) }}</p>
            </div>
            <div class="p-2">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Отзывы</h5>
                @foreach($comments as $comment)
                    <x-my-items.comment
                            :user="$comment->user"
                            :email="$comment->email"
                            :comment="$comment->comment"
                            :rating="$comment->rating"
                    />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
