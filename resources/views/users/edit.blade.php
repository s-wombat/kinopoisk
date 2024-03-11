<x-app-layout>
    <div class="container mx-auto sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h1>Edit user</h1>
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
            @if(isset($user))
                action="{{ route('users.update', $user->id) }}"
            @endif
        >
            @method('PUT')
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Roles -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <x-input-select
                    id="role"
                    name="role"
                    :options="$roles"
                    :selectedOptions="$user->role_id"
                    class="block mt-1 w-full" 
                />
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>

            <x-buttons.secondary class="mt-4">
                {{ __('Save') }}
            </x-buttons.secondary>

        </form>
    </div>
</x-app-layout>