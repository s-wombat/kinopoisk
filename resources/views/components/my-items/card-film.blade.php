@props([
    'id',
    'name',
    'poster',
    'rating',
    'description'
])

<div {{ $attributes->merge(['class' => 'flex justify-between max-w-sm bg-white border border-yellow-200 my-3 rounded-lg shadow dark:bg-yellow-800 dark:border-gray-700']) }}>
    <a href="{{ route('main.film', $id) }}">
        <div class="p-5">
            <img src="{{ asset('/storage/' . $poster) }}" alt="{{ $name }}" {{ $attributes->merge(['class' => 'rounded']) }} >
            <h5 {{ $attributes->merge(['class' => 'mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white']) }} >{{ __($name) }}</h5>
            <p {{ $attributes->merge(['class' => 'mb-3 font-normal text-tray-700 dark:text-gray-400']) }} >{{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">{{ $rating }}</span></p>
            <p {{ $attributes->merge(['class' => 'mb-3 font-normal text-gray-700 dark:text-gray-400']) }} >{{ __($description) }}</p>
        </div>
    </a>
</div>