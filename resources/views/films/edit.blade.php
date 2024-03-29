<x-app-layout>
    <div class="container mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h1>Edit film</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST"
            @if(isset($film))
                action="{{ route('films.update', $film->id) }}"
            @endif
            enctype="multipart/form-data"
        >
            @method('PUT')
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Название')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$film->name" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Описание')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$film->description" autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="date_release" :value="__('Год выпуска')" />
                <x-text-input id="date_release" class="block mt-1 w-full" type="date" name="date_release" :value="$film->date_release" autocomplete="date_release" />
                <x-input-error :messages="$errors->get('date_release')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="preview" :value="__('Preview')" />
                <input type="file" name="preview" id="">
                <img src="{{ asset('/storage/' . $film->preview) }}" alt="">
            </div>
            <div class="mt-4">
                <x-input-label for="poster" :value="__('Poster')" />
                <input type="file" name="poster" id="">
            </div>

            <div class="mt-4">
                <x-input-label for="categories" :value="__('Categories')" />
                <x-input-checkbox
                        id="categories"
                        name="categories[]"
                        :options="$categories"
                        :selectedOptions="$categoriesFilm"
                />
            </div>

            <x-buttons.secondary class="mt-4">
                {{ __('Save') }}
            </x-buttons.secondary>

        </form>
    </div>
</x-app-layout>