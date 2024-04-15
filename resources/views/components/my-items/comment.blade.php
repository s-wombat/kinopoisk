@props([
    'user' => false,
    'email' => false,
    'comment' => false,
    'rating' => false
])

<div class="p-3 mb-2 border-2 border-slate-300 rounded">
    <p class="bg-slate-300">Пользователь: <span class="font-black">{{ $user . ' ' . $email }}</span></p>
    <p class="mt-2 text-blue-600 indent-8">{{ $comment }}</p>
    <p class="mt-3 font-normal text-tray-700 dark:text-gray-400" >-- {{ __("Оценка") }} <span class="px-3 py-1 rounded-md bg-yellow-400">{{ $rating }}</span></p>
</div>
